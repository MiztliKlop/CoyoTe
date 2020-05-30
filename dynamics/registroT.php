<?php
  echo "<!DOCTYPE html>
    <head>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=La+Belle+Aurore' />
    <link rel='stylesheet'' type='text/css' href='//fonts.googleapis.com/css?family=Hammersmith+One' />
    <title>CoyoTé</title>
    <style>
      form{
        width: 80%;
        margin: 0 auto;
        text-align: center;
        font-family:Sans-serif;
        font-size: 16px;
      }
      table{
        width: 85%;
        margin: 0 auto;
        text-align: center;
      }
      body{
        background-color:#D8FA9D;
        width: 50%;
        margin: 0 auto;
        text-align: center;
      }
      h2 {
        font-family: 'La Belle Aurore';
        font-size: 50px;
        font-style: normal;
        font-variant: normal;
        font-weight: 700;
        line-height: 26.4px;
        color:#223415;
      }
      a:hover{
        color:rgb(22, 99, 17);
        font-family: 'Hammersmith One';
        font-size: 18px;
      }
      a{
        color:rgb(25, 47, 23);
        font-family: 'Hammersmith One';
        font-size: 18px;
      }
      .uno{
        border-radius: 1em ;
        background-color: rgb(240, 179, 77);
      }
      .uno:hover{
        background-color: rgb(187, 140, 61);
      }
      .dos{
        background-color: rgb(143, 249, 106);
      }
      .tres{
        text-align: left;
      }
    </style>
    </head>
    <body>
      <form  action='coyobase.php' method='post'>"; //Formulario para el registro del maestro
echo    "<fieldset class='dos'>
          <legend><h2>Trabajador</h2></legend>
          <table>
            <tr>
              <td class='tres'>Ingresa tu nombre:</td>
              <td><input type='text' name='nombre' pattern='^[A-Za-z]{2,}$' required ></td>
            </tr>
            <tr>
              <td><input type='hidden' name='area' value='N/A'></td>
            </tr>
            <tr>
              <td class='tres'>Elige una contraseña:</td>
              <td><input type='password' maxlenght='30' name='contraseña' placeholder='Mínimo 10 caracteres' required
              pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@$&%#!¡?¿.,]))\S{10,30}$'
              title='Asegúrese de ingresar mayúsculas, minúsculas, números y caracteres especiales'></td>
            </tr>
            <tr>
              <td class='tres'>Ingresa tu número de trabajador:</td>
              <td><input type='text' name='usuario' required placeholder='6 dígitos'
              pattern='^\d{6}$'></td>
            </tr>
            <tr>
              <td><input type='hidden' name='status' value='1'></td>"; //Input para el status del cliente, en este caso 1=activo
echo          "<td><input type='hidden' name='categoria' value='1'></td>"; //Input para la categoría del usuario, en este caso cliente
echo        "</tr>
          </table>
          <br><input type='submit' name='inicio' value='Enviar' class='uno'>
          <hl>
          <h3>¿Te equivocaste de categoría?</h3>
          <a href='coyotein.php'>Regresar</a>
        </fieldset>
      </form>
    </body>";
?>
