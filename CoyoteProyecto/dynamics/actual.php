<?php
//Archivo que actualiza el lugar de ntrega de todas las órdenes que hizo el usuario. 
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
  $usuario_en_uso ="'$x'";
  $nuevoLugar = $_POST['nuevoLugar'];
  $consulta = "SELECT * FROM Pedido WHERE id_usuario = $usuario_en_uso";
  $wow = mysqli_query($conexion,$consulta);
  while($row = mysqli_fetch_array($wow))
  {
    if($row['id_status']==2)
    {
    $actualUbi = "UPDATE Pedido SET id_lugar = $nuevoLugar WHERE id_usuario = $usuario_en_uso";
    mysqli_query($conexion,$actualUbi);
    }

  }
  mysqli_close($conexion);
  header('Location: cocina.php');
}



 ?>
