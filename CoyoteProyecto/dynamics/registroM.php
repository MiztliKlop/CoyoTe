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
          background-color: rgb(92, 221, 104);
        }
        .tres{
          text-align: left;
        }
      </style>
    </head>
    <body>
      <form  action='coyobase.php' method='post'>"; //Formulario para el registro de maestro/funcionario
echo    "<fieldset class='dos'>
          <legend><h2>Maestro/funcionario</h2></legend>
          <table>
            <tr>
              <td class='tres'>Ingresa tu nombre:</td>
              <td><input type='text' name='nombre' pattern='^[A-Za-z]{2,}$' required ></td>
            </tr>
            <tr>
              <td class='tres'>Selecciona tu colegio:</td>
              <td><select name='area'>
                    <option value='ete'>ETE</option>
                    <optgroup label='Área 1'>
                      <option value='Fís'>Física</option>
                      <option value='Mat'>Matemáticas</option>
                      <option value='Inf'>Informática</option>
                    </optgroup>
                    <optgroup label='Área 2'>
                      <option value='Bio'>Biología</option>
                      <option value='EduF'>Educación Física</option>
                      <option value='MFS'>Morfología, Fisiología y Salud</option>
                      <option value='OE'>Orientación Educativa</option>
                      <option value='PsiH'>Psicología e higiene mental</option>
                      <option value='Qui'>Química</option>
                    </optgroup>
                    <optgroup label='Área 3'>
                      <option value='CS'>Ciencias Sociales</option>
                      <option value='Geo'>Geografía</option>
                      <option value='His'>Historia</option>
                    </optgroup>
                    <optgroup label='Área 4'>
                      <option value='Ale'>Alemán</option>
                      <option value='ArtP'>Artes Plásticas</option>
                      <option value='Danz'>Danza</option>
                      <option value='DM'>Dibujo y modelado</option>
                      <option value='Filos'>Filosofía</option>
                      <option value='Fran'>Francés</option>
                      <option value='Ing'>Inglés</option>
                      <option value='ETE'>Italiano</option>
                      <option value='LC'>Letras clásicas</option>
                      <option value='Lit'>Literatura</option>
                      <option value='Mus'>Música</option>
                      <option value='Teat'>Teatro</option>
                    </optgroup>
                  </select></td>
            </tr>
            <tr>
              <td class='tres'>Elige una contraseña:</td>
              <td><input type='password' maxlenght='30' name='contraseña' placeholder='Mínimo 10 caracteres' required
              pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@$&%#!¡?¿.,]))\S{10,30}$'
              title='Asegúrese de ingresar mayúsculas, minúsculas, números y caracteres especiales'></td>
            </tr>
            <tr>
              <td class='tres'>Ingresa tu RFC:</td>
              <td><input type='text' name='usuario' required
              pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$'></td>
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
