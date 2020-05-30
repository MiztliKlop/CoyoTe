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

  $idn = htmlspecialchars($_POST['idn']);
  $scpidn = mysqli_real_escape_string($conexion, $idn);

  $nombre = htmlspecialchars($_POST['nombre']);
  $scpnombre = mysqli_real_escape_string($conexion, $nombre);

  $nombreU = htmlspecialchars($_POST['nombreU']);
  $scpnombreU = mysqli_real_escape_string($conexion, $nombreU);

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

  $nuevoU = htmlspecialchars($_POST['nuevoU']);
  $scpnuevoU = mysqli_real_escape_string($conexion, $nuevoU);

  $antes = htmlspecialchars($_POST['antes']);
  $scpantes = mysqli_real_escape_string($conexion, $antes);




define("HASH", "sha256");
define("PASSWORD","!C0y0c4f3¡ ?iS¿ *tH3* ¡b35T!");
define("METHOD","aes-256-cfb8");

function Cifrar($texto){

  $key= openssl_digest(PASSWORD,HASH);
  $iv_len= openssl_cipher_iv_length(METHOD);
  $iv= openssl_random_pseudo_bytes($iv_len);

  $textoCifrado= openssl_encrypt(
    $texto, //Mensaje en texto plano
    METHOD, //método que escogimos para cifrar
    $key, //Contraseña hasheada :)
    OPENSSL_RAW_DATA, //Para que nos regrese sin base64
    $iv //Iv para cifrar
  );

  $ciffWIv=base64_encode($iv.$textoCifrado);

  return $ciffWIv;
}

function Descifrar($cifradoWIv){

  $cifradoWIv=base64_decode($cifradoWIv);

  $iv_len= openssl_cipher_iv_length(METHOD);
  $iv= substr($cifradoWIv,0,$iv_len);
  $cifrado = substr($cifradoWIv,$iv_len);

  $key= openssl_digest(PASSWORD,HASH);

  $desciff=openssl_decrypt(
    $cifrado, //Mensaje cifrado a descifrar
    METHOD, //El método acordado para cifrar
    $key, //La contraseña hasheada
    OPENSSL_RAW_DATA, //PAra que nos retorne los valores en un código
    $iv //iv para descifar
  );

  return $desciff;
}


$encodeC= Cifrar($scpcontraseña);
$decodeC= Descifrar($encodeC);

$encodeU= Cifrar($scpnombreU);
$decodeU= Descifrar($encodeU);

$encodeN= Cifrar($scpnuevoU);
$decodeN= Descifrar($encodeN);

echo "Mensaje Original: ".$scpcontraseña."<br>";
echo "Mensaje Cifrado: ".$encodeC."<br>";
echo "Mensaje Descifrado: ".$decodeC."<br>";

  // $contCodif=codif($scpcontraseña);
  // // $nomCodif=codif($nom);
  // // $usuCodif=codif($usu);
  // $contBase=base64_encode($contCodif);
  // // $nomBase=base64_encode($nomCodif);
  // // $usuBase=base64_encode($usuCodif);




// VALIDADO
if (isset($_POST['insertar']))
{
  $consulta= " SELECT nombreProducto FROM Alimento WHERE nombreProducto =  '".$scpnombre."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if ($eliminado != $scpnombre)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "INSERT INTO Alimento(id_producto, nombreProducto, costo, id_tipo, disponibilidad, imagen) VALUES  ('".$scpid."','".$scpnombre."','".$scpcosto."', '".$scptipo."', '".$scpdisponible."','".$scpimagen."')";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo $eliminado." Agregado Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "YA EXISTE EL PRODUCTO INGRESADO<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  // $sql = "SELECT nombreProducto FROM Alimento";
  // $result = mysqli_query($conexion, $sql) or die("Error " . mysqli_error($connection));
  // $row = mysqli_fetch_array($result);
  // while ( $nombre == $row['nombreProducto'] )
  // {
  //   header('Location: Modificador.php');
  // }
// // $consulta = "SELECT*FROM Sexo WHERE sexo ='".$nombre."'";
// $insertar = "INSERT INTO Alimento(id_producto, nombreProducto, costo, id_tipo, disponibilidad, imagen) VALUES  ('".$scpid."','".$scpnombre."','".$scpcosto."', '".$scptipo."', '".$scpdisponible."','".$scpimagen."')";
// // $consulta = "DELETE FROM Sexo WHERE sexo = '".$nombre."'";
// // $cadenaescapada = mysqli_real_escape_string ($conexion, $nombre, $disponible);
// // $consulta= "SELECT*FROM Alimento WHERE Producto ='".$cadenaescapada."'";
// $respuesta = mysqli_query($conexion, $insertar);
// echo "Agregado <br><br>
//       <a href='Administrador.php'> Regresar </a>";

}

