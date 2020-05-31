<?php
//Eliminación de las variables de sesión para que se eliminen las variables 'temporales'
session_start();
$_SESSION['pedidoTotal']=[];
$_SESSION['validacion']=0;
$_SESSION['cuenta']=0;

if (isset($_SESSION['orden1']))
{
  $_SESSION['orden1']=[];
  $_SESSION['carrito1'] = "";
}
if (isset($_SESSION['orden2']))
{
  $_SESSION['orden2']=[];
  $_SESSION['carrito2'] = "";
}
if (isset($_SESSION['orden3']))
{
  $_SESSION['orden3']=[];
  $_SESSION['carrito3'] = "";
};
header('Location:supervisor.php');



 ?>
