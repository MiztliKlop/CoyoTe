<?php
/******************************************************
*Página donde se imprimirán en pantalla las órdenes del
*usuario que esté usando la plataforma. Se hacen verificaciones
*respecto a la cantidad de órdenes y las características de cada orden.
*En caso de que el usuario lo desee puede cambiar la ubicación
*en la que recogerá el pedido.
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
  $x = $_SESSION['transporte'];
  $usuario_en_uso="'$x'";
  if (!isset($_POST['lugar']) && isset($_SESSION['pedidoTotal']))
  {
    $consulta_lugarexistente= "SELECT*FROM pedido WHERE id_usuario = $usuario_en_uso";
    $orden_pedidos = mysqli_query($conexion,$consulta_lugarexistente);
    while($inf_pedidos = mysqli_fetch_array($orden_pedidos))
    {
      if ($inf_pedidos['id_status'] == 2)
      {
        $lugar_entrega = $inf_pedidos['id_lugar'];
      }
    }
  }
  elseif(isset($_POST['lugar']))
  {
    $lugar_entrega = $_POST['lugar'];
  }

  foreach ($_SESSION['pedidoTotal'] as $key => $value)
  {
      $insertar = "INSERT INTO Pedido(id_usuario,id_producto,cantidad,id_lugar,id_status) VALUES ($usuario_en_uso,$value[0],$value[1],$lugar_entrega,2)";
      mysqli_query($conexion,$insertar);
  }
  $_SESSION['pedidoTotal']=[];
  $contador = [];
  $cafeteria = false;
  $cantidadPedidos = [];
  $consulta_ped = "SELECT*FROM pedido NATURAL JOIN Usuario WHERE id_usuario = $usuario_en_uso";
  $excelente = mysqli_query($conexion,$consulta_ped);
  echo "Se está preparando: <br>";
  echo "<table>";
  echo "<th>Producto</th>";
  echo "<th>Cantidad</th>";
  while($pedidos = mysqli_fetch_array($excelente))
  {
    if ($pedidos['id_status'] == 2)
    {
      echo "<tr>";
      $nueva_variable = $pedidos['id_producto'];
      $queAlimento = "SELECT * FROM Alimento WHERE id_producto = $nueva_variable";
      $hola = mysqli_query($conexion,$queAlimento);
      $info_alimento = mysqli_fetch_array($hola);
      echo"<td>".$info_alimento['nombreProducto']."</td>";
      echo"<td>".$pedidos['cantidad']."</td>";
      $que_lugar = $pedidos['id_lugar'];
      $consulta_lugarexistente= "SELECT*FROM lugar  WHERE id_lugar = $que_lugar";
      $orden_pedidos = mysqli_query($conexion,$consulta_lugarexistente);
      $inf_pedidos = mysqli_fetch_array($orden_pedidos);
      $verificador_sesion = $pedidos['id_usuario'];
      if ("'$verificador_sesion'" == $usuario_en_uso)
      {
        array_push($contador,1);
      }
      if ($pedidos['id_lugar']==1)
      {
        $cafeteria=true;
        $tiempo = "SELECT*FROM pedido WHERE id_status = 2";
        $consulta_tiempo = mysqli_query($conexion,$tiempo);
        while($respuesta_tiempo = mysqli_fetch_array($consulta_tiempo))
        {
          if($respuesta_tiempo['id_lugar'] ==1)
          {
          array_push($cantidadPedidos,1);
          }
        }
      }
    }
  }

  echo "<td>Lugar de entrega: ".$inf_pedidos['lugar']."</td>";
  echo "</table>";
  if ($cafeteria==true)
  {
    echo "<br><br>";
    $total = count($cantidadPedidos);
    $estimado = $total * 1;
    $nuevoTiempo = "UPDATE pedido SET tiempo = $estimado WHERE id_usuario=$usuario_en_uso";
    mysqli_query($conexion,$nuevoTiempo);
    echo "<td>Tiempo estimado de espera  ".$estimado." minutos </td>";
  }
  else {
    $nuevoTiempo = "UPDATE pedido SET tiempo = 0 WHERE id_usuario=$usuario_en_uso";
    mysqli_query($conexion,$nuevoTiempo);
  }
  $noPedidos = count($contador);
  $insertar_pedidos = "UPDATE Usuario SET noPedidos = $noPedidos WHERE id_usuario=$usuario_en_uso";
  mysqli_query($conexion,$insertar_pedidos);

  if($noPedidos < 3)
  {
    echo "<br><br><a href='intermediario.php'>¡Aún puedes ordenar algo más. Haz click sobre esta oración para hacerlo!</a><br><br>";
  }
  elseif($noPedidos == 3)
  {
    $insertar_completo = "UPDATE Usuario SET id_pedido_completo= 1 WHERE id_usuario = $usuario_en_uso";
    mysqli_query($conexion,$insertar_completo);
  }

  echo "<a href='cambio_ubicacion.php'>Cambio de ubicación.</a>";
  echo "<br><br><br><br><br>";
  echo "<a href='cierrasesion.php'>Cierra Sesion.</a>";
  mysqli_close($conexion);

}





 ?>