//VALIDADO
if (isset($_POST['eliminar']))

{
  $consulta= " SELECT nombreProducto FROM Alimento WHERE nombreProducto =  '".$scpnombre."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if ($eliminado == $scpnombre)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "DELETE FROM Alimento WHERE  nombreProducto = '".$scpnombre."'";


  $respuesta = mysqli_query($conexion, $eliminar);
  echo $eliminado." Eliminado Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "NO EXISTE EL PRODUCTO INGRESADO<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }

//
// $eliminar = "DELETE FROM Alimento WHERE  nombreProducto = '".$scpnombre."'";
//
// $respuesta = mysqli_query($conexion, $eliminar);
// echo "Eliminado Correctamente<br><br>
//       <a href='Administrador.php'> Regresar </a>";

}

//VALIDADO
if (isset($_POST['buscar']))
{

  $consulta= " SELECT nombreProducto FROM Alimento WHERE nombreProducto =  '".$scpnombre."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if ($eliminado == $scpnombre)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "SELECT*FROM Alimento WHERE nombreProducto ='".$scpnombre."'";


  $respuesta = mysqli_query($conexion, $eliminar);
  echo $eliminado." Encontrado<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
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
  else {
    echo "NO EXISTE EL PRODUCTO INGRESADO<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }

}

//VALIDADO
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

//VALIDADO
if (isset($_POST['changeN']))
{
  $consulta= " SELECT nombreProducto FROM Alimento WHERE nombreProducto =  '".$scpantes."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if ($eliminado == $scpantes)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "UPDATE Alimento SET nombreProducto = '".$scpnuevo."' WHERE nombreProducto = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo Descifrar($eliminado)." Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "NO EXISTE EL PRODUCTO INGRESADO<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }

  //
  //
  // $cambiar = "UPDATE Alimento SET nombreProducto = '".$scpnuevo."' WHERE nombreProducto = '".$scpantes."'";
  //
  // $respuesta = mysqli_query($conexion, $cambiar);
  //
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";
}

//VALIDADO
if (isset($_POST['changeD']))
{

  $consulta= " SELECT nombreProducto FROM Alimento WHERE nombreProducto =  '".$scpantes."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if ($eliminado == $scpantes)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "UPDATE Alimento SET disponibilidad = '".$scpdisponible."' WHERE nombreProducto = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo $eliminado." Nueva Disponibilidad a: ".$scpantes. "<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "NO EXISTE EL PRODUCTO INGRESADO<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }

  //
  // $cambiar = "UPDATE Alimento SET disponibilidad = '".$scpdisponible."' WHERE nombreProducto = '".$scpantes."'";
  //
  // $respuesta = mysqli_query($conexion, $cambiar);
  //
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";
}

//VALIDADO
if (isset($_POST['changeC']))
{

    $consulta= " SELECT nombreProducto FROM Alimento WHERE nombreProducto =  '".$scpantes."' ";
    $respuesta = mysqli_query($conexion, $consulta);
    while($row = mysqli_fetch_array($respuesta))
    {
      $eliminado=$row[0];
    }
    mysqli_close($conexion);

    if ($eliminado == $scpantes)

    {

    $conexion=mysqli_connect("localhost","root","root","CoyoTe");

    $eliminar = "UPDATE Alimento SET costo = '".$scpcosto."' WHERE nombreProducto = '".$scpantes."'";

    $respuesta = mysqli_query($conexion, $eliminar);
    echo $eliminado." Cambiado Correctamente<br><br>
          <a href='Administrador.php'> Regresar A Principal</a><br><br>";
    }
    else {
      echo "NO EXISTE EL PRODUCTO INGRESADO<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
    }
  // $cambiar = "UPDATE Alimento SET costo = '".$scpcosto."' WHERE nombreProducto = '".$scpantes."'";
  //
  // $respuesta = mysqli_query($conexion, $cambiar);
  //
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";
}



//VALIDADO
if (isset($_POST['changeT']))
{

      $consulta= " SELECT nombreProducto FROM Alimento WHERE nombreProducto =  '".$scpantes."' ";
      $respuesta = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($respuesta))
      {
        $eliminado=$row[0];
      }
      mysqli_close($conexion);

      if ($eliminado == $scpantes)

      {

      $conexion=mysqli_connect("localhost","root","root","CoyoTe");

      $eliminar = "UPDATE Alimento SET id_tipo = '".$scptipo."' WHERE nombreProducto = '".$scpantes."'";

      $respuesta = mysqli_query($conexion, $eliminar);
      echo $eliminado." Cambiado Correctamente<br><br>
            <a href='Administrador.php'> Regresar A Principal</a><br><br>";
      }
      else {
        echo "NO EXISTE EL PRODUCTO INGRESADO<br><br>
          <a href='Administrador.php'> Regresar A Principal</a><br><br>";
      }

  //
  // $cambiar = "UPDATE Alimento SET id_tipo = '".$scptipo."' WHERE nombreProducto = '".$scpantes."'";
  //
  // $respuesta = mysqli_query($conexion, $cambiar);
  //
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";
}


