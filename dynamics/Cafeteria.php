<?php
$sancion=$_POST['sancio'];
$usuario=isset($_POST['nombreU']);
$connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
$sql = "SELECT id_usuario FROM Usuario WHERE Nombre=".$usario."";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
$si="SELECT Sancion FROM Usuario WHERE id_usuario=".$sql"";
$result2 = mysqli_query($connection, $si) or die("Error " . mysqli_error($connection));
date_default_timezone_set("America/Mexico_City");
setcookie("Pedido","Ir por Pedido",time()+60*10);
echo "Tienes 10 minutos para ir por tu pedido a la cafetería<br><br>";
if (isset($_COOKIE["Pedido"])) {
  echo "Todavía tienes tiempo<br>";
}
else {
  echo "Se te acabo el tiempo";
}
if ($si=="Si"&&$sancion=="Si") {
  setcookie("Sancion","Sancion",time());
  echo "Has sido sancionado 5 días";
}
else {
  echo "Tu sanción será discutida con los administradores";
}
 ?>
