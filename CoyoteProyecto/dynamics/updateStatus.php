<?php
/******************************************************
*Página donde actualizará el estado de los pedidos según
hayan sido entregados a tiempo o no. De igual manera
se aplicará la sanción en caso de que el cliente no haya
llegado por el pedido. O lo librará para que pueda hacer
más pedidos el usuario.
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
  $estadoPedido = $_POST['estadoPedido'];
  $noPedido = $_POST['noPedido'];

  $consulta_disponibilidad="SELECT * FROM pedido WHERE id_pedido = $noPedido";
  $respuesta_disponibilidad = mysqli_query($conexion,$consulta_disponibilidad);
  $datos_alimento = mysqli_fetch_array($respuesta_disponibilidad);

  if ($estadoPedido == 1)
  {

    $producto = $datos_alimento['id_producto'];
    $resta_alimento="SELECT*FROM pedido NATURAL JOIN Alimento WHERE id_producto = $producto";
    $respuesta_producto = mysqli_query($conexion,$resta_alimento);
    $caracteristicas_producto = mysqli_fetch_array($respuesta_producto);
    $disponibilidad_original = $caracteristicas_producto['disponibilidad'];
    $nuevadisponibilidad = $disponibilidad_original - $datos_alimento['cantidad'];
    $actualizar_disponibilidad = "UPDATE Alimento SET disponibilidad = $nuevadisponibilidad WHERE id_producto = $producto";
    mysqli_query($conexion,$actualizar_disponibilidad);

    $usuario = $datos_alimento['id_usuario'];
    $resta_orden="SELECT*FROM pedido NATURAL JOIN Usuario WHERE id_usuario = '$usuario'";
    $respuesta_orden = mysqli_query($conexion,$resta_orden);
    $ordenes_finales = mysqli_fetch_array($respuesta_orden);
    $actualizar_pedidos = $ordenes_finales['noPedidos'] -1 ;
    $actualizacion = "UPDATE Usuario SET noPedidos = $actualizar_pedidos WHERE id_usuario = '$usuario'";
    mysqli_query($conexion,$actualizacion);

    if ($actualizar_pedidos == 0)
    {
      $actualizacion_estado_pedido = "UPDATE Usuario SET id_pedido_completo = 2 WHERE id_usuario = '$usuario'";
      mysqli_query($conexion,$actualizacion_estado_pedido);
    }

  }

  elseif ($estadoPedido == 3)
  {
    $usuario = $datos_alimento['id_usuario'];
    $consulta_penal="SELECT*FROM pedido NATURAL JOIN Usuario WHERE id_usuario = '$usuario'";
    $recurso = mysqli_query($conexion,$consulta_penal);
    $datos_castigo = mysqli_fetch_array($recurso);
    $actualizar_estado="UPDATE Usuario SET id_statusCliente = 2 WHERE id_usuario = '$usuario'";
    mysqli_query($conexion,$actualizar_estado);
    $actualizacion_castigo = "UPDATE Usuario SET noPedidos = 0 WHERE id_usuario = '$usuario'";
    mysqli_query($conexion,$actualizacion_castigo);
    $consulta = "SELECT * FROM pedido NATURAL JOIN Usuario WHERE id_usuario = '$usuario'";
    $wow = mysqli_query($conexion,$consulta);
    $actualizacion_estado_pedido = "UPDATE Usuario SET id_pedido_completo = 2 WHERE id_usuario = '$usuario'";
    mysqli_query($conexion,$actualizacion_estado_pedido);
    while($row = mysqli_fetch_array($wow))
    {
      if ($row['id_status'] == 2)
      {
        $actualizar_todos = "UPDATE pedido SET id_status = 3 WHERE id_usuario = '$usuario'";
        mysqli_query($conexion,$actualizar_todos);
      }
    }
  }
  $insertar = "UPDATE Pedido SET id_status = $estadoPedido WHERE id_pedido = $noPedido";
  mysqli_query($conexion,$insertar);
  mysqli_close($conexion);
  header('Location:pagsupervisor.php');


}



 ?>
