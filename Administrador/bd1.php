<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $costo = $_POST['costo'];
  $tipo = $_POST['tipo'];
  $contraseña = $_POST['contraseña'];
  $grupo = $_POST['grupo'];

  if ($tipo == 1)
  {
    $tipo=1;
  }
  elseif ($tipo == 2)
  {
    $tipo=2;
  }
  $disponible = $_POST['disponible'];
  $imagen = $_POST['imagen'];
  $nuevo = $_POST['nuevo'];
  $antes = $_POST['antes'];

$conexion = mysqli_connect("localhost", "root", "root", "CoyoTe");


if (isset($_POST['insertar']))
{
// $consulta = "SELECT*FROM Sexo WHERE sexo ='".$nombre."'";
$insertar = "INSERT INTO Alimento(id_producto, nombreProducto, costo, id_tipo, disponibilidad, imagen) VALUES ('".$id."','".$nombre."','".$costo."', '".$tipo."', '".$disponible."','".$imagen."')";
// $consulta = "DELETE FROM Sexo WHERE sexo = '".$nombre."'";
// $cadenaescapada = mysqli_real_escape_string ($conexion, $nombre, $disponible);
// $consulta= "SELECT*FROM Alimento WHERE Producto ='".$cadenaescapada."'";
$respuesta = mysqli_query($conexion, $insertar);
echo "Agregado <br><br>
      <a href='Administrador.php'> Regresar </a>";
}


if (isset($_POST['eliminar'])) {


$eliminar = "DELETE FROM Alimento WHERE  nombreProducto = '".$nombre."'";

$respuesta = mysqli_query($conexion, $eliminar);
echo "Eliminado Correctamente<br><br>
      <a href='Administrador.php'> Regresar </a>";

}


if (isset($_POST['buscar']))
{

$consulta = "SELECT*FROM Alimento WHERE nombreProducto ='".$nombre."'";
$respuesta = mysqli_query($conexion, $consulta);
echo "<table border=1>
        <tr>
          <td>ID</td>
          <td>Producto</td>
          <td>Costo</td>
          <td>Tipo</td>
          <td>Disponibilidad</td>
          <td>Imagen</td>
        </tr>";
while($row = mysqli_fetch_array($respuesta))
{
  echo "<tr>";
  echo "  <td>".$row[0]."</td>";
  echo "  <td>".$row[1]."</td>";
  echo "  <td>$".$row[2]."</td>";
  echo "  <td>".$row[3]."</td>";
  echo "  <td>$".$row[4]."</td>";
  echo "  <td><img src='".$row[5]."' alt='Alimento' height='20%'></td>";
  echo "</tr>";
}

}


if (isset($_POST['todo'])) {



$mostrar = "SELECT*FROM Alimento";
$respuesta = mysqli_query($conexion, $mostrar);
echo "<table>
        <tr>
        <td>ID</td>
        <td>Producto</td>
        <td>Costo</td>
        <td>Tipo</td>
        <td>Disponibilidad</td>
        <td>Imagen</td>
        </tr>";
while($row = mysqli_fetch_array($respuesta))
{
  echo "<tr>";
  echo "  <td>".$row[0]."</td>";
  echo "  <td>".$row[1]."</td>";
  echo "  <td>".$row[2]."</td>";
  echo "  <td>$".$row[3]."</td>";
  echo "  <td>$".$row[4]."</td>";
  echo "  <td><img src='".$row[5]."' alt='Alimento' height='20%'></td>";
  echo "</tr>";
}
}


