<?php

if (  isset($_GET['listo']) )
{
setcookie("tiempo", "Tiempo Restante", time() + 60*.1);

  echo "<form  action='Cod.php' method='get'>";
  echo "<input type='submit' name='entregado' value='Entregado'>";
  echo "<input type='submit' name='estado' value='Caducidad | No liquidado'>";
  echo "</form>";
}
  if ( isset($_COOKIE["tiempo"]) && isset($_GET['estado']) )
  {

  echo "A Tiempo";
  echo "<form  action='Cod.php' method='get'>";
  echo "<input type='submit' name='entregado' value='Entregado'>";
  echo "<input type='submit' name='estado' value='Caducidad | No liquidado'>";
  echo "</form>";
}
elseif ( isset($_GET['estado']) )
{
  echo "Expirado. Sanción Y Producto Desapartado (Envío a base de Datos)";

}
if (  isset($_GET['entregado']) )
{
  echo "Envío a Base De Datos";
}
if (  isset($_GET['sancion']) )
{
  echo "Sanción Y Producto Desapartado (Envío a base de Datos)";
}
 ?>
