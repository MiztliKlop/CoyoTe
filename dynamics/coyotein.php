<?php
  echo "<!DOCTYPE html>
  <head>
    <meta charset='utf-8'>
    <title>CoyoTé</title>
    <link rel='stylesheet' href='../statics/css/estiloI.css'>
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=La+Belle+Aurore' />
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Alice' />
    <link rel='stylesheet'' type='text/css' href='//fonts.googleapis.com/css?family=Hammersmith+One' />
  </head>
  <body>
    <header class='titulo'>
      <div class='titulo_2'>
        <table class='uno'>
          <tr>
            <td><img src='../statics/img/PrepaN.png' alt='CoyoTé'></td>
            <td><h1>CoyoTé</h1></td>
          </tr>
        </table>
      </div>
    </header>
    <form action='coyotein_2.php' method='post'>
      <fieldset style='width:600px;' class='tres'>
        <legend><h2>Bienvenido cliente</h2></legend>
        <h3>Si ya eres parte de nuestra comunidad ¡Inicia sesión!</h3>
        <table>
          <tr>
            <td>Usuario:</td>
            <td><input type='text' name='usuario'></td>
          </tr>
          <tr>
            <td>Contraseña:</td>
            <td><input type='password' name='contraseña'></td>
          </tr>
        </table>
        <br><p>Si eres alumno utiliza tu número de cuenta, si eres trabajador utiliza
          tu número de trabajador, si eres profesor o funcionario utiliza tu RFC.</p>
        <br><input type='submit' name='inicio' value='Iniciar Sesión' class='cuatro'>
      </fieldset>
    </form>
    <form  action='categoriaP.php' method='post' >
      <fieldset style='width:600px;' class='dos'>
        <h3>¿No estás registrado?</h3>
        Selecciona tu categoría: <select name='categoria'><br>
              <option value='alumno'>Alumno</option>
              <option value='maestro'>Maestro/funcionario</option>
              <option value='trabajador'>Trabajador</option>
        </select>
        <input type='submit' name='registro' value='Enviar' class='cuatro'>
        <hr>
        <h3>¿No eres cliente?</h3>
        <a href='inicioS.php'>Soy supervisor</a><br><a href='inicioA.php'>Soy administrador</a>
      </fieldset>
    </form>
  </body>";
?>