if (isset($_POST['changeN']))
{
  $cambiar = "UPDATE Alimento SET nombreProducto = '".$nuevo."' WHERE nombreProducto = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['changeD']))
{

  $cambiar = "UPDATE Alimento SET disponibilidad = '".$disponible."' WHERE nombreProducto = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['changeC']))
{

  $cambiar = "UPDATE Alimento SET costo = '".$costo."' WHERE nombreProducto = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['changeT']))
{

  $cambiar = "UPDATE Alimento SET id_tipo = '".$tipo."' WHERE nombreProducto = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['changeI']))
{

  $cambiar = "UPDATE Alimento SET imagen = '".$imagen."' WHERE nombreProducto = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}















if (isset($_POST['añadir']))
{
// $consulta = "SELECT*FROM Sexo WHERE sexo ='".$nombre."'";
$insertar = "INSERT INTO Usuario(id_usuario, Nombre, Grupo, Contraseña, id_statusCliente) VALUES ('".$id."','".$nombre."','".$grupo."', '".$contraseña."', '1')";
// $consulta = "DELETE FROM Sexo WHERE sexo = '".$nombre."'";
// $cadenaescapada = mysqli_real_escape_string ($conexion, $nombre, $disponible);
// $consulta= "SELECT*FROM Alimento WHERE Producto ='".$cadenaescapada."'";
$respuesta = mysqli_query($conexion, $insertar);
echo "Agregado <br><br>
      <a href='Administrador.php'> Regresar </a>";
}


if (isset($_POST['sacar']))
{

$eliminar = "DELETE FROM Usuario WHERE  Nombre = '".$nombre."' AND id_usuario = '".$id."' ";

$respuesta = mysqli_query($conexion, $eliminar);
echo "Eliminado Correctamente<br><br>
      <a href='Administrador.php'> Regresar </a>";

}


if (isset($_POST['search']))
{

  // $consulta = "SELECT*FROM Usuario WHERE Nombre = '".$nombre."' AND id_usuario = '".$id."' ";
$consulta = "SELECT*FROM Usuario WHERE Nombre = '".$nombre."' ";
$respuesta = mysqli_query($conexion, $consulta);
echo "<table border=1>
        <tr>
          <td>ID</td>
          <td>Usuario</td>
          <td>Grupo</td>
          <td>Contraseña</td>
          <td>Status</td>
        </tr>";
while($row = mysqli_fetch_array($respuesta))
{
  echo "<tr>";
  echo "  <td>".$row[0]."</td>";
  echo "  <td>".$row[1]."</td>";
  echo "  <td>".$row[2]."</td>";
  echo "  <td>".$row[3]."</td>";
  echo "  <td>".$row[4]."</td>";
  echo "</tr>";
}

}


if (isset($_POST['base'])) {



$mostrar = "SELECT*FROM Usuario";
$respuesta = mysqli_query($conexion, $mostrar);
echo "<table border=1>
        <tr>
          <td>ID</td>
          <td>Usuario</td>
          <td>Grupo</td>
          <td>Contraseña</td>
          <td>Status</td>
        </tr>";
while($row = mysqli_fetch_array($respuesta))
{
  echo "<tr>";
  echo "  <td>".$row[0]."</td>";
  echo "  <td>".$row[1]."</td>";
  echo "  <td>".$row[2]."</td>";
  echo "  <td>".$row[3]."</td>";
  echo "  <td>".$row[4]."</td>";
  echo "</tr>";
}
}


if (isset($_POST['cambioN']))
{
  $cambiar = "UPDATE Usuario SET Nombre = '".$nuevo."' WHERE Nombre = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['cambio#']))
{

  $cambiar = "UPDATE Usuario SET id_usuario = '".$id."' WHERE Nombre = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['cambioC']))
{

  $cambiar = "UPDATE Usuario SET Contraseña = '".$contraseña."' WHERE Nombre = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['cambioG']))
{

  $cambiarG = "UPDATE Usuario SET Grupo = '".$grupo."' WHERE Nombre = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiarG);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['cambioS']))
{

  $cambiar = "UPDATE Usuario SET id_statusCliente = '".$tipo."' WHERE Nombre = '".$antes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
//
//
//
// if (isset($_POST['añadir']))
// {
// // $consulta = "SELECT*FROM Sexo WHERE sexo ='".$nombre."'";
// $añadir = "INSERT INTO Usuario(id_usuario, Nombre, Grupo, Contraseña, id_statusCliente) VALUES ('".$id."','".$nombre."','".$grupo."', '".$contraseña."', '1')";
// // $consulta = "DELETE FROM Sexo WHERE sexo = '".$nombre."'";
// // $cadenaescapada = mysqli_real_escape_string ($conexion, $nombre, $disponible);
// // $consulta= "SELECT*FROM Alimento WHERE Producto ='".$cadenaescapada."'";
// $respuesta = mysqli_query($conexion, $añadir);
// echo "Añadido <br><br>
//       <a href='Administrador.php'> Regresar </a>";
// }
//
//
// if (isset($_POST['eliminar'])) {
//
//
// $eliminar = "DELETE FROM Alimento WHERE  Producto = '".$nombre."'";
//
// $respuesta = mysqli_query($conexion, $eliminar);
// echo "Eliminado Correctamente<br><br>
//       <a href='Administrador.php'> Regresar </a>";
//
// }
//
//
// if (isset($_POST['buscar'])) {
//
// $consulta = "SELECT*FROM Alimento WHERE Producto ='".$nombre."'";
// $respuesta = mysqli_query($conexion, $consulta);
// echo "<table>
//         <tr>
//           <td>ID</td>
//           <td>Producto</td>
//           <td>Disponibilidad</td>
//           <td>Costo</td>
//         </tr>";
// while($row = mysqli_fetch_array($respuesta))
// {
//   echo "<tr>";
//   echo "  <td>".$row[0]."</td>";
//   echo "  <td>".$row[1]."</td>";
//   echo "  <td>".$row[2]."</td>";
//   echo "  <td>$".$row[3]."</td>";
//
//   echo "</tr>";
// }
//
//
// }
//
//
// if (isset($_POST['todo'])) {
//
//
//
// $mostrar = "SELECT*FROM Alimento";
// $respuesta = mysqli_query($conexion, $mostrar);
// echo "<table>
//         <tr>
//           <td>ID</td>
//           <td>Producto</td>
//           <td>Disponibilidad</td>
//           <td>Costo</td>
//           <td>Imagen</td>
//         </tr>";
// while($row = mysqli_fetch_array($respuesta))
// {
//   echo "<tr>";
//   echo "  <td>".$row[0]."</td>";
//   echo "  <td>".$row[1]."</td>";
//   echo "  <td>".$row[2]."</td>";
//   echo "  <td>$".$row[3]."</td>";
//   echo "  <td><img src='".$row[4]."' alt='Alimento' height='20%'></td>";
//   echo "</tr>";
// }
// }
//
//
// if (isset($_POST['changeN']))
// {
//   $cambiar = "UPDATE Alimento SET Producto = '".$nuevo."' WHERE Producto = '".$antes."'";
//
//
//
//   $respuesta = mysqli_query($conexion, $cambiar);
//
//   echo "Cambiado Correctamente<br><br>
//         <a href='Administrador.php'> Regresar </a>";
// }
// if (isset($_POST['changeD']))
// {
//
//   $cambiar = "UPDATE Alimento SET Disponibilidad = '".$disponible."' WHERE Producto = '".$antes."'";
//
//   $respuesta = mysqli_query($conexion, $cambiar);
//
//   echo "Cambiado Correctamente<br><br>
//         <a href='Administrador.php'> Regresar </a>";
// }
// if (isset($_POST['changeC']))
// {
//
//   $cambiar = "UPDATE Alimento SET Costo = '".$costo."' WHERE Producto = '".$antes."'";
//
//
//   $respuesta = mysqli_query($conexion, $cambiar);
//
//   echo "Cambiado Correctamente<br><br>
//         <a href='Administrador.php'> Regresar </a>";
// }
?>
</body>
</html>
