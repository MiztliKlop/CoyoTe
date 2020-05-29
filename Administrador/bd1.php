<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php

  $conexion = mysqli_connect("localhost", "root", "root", "CoyoTe");
  $id = htmlspecialchars($_POST['id']);
  $scpid = mysqli_real_escape_string($conexion, $id);

  $nombre = htmlspecialchars($_POST['nombre']);
  $scpnombre = mysqli_real_escape_string($conexion, $nombre);

  $costo = htmlspecialchars($_POST['costo']);
  $scpcosto = mysqli_real_escape_string($conexion, $costo);

  $tipo = htmlspecialchars($_POST['tipo']);
  $scptipo = mysqli_real_escape_string($conexion, $tipo);

  $contraseña = htmlspecialchars($_POST['contraseña']);
  $scpcontraseña = mysqli_real_escape_string($conexion, $contraseña);

  $grupo = htmlspecialchars($_POST['grupo']);
  $scpgrupo = mysqli_real_escape_string($conexion, $grupo);


  if ($tipo == 1)
  {
    $tipo=1;
  }
  elseif ($tipo == 2)
  {
    $tipo=2;
  }

  $disponible = htmlspecialchars($_POST['disponible']);
  $scpdisponible = mysqli_real_escape_string($conexion, $disponible);

  $imagen = htmlspecialchars($_POST['imagen']);
  $scpimagen = mysqli_real_escape_string($conexion, $imagen);

  $nuevo = htmlspecialchars($_POST['nuevo']);
  $scpnuevo = mysqli_real_escape_string($conexion, $nuevo);

  $antes = htmlspecialchars($_POST['antes']);
  $scpantes = mysqli_real_escape_string($conexion, $antes);




if (isset($_POST['insertar']))
{


  // $sql = "SELECT nombreProducto FROM Alimento";
  // $result = mysqli_query($conexion, $sql) or die("Error " . mysqli_error($connection));
  // $row = mysqli_fetch_array($result);
  // while ( $nombre == $row['nombreProducto'] )
  // {
  //   header('Location: Modificador.php');
  // }
// $consulta = "SELECT*FROM Sexo WHERE sexo ='".$nombre."'";
$insertar = "INSERT INTO Alimento(id_producto, nombreProducto, costo, id_tipo, disponibilidad, imagen) VALUES  ('".$scpid."','".$scpnombre."','".$scpcosto."', '".$scptipo."', '".$scpdisponible."','".$scpimagen."')";
// $consulta = "DELETE FROM Sexo WHERE sexo = '".$nombre."'";
// $cadenaescapada = mysqli_real_escape_string ($conexion, $nombre, $disponible);
// $consulta= "SELECT*FROM Alimento WHERE Producto ='".$cadenaescapada."'";
$respuesta = mysqli_query($conexion, $insertar);
echo "Agregado <br><br>
      <a href='Administrador.php'> Regresar </a>";

}


if (isset($_POST['eliminar'])) {

$eliminar = "DELETE FROM Alimento WHERE  nombreProducto = '".$scpnombre."'";

$respuesta = mysqli_query($conexion, $eliminar);
echo "Eliminado Correctamente<br><br>
      <a href='Administrador.php'> Regresar </a>";

}


if (isset($_POST['buscar']))
{

$consulta = "SELECT*FROM Alimento WHERE nombreProducto ='".$scpnombre."'";
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
  echo "  <td>".$row[4]."</td>";
  echo "  <td><img src='".$row[5]."' alt='Alimento' height='20%'></td>";
  echo "</tr>";
  echo "<a href='Administrador.php'> Regresar </a>";
}

}


if (isset($_POST['todo']))
{

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
  echo "  <td>$".$row[2]."</td>";
  echo "  <td>".$row[3]."</td>";
  echo "  <td>".$row[4]."</td>";
  echo "  <td><img src='".$row[5]."' alt='Alimento' height='20%'></td>";
  echo "</tr>";
}
  echo "<a href='Administrador.php'> Regresar </a>";

}