//VALIDADO
if (isset($_POST['changeI']))
{

  $consulta= " SELECT nombreProducto FROM Alimento WHERE nombreProducto =  '".$scpantes."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if ($eliminado == $scpantes)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "UPDATE Alimento SET imagen = '".$scpimagen."' WHERE nombreProducto = '".$scpantes."'";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo $eliminado." Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "NO EXISTE EL PRODUCTO INGRESADO<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }

  // $cambiar = "UPDATE Alimento SET imagen = '".$scpimagen."' WHERE nombreProducto = '".$scpantes."'";
  //
  // $respuesta = mysqli_query($conexion, $cambiar);
  //
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";
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

//VALIDADO V
if (isset($_POST['añadir']))
{

  $consulta= " SELECT id_usuario FROM Usuario WHERE id_usuario =  '".$scpid."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if ($eliminado != $scpid)

  {
  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "INSERT INTO Usuario(id_usuario, Nombre, Grupo, Contraseña, id_statusCliente) VALUES ('".$scpid."','".$encodeU."','".$scpgrupo."', '".$encodeC."', '1')";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo "Agregado <br><br>
        <a href='Administrador.php'> Regresar </a>";
  }
  else {
    echo "USUARIO Y NÚMERO DE CUENTA YA EXISTEN<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  // $rest= "SELECT * FROM Usuario  WHERE nombre LIKE '".$nombre."' AND id_usuario LIKE '".$id."'";
  //
  // if ($rest==true)
  // {
// $consulta = "SELECT*FROM Sexo WHERE sexo ='".$nombre."'";
// $insertar = "INSERT INTO Usuario(id_usuario, Nombre, Grupo, Contraseña, id_statusCliente) VALUES ('".$scpid."','".$encodeU."','".$scpgrupo."', '".$encodeC."', '1')";
// $consulta = "DELETE FROM Sexo WHERE sexo = '".$nombre."'";
// $cadenaescapada = mysqli_real_escape_string ($conexion, $nombre, $disponible);
// $consulta= "SELECT*FROM Alimento WHERE Producto ='".$cadenaescapada."'";
// $respuesta = mysqli_query($conexion, $insertar);
    // }
    // else
    // {
    //   echo "Error <br><br>
    //         <a href='Administrador.php'> Regresar </a>";
    // }
}

//VALIDADO
if (isset($_POST['sacar']))
{

$consulta= " SELECT Nombre FROM Usuario WHERE id_usuario =  '".$scpid."' ";
$respuesta = mysqli_query($conexion, $consulta);
while($row = mysqli_fetch_array($respuesta))
{
  $eliminado=$row[0];
}
mysqli_close($conexion);

if (Descifrar($eliminado) == $scpnombreU)

{

$conexion=mysqli_connect("localhost","root","root","CoyoTe");

$eliminar = "DELETE FROM Usuario WHERE Nombre = '".$eliminado."' AND id_usuario = '".$scpid."' ";

$respuesta = mysqli_query($conexion, $eliminar);
echo Descifrar($eliminado)." Eliminado Correctamente<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
}
else {
  echo "USUARIO Y NÚMERO DE CUENTA NO COINCIDEN<br><br>
    <a href='Administrador.php'> Regresar A Principal</a><br><br>";
}

}
//VALIDADO V
if (isset($_POST['search']))
{
  $consulta= " SELECT Nombre FROM Usuario WHERE id_usuario =  '".$scpid."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if (Descifrar($eliminado) == $scpnombreU)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "SELECT*FROM Usuario WHERE id_usuario = '".$scpid."' ";
  $respuesta = mysqli_query($conexion, $eliminar);

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
    echo "  <td>".Descifrar($row[1])."</td>";
    echo "  <td>".$row[2]."</td>";
    echo "  <td>".$row[3]."</td>";
    echo "  <td>".$row[4]."</td>";
    echo "</tr>";
  }
    echo "<a href='Administrador.php'> Regresar </a>";

  }
  else {
    echo "USUARIO Y NÚMERO DE CUENTA NO COINCIDEN<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }

}

//VALIDADO V
if (isset($_POST['base']))

{

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
  echo "  <td>".Descifrar($row[1])."</td>";
  echo "  <td>".$row[2]."</td>";
  echo "  <td>".$row[3]."</td>";
  echo "  <td>".$row[4]."</td>";
  echo "</tr>";
}
echo "<a href='Administrador.php'> Regresar </a>";
}

