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
          <legend><h2>Maestro/funcionario</h2></legend>
          <table>
            <tr>
              <td>Ingresa tu nombre:</td>
              <td><input type='text' name='nombre' pattern='^[A-Za-z]{2,}$' required ></td>
            </tr>
            <tr>
              <td>Selecciona tu colegio:</td>
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
              <td>Elige una contraseña:</td>
              <td><input type='password' maxlenght='30' name='contraseña' placeholder='Mínimo 10 caracteres' required
              pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@$&%#!¡?¿.,]))\S{10,30}$'
              title='Asegúrese de ingresar mayúsculas, minúsculas, números y caracteres especiales'></td>
            </tr>
            <tr>
              <td>Ingresa tu RFC:</td>
              <td><input type='text' name='usuario' required
              pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$'></td>
            </tr>
            <tr>
              <td><input type='hidden' name='status' value='1'></td>
            </tr>
          </table>
          <br><input type='submit' name='inicio' value='Enviar'>
          <hl>
          <h3>¿Te equivocaste de categoría?</h3>
          <a href='coyotein.php'>Regresar</a>
        </fieldset>
      </form>
    </body>";
    if(isset($_POST['inicio'])){
      header('Location:registroCor.php');
    }
?>
