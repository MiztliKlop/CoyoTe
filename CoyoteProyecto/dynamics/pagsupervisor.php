<?php
/******************************************************
*Pagina que despliega todos los pedidos activos, es decir,
que aún no son entregados. El supervisor puede seleccionar
si se ha entregado o si el el cliente no llegó en el Tiempo
acordado.
*********************************************************/
define("DBUSER","root");
define("DBHOST","localhost");
define("PASSWORD","root");

function connectDB2 ($base)
{
  $con = mysqli_connect(DBHOST, DBUSER, PASSWORD, $base);
  if (!$con)
  {
    echo "No se ha podido acceder a la base. <br>";
  }
  return $con;
}
$conexion = connectDB2("pruebas");
if(!$conexion)
{
  echo mysqli_connect_error()."<br>";
  echo mysqli_connect_errno()."<br>";
  exit();
}
else
{
  session_start();
  $estado1=1;
  $estado3=3;
  $consulta = "SELECT * FROM Pedido";
  $wow = mysqli_query($conexion,$consulta);
  echo "Pedidos: <br>";
  echo "<table>";
  echo "<th>#Pedido</th>";
  echo "<th>Usuario</th>";
  echo "<th>Orden</th>";
  echo "<th>Cantidad</th>";
  echo "<th>Lugar</th>";
  echo "<th>Status</th>";
  echo "<th>Tiempo</th>";
  while($row = mysqli_fetch_array($wow))
  {
    echo "<tr>";
    if ($row['id_status'] == 2)
    {
        $nombreProducto = $row['id_producto'];
        $lugarPedido = $row['id_lugar'];
        $y = $row['id_usuario'];
        $personaPedido="'$y'";
        $consulta_valores = "SELECT * FROM Alimento WHERE id_producto = $nombreProducto";
        $ahora_consulta = mysqli_query($conexion,$consulta_valores);
        $datos_producto = mysqli_fetch_array($ahora_consulta);
        $consulta_lugar_pedido = "SELECT * FROM Lugar WHERE id_lugar = $lugarPedido";
        $datos_lugar = mysqli_query($conexion,$consulta_lugar_pedido);
        $lugar_oficial = mysqli_fetch_array($datos_lugar);
        $consulta_usuario_pedido = "SELECT * FROM Usuario WHERE id_usuario = $personaPedido";
        $datos_usuario = mysqli_query($conexion,$consulta_usuario_pedido);
        $usuario_oficial = mysqli_fetch_array($datos_usuario);
        echo "<td align='center'>".$row['id_pedido']."</td><td align='center'>".$usuario_oficial['Nombre']."</td><td align='center'>".$datos_producto['nombreProducto']."</td><td align='center'>".$row['cantidad']."</td><td align='center'>".$lugar_oficial['lugar']."</td><td align='center'>".$row['id_status']."</td><td align='center'>".$row['tiempo']." minutos</td>";
    }
    echo "</tr>";
  }
  echo "</table><br><br><br>";
  echo "<form action='updateStatus.php' method='post'>
          <select name='estadoPedido'>
            <option value='".$estado1."'>Orden Completada</option>
            <option value='".$estado3."'>Fuera de tiempo</option>
          </select>";

          $consulta_nueva = "SELECT * FROM Pedido";
          $ex = mysqli_query($conexion,$consulta_nueva);
          echo "<select name='noPedido'>";
          while($low = mysqli_fetch_array($ex))
          {
            if ($low['id_status'] == 2)
            {
                echo "<option value='".$low['id_pedido']."'>".$low['id_pedido']."</option>";
            }
          }
          echo "</select>";
          echo "<input type='submit' value='Enviar'>";

    echo "<br><br><br>";
    echo "<a href='cierrasesion.php'>Cierra Sesion.</a>";

}



 ?>
