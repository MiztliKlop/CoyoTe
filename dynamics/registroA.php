<?php
  echo "<!DOCTYPE html>
    <head>
      <meta charset='utf-8'>
      <title>CoyoTé</title>
      <style>
      form{
        width: 55%;
        margin: 0 auto;
        text-align: center;
      }
      table{
        width: 50%;
        margin: 0 auto;
        text-align: center;
      }
      </style>
    </head>
    <body>
    <form  action='coyobase.php' method='post'>
      <fieldset >
        <legend><h2>Alumno</h2></legend>
        <table>
          <tr>
            <td>Ingresa tu nombre:</td>
            <td><input type='text' name='nombre' pattern='^[A-Za-z]{2,}$' required ></td>
          </tr>
          <tr>
            <td>Ingresa tu número de cuenta:</td>
            <td><input type='text' name='usuario' maxlength='9' required pattern='^\d{9}$' ></td>
          </tr>
          <tr>
            <td>Elige una contraseña:</td>
            <td><input type='password' maxlenght='30' name='contraseña' placeholder='Mínimo 10 caracteres' required
            pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&$%#!¡?¿.,]))\S{10,30}$'
            title='Asegúrese de ingresar mayúsculas, minúsculas, números y caracteres especiales'></td>
          </tr>
          <tr>
            <td>Ingresa tu grupo:</td>
            <td><input type='text' name='area' required minlength='3' maxlength='3'
            pattern='^(4(0[1-9]|1[0-7]|5[1-9]|6[0-6])|5(0[1-9]|1[0-8]|5[1-9]|6[0-4])|6(0[1-9]|1[0-9]|5[1-9]|6[0-4]))$'
            title='Ingresa un grupo válido'></td>
          </tr>
          <tr>
            <td><input type='hidden' name='status' value='1'></td>
          </tr>
        </table>
        <br><input type='submit' name='inicio' value='Enviar'>
        <h3>¿Te equivocaste de categoría?</h3>
        <a href='coyotein.php'>Regresar</a>
      </fieldset>
    </form>
    </body>";
    if(isset($_POST['inicio'])){
      header('Location:registroCor.php');
    }


?>
