<?php
//Formulario para que el usario pueda cambiar la ubicación de donde recogerá el pedido.
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
  $consulta_lugar = "SELECT * FROM Lugar";
  $pulpo = mysqli_query($conexion,$consulta_lugar);
  echo "Selecciona la nueva ubicación donde recogerás el pedido: <br>";
  echo " <form action='actual.php' method='post'>
          <select  name='nuevoLugar'>";

  while($fila = mysqli_fetch_array($pulpo))
  {
    echo "<option value='".$fila['id_lugar']."'>".$fila['lugar']."</option>";
  }
  echo "</select><br><br>";
  echo "<input type='submit' value='¡Actualizar'>";
  echo "</form>";
  mysqli_close($conexion);

}





 ?>