if (isset($_POST['changeN']))
{
  $cambiar = "UPDATE Alimento SET nombreProducto = '".$scpnuevo."' WHERE nombreProducto = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['changeD']))
{

  $cambiar = "UPDATE Alimento SET disponibilidad = '".$scpdisponible."' WHERE nombreProducto = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['changeC']))
{

  $cambiar = "UPDATE Alimento SET costo = '".$scpcosto."' WHERE nombreProducto = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['changeT']))
{

  $cambiar = "UPDATE Alimento SET id_tipo = '".$scptipo."' WHERE nombreProducto = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['changeI']))
{

  $cambiar = "UPDATE Alimento SET imagen = '".$scpimagen."' WHERE nombreProducto = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}


//
// $result = mysql_query('blah blah blah this is your query');
// if ($result) {
//      if (mysql_num_rows($result) == 0) {
//         // do one thing
//      }
//      else {
//         // do another thing
//      }
// }

if (isset($_POST['añadir']))
{
  //
  // $rest= "SELECT * FROM Usuario  WHERE nombre LIKE '".$nombre."' AND id_usuario LIKE '".$id."'";
  //
  // if ($rest==true)
  // {
// $consulta = "SELECT*FROM Sexo WHERE sexo ='".$nombre."'";
$insertar = "INSERT INTO Usuario(id_usuario, Nombre, Grupo, Contraseña, id_statusCliente) VALUES ('".$scpid."','".$scpnombre."','".$scpgrupo."', '".$scpcontraseña."', '1')";
// $consulta = "DELETE FROM Sexo WHERE sexo = '".$nombre."'";
// $cadenaescapada = mysqli_real_escape_string ($conexion, $nombre, $disponible);
// $consulta= "SELECT*FROM Alimento WHERE Producto ='".$cadenaescapada."'";
$respuesta = mysqli_query($conexion, $insertar);
echo "Agregado <br><br>
      <a href='Administrador.php'> Regresar </a>";
    // }
    // else
    // {
    //   echo "Error <br><br>
    //         <a href='Administrador.php'> Regresar </a>";
    // }

}


if (isset($_POST['sacar']))
{

$eliminar = "DELETE FROM Usuario WHERE  Nombre = '".$scpnombre."' AND id_usuario = '".$scpid."' ";

$respuesta = mysqli_query($conexion, $eliminar);
echo "Eliminado Correctamente<br><br>
      <a href='Administrador.php'> Regresar </a>";

}


if (isset($_POST['search']))
{

  // $consulta = "SELECT*FROM Usuario WHERE Nombre = '".$nombre."' AND id_usuario = '".$id."' ";
$consulta = "SELECT*FROM Usuario WHERE Nombre = '".$scpnombre."' ";
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
  echo "<a href='Administrador.php'> Regresar </a>";
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
echo "<a href='Administrador.php'> Regresar </a>";
}


if (isset($_POST['cambioN']))
{
  $cambiar = "UPDATE Usuario SET Nombre = '".$scpnuevo."' WHERE Nombre = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['cambio#']))
{

  $cambiar = "UPDATE Usuario SET id_usuario = '".$scpid."' WHERE Nombre = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['cambioC']))
{

  $cambiar = "UPDATE Usuario SET Contraseña = '".$scpcontraseña."' WHERE Nombre = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiar);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['cambioG']))
{

  $cambiarG = "UPDATE Usuario SET Grupo = '".$scpgrupo."' WHERE Nombre = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $cambiarG);

  echo "Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar </a>";
}
if (isset($_POST['cambioS']))
{

  $cambiar = "UPDATE Usuario SET id_statusCliente = '".$scptipo."' WHERE Nombre = '".$scpantes."'";

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


if (isset($_POST['poner']))
{
// $consulta = "SELECT*FROM Sexo WHERE sexo ='".$nombre."'";
$insertar = "INSERT INTO Lugar(id_lugar, lugar) VALUES ('".$scpid."','".$scpnombre."')";
// $consulta = "DELETE FROM Sexo WHERE sexo = '".$nombre."'";
// $cadenaescapada = mysqli_real_escape_string ($conexion, $nombre, $disponible);
// $consulta= "SELECT*FROM Alimento WHERE Producto ='".$cadenaescapada."'";
$respuesta = mysqli_query($conexion, $insertar);
echo "Agregado <br><br>
      <a href='Administrador.php'> Regresar </a>";
}


if (isset($_POST['quitar']))
{

$eliminar = "DELETE FROM Lugar WHERE  lugar = '".$scpnombre."' ";

$respuesta = mysqli_query($conexion, $eliminar);
echo "Eliminado Correctamente<br><br>
      <a href='Administrador.php'> Regresar </a>";

}


if (isset($_POST['localizar']))
{
  // $consulta = "SELECT*FROM Usuario WHERE Nombre = '".$nombre."' AND id_usuario = '".$id."' ";
$consulta = "SELECT*FROM Lugar WHERE lugar = '".$scpnombre."' ";
$respuesta = mysqli_query($conexion, $consulta);
echo "<table border=1>
        <tr>
          <td>Sector/ID</td>
          <td>Lugar</td>
        </tr>";
while($row = mysqli_fetch_array($respuesta))
{
  echo "<tr>";
  echo "  <td>".$row[0]."</td>";
  echo "  <td>".$row[1]."</td>";
  echo "</tr>";
}
 echo "<a href='Administrador.php'> Regresar </a>";
}


if (isset($_POST['mapa'])) {



$mostrar = "SELECT*FROM Lugar";
$respuesta = mysqli_query($conexion, $mostrar);
echo "<table border=1>
        <tr>
          <td>Sector/ID</td>
          <td>Lugar</td>
        </tr>";
while($row = mysqli_fetch_array($respuesta))
{
  echo "<tr>";
  echo "  <td>".$row[0]."</td>";
  echo "  <td>".$row[1]."</td>";
  echo "</tr>";
}
  echo "<img src='http://www.prepa6.unam.mx/ENP6/_P6/plantel/img/P6_-_Mapa.jpg' width='100%'>";
  echo "<a href='Administrador.php'> Regresar </a>";

}


?>
</body>
</html>
