<?php
//Clave:23112002
echo "<!DOCTYPE html>
  <head>
    <meta charset='utf-8'>
    <title>CoyoTé</title>
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=La+Belle+Aurore'/>
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Alice'/>
    <link rel='stylesheet'' type='text/css' href='//fonts.googleapis.com/css?family=Hammersmith+One'/>
    <style>
      body{
        background-color:#D8FA9D;
        width: 50%;
        margin: 0 auto;
        text-align: center;
      }
      table{
        width: 70%;
        margin: 0 auto;
        text-align: center;
      }
      .uno{
        color:rgb(17, 16, 91);
        font-family: 'La Belle Aurore';
        font-size: 33px;
        font-style: normal;
        font-variant: normal;
        font-weight: 700;
        line-height: 30px;
        text-shadow: 5px 5px 5px rgb(32, 25, 54);
      }
      .dos{
        background-color:rgb(124, 174, 207);
      }
      .tres{
        background-color:rgb(95, 123, 172);
      }
      h2{
        color:rgb(15, 15, 40);
        font-family:Sans-serif;
        font-size: 20px;
        font-style: normal;
        font-variant: normal;
        font-weight: 700;
        line-height: 26.4px;
      }
      form{
        width: 80%;
        margin: 0 auto;
        text-align: center;
        font-family:Sans-serif;
        font-size: 16px;
      }
      .cuatro{
        border-radius: 1em ;
        background-color: rgb(84, 158, 113);
      }
      .cuatro:hover{

        background-color: rgb(100, 190, 136);
      }
      .cinco{
        text-align: left;
      }
      a:hover{
        color:rgb(46, 46, 80);
      }
      a{
        color:rgb(30, 30, 93);
      }
    </style>
  </head>
  <body>
    <form action='coyotein_2.php' method='post'>
      <fieldset class='dos'>
        <legend><h2 class='uno'>Bienvenido Supervisor</h2></legend>
        <table>
          <tr>
            <td class='cinco'>Usuario:</td>
            <td><input type='text' name='usuario'></td>
          </tr>
          <tr>
            <td class='cinco'>Contraseña:</td>
            <td><input type='password' name='contraseña'></td>
          </tr>
          <tr>
            <input type='hidden' name='cat' value='2'>
          </tr>
        </table>
        <br><input type='submit' name='inicio' value='Iniciar Sesión' class='cuatro'>
      </fieldset>
    </form>
    <form  action='coyobase.php' method='post'>
      <fieldset class='tres'>
        <h2>Registro de supervisor</h2>
        <table>
          <tr>
            <td class='cinco'>Ingresa tu usuario:</td>
            <td><input type='text' name='usuario' pattern='^([A-Z]{3}|\w{4})\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])$'
            title='Formato de usuario: Iniciales de su apellido seguido de su fecha de nacimiento (aa/mm/dd)'required ></td>
          </tr>
          <tr>
            <td class='cinco'>Elige una contraseña:</td>
            <td><input type='password' maxlenght='30' name='contraseña' placeholder='Mínimo 10 caracteres' required
            pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&$%#!¡?¿.,]))\S{10,30}$'
            title='Asegúrese de ingresar mayúsculas, minúsculas, números y caracteres especiales'></td>
          </tr>
          <tr>
            <td class='cinco'>Ingresa la clave:</td>
            <td><input type='text' name='clave' pattern='^23112002$' required ></td>
          </tr>
          <tr>
            <td><input type='hidden' name='status' value='0'></td>
            <td><input type='hidden' name='categoria' value='2'></td>
            <td><input type='hidden' name='area' value='N/A'></td>
            <td><input type='hidden' name='nombre' value='N/A'></td>
          </tr>
        </table>
        <br><input type='submit' name='inicio' value='Enviar' class='cuatro'><br>
        <hr>
        <h2>¿No eres supervisor?</h2>
        <a href='coyotein.php'>Soy cliente</a><br><a href='inicioA.php'>Soy administrador</a>
      </fieldset>
    </form>
  </body>";
?>
