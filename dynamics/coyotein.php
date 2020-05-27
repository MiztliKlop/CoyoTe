<?php
echo "<!DOCTYPE html>
  <head>
    <meta charset='utf-8'>
    <title>CoyoTé</title>
    <style>
    form{
      width: 50%;
      margin: 0 auto;
      text-align: center;
    }
    table{
      width: 50%;
      margin: 0 auto;
      text-align: center;
    }
    h1,h2,h3{
      text-align: center;
    }
    </style>
  </head>
  <body>
    <h1>CoyoTé</h1>
    <form  action='categoriaP.php' method='post'>
      <fieldset style='width:600px;'>
        <legend><h2>Bienvenido cliente</h2></legend>
        <h3>¿No estás registrado?</h3>
        Selecciona tu categoría: <select name='categoria'><br>
              <option value='alumno'>Alumno</option>
              <option value='maestro'>Maestro/funcionario</option>
              <option value='trabajador'>Trabajador</option>
            </select>
            <input type='submit' name='registro' value='Enviar'>
      </fieldset>
    </form>
    <form action='coyotein_2.php' method='post'>
      <fieldset style='width:600px;'>
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
      <input type='submit' name='inicio' value='Iniciar Sesión'>
      <hr>
      <h3>¿No eres cliente?</h3>
      <a href='sup.php'>Soy supervisor</a><br><a href='admin.php'>Soy administrador</a>
      </fieldset>
    </form>
  </body>";
?>