//VALIDADO V
if (isset($_POST['cambioN']))
{
  $consulta= " SELECT Nombre FROM Usuario WHERE id_usuario =  '".$scpid."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if (Descifrar($eliminado) == $scpnombreU)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "UPDATE Usuario SET Nombre = '".$encodeN."' WHERE Nombre = '".$eliminado."'";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo Descifrar($eliminado)." Cambiado Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "USUARIO ANTERIOR Y NÚMERO DE CUENTA NO COINCIDEN<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  // $cambiar = "UPDATE Usuario SET Nombre = '".$encodeN."' WHERE Nombre = '".$encodeU."'";
  //
  // $respuesta = mysqli_query($conexion, $cambiar);
  //
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";
}

//MEDIO VALIDADO
if (isset($_POST['cambio#']))
{
  $consulta= " SELECT id_usuario FROM Usuario WHERE id_usuario =  '".$scpid."'  ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if ($eliminado != $scpidn)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "UPDATE Usuario SET id_usuario = '".$scpidn."' WHERE id_usuario = '".$scpid."'";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo Descifrar($eliminado)." Cambiada Cuenta Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo " NÚMERO DE CUENTA YA EXISTE<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  // $cambiar = "UPDATE Usuario SET id_usuario = '".$scpid."' WHERE Nombre = '".$scpantes."'";
  // $respuesta = mysqli_query($conexion, $cambiar);
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";
}

//VALIDADO
if (isset($_POST['cambioC']))
{
  $consulta= " SELECT Nombre FROM Usuario WHERE id_usuario =  '".$scpid."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if (Descifrar($eliminado) == $scpnombreU)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "UPDATE Usuario SET Contraseña = '".$encodeC."' WHERE id_usuario = '".$scpid."'";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo "Contraseña de: ".Descifrar($eliminado)." Cambiada Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "USUARIO ANTERIOR Y NÚMERO DE CUENTA NO COINCIDEN<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  // $cambiar = "UPDATE Usuario SET Contraseña = '".$encodeC."' WHERE Nombre = '".$encodeU."'";
  // $respuesta = mysqli_query($conexion, $cambiar);
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";

}



//VALIDADO
if (isset($_POST['cambioG']))
{
  $consulta= " SELECT Nombre FROM Usuario WHERE id_usuario =  '".$scpid."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if (Descifrar($eliminado) == $scpnombreU)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "UPDATE Usuario SET Grupo = '".$scpgrupo."' WHERE  id_usuario = '".$scpid."'";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo "Contraseña de: ".Descifrar($eliminado)." Cambiada Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "USUARIO ANTERIOR Y NÚMERO DE CUENTA NO COINCIDEN<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }

}



//VALIDADO
if (isset($_POST['cambioS']))
{
  $consulta= " SELECT Nombre FROM Usuario WHERE id_usuario =  '".$scpid."' ";
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    $eliminado=$row[0];
  }
  mysqli_close($conexion);

  if (Descifrar($eliminado) == $scpnombreU)

  {

  $conexion=mysqli_connect("localhost","root","root","CoyoTe");

  $eliminar = "UPDATE Usuario SET id_statusCliente = '".$scptipo."' WHERE  id_usuario = '".$scpid."'";

  $respuesta = mysqli_query($conexion, $eliminar);
  echo "Contraseña de: ".Descifrar($eliminado)." Cambiada Correctamente<br><br>
        <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  else {
    echo "USUARIO ANTERIOR Y NÚMERO DE CUENTA NO COINCIDEN<br><br>
      <a href='Administrador.php'> Regresar A Principal</a><br><br>";
  }
  //
  // $cambiar = "UPDATE Usuario SET id_statusCliente = '".$scptipo."' WHERE Nombre = '".$encodeU."'";
  //
  // $respuesta = mysqli_query($conexion, $cambiar);
  //
  // echo "Cambiado Correctamente<br><br>
  //       <a href='Administrador.php'> Regresar </a>";
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

//NO VALIDADO
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

//NO VALIDADO
if (isset($_POST['quitar']))
{

$eliminar = "DELETE FROM Lugar WHERE  lugar = '".$scpnombre."' ";

$respuesta = mysqli_query($conexion, $eliminar);
echo "Eliminado Correctamente<br><br>
      <a href='Administrador.php'> Regresar </a>";

}

//NO VALIDADO
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

//NO VALIDADO
if (isset($_POST['mapa']))
{
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

echo " <a href='Administrador.php'> Regresar A Principal</a><br><br>";


?>
</body>
</html>
