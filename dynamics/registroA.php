<?php
  $a=date('Y'); //Año actual
  $a=substr($a, 2); //Últimos dos dígitos del año actual
  $b=$a-2; //Se calculan los dígitos validos para el número de cuenta del alumno
  $c=$a-1;
  $d=$a-5;
  $e=$d-1;
  $f=$d-2;
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
          width: 80%;
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
          background-color: rgb(90, 193, 94);
        }
        .tres{
          text-align: left;
        }
      </style>
    </head>
    <body>
    <form  action='coyobase.php' method='post'>"; //Formulario para el registro del alumno
echo  "<fieldset class='dos'>
        <legend><h2>Alumno</h2></legend>
        <table>
          <tr>
            <td class='tres'>Ingresa tu nombre:</td>
            <td><input type='text' name='nombre' pattern='^[A-Za-z]{2,}$' required ></td>
          </tr>
          <tr>
            <td class='tres'>Ingresa tu número de cuenta:</td>
            <td><input type='text' name='usuario' maxlength='9' required pattern='^(1($d|$e|$f)|3($c|$b|$a))\d{6}$'
            title='Tu número de cuenta solo será válido si pertenece a las 3 generaciones cursantes' ></td>
          </tr>
          <tr>
            <td class='tres'>Elige una contraseña:</td>
            <td><input type='password' maxlenght='30' name='contraseña' placeholder='Mínimo 10 caracteres' required
            pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&$%#!¡?¿.,]))\S{10,30}$'
            title='Asegúrese de ingresar mayúsculas, minúsculas, números y caracteres especiales'></td>
          </tr>
          <tr>
            <td class='tres'>Ingresa tu grupo:</td>
            <td><input type='text' name='area' required minlength='3' maxlength='3'
            pattern='^(4(0[1-9]|1[0-7]|5[1-9]|6[0-6])|5(0[1-9]|1[0-8]|5[1-9]|6[0-4])|6(0[1-9]|1[0-9]|5[1-9]|6[0-4]))$'
            title='Ingresa un grupo válido'></td>
          </tr>
          <tr>";
echo        "<td><input type='hidden' name='status' value='1'></td>"; //Input para el status del cliente, en este caso 1=activo
echo        "<td><input type='hidden' name='categoria' value='1'></td>"; //Input para la categoría del usuario, en este caso cliente
echo      "</tr>
        </table>
        <br><input type='submit' name='inicio' value='Enviar' class='uno'><br>
        <h3>¿Te equivocaste de categoría?</h3>
        <a href='coyotein.php'>Regresar</a>
      </fieldset>
    </form>
    </body>";
?>
