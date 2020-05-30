<?php
  echo "<!DOCTYPE html>
    <head>
      <meta charset='utf-8'>
      <title>CoyoTé</title>
      <style>
      form{
        width: 60%;
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
          <legend><h2>Trabajador</h2></legend>
          <table>
            <tr>
              <td>Ingresa tu nombre:</td>
              <td><input type='text' name='nombre' pattern='^[A-Za-z]{2,}$' required ></td>
            </tr>
            <tr>
              <td><input type='hidden' name='area' value='N/A'></td>
            </tr>
            <tr>
              <td>Elige una contraseña:</td>
              <td><input type='password' maxlenght='30' name='contraseña' placeholder='Mínimo 10 caracteres' required
              pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@$&%#!¡?¿.,]))\S{10,30}$'
              title='Asegúrese de ingresar mayúsculas, minúsculas, números y caracteres especiales'></td>
            </tr>
            <tr>
              <td>Ingresa tu número de trabajador:</td>
              <td><input type='text' name='usuario' required
              pattern='^\d{6}$'></td>
            </tr>
            <tr>
              <td><input type='hidden' name='status' value='1'></td>
              <td><input type='hidden' name='categoria' value='1'></td>
            </tr>
          </table>
          <br><input type='submit' name='inicio' value='Enviar'>
          <hl>
          <h3>¿Te equivocaste de categoría?</h3>
          <a href='coyotein.php'>Regresar</a>
        </fieldset>
      </form>
    </body>";
?>
