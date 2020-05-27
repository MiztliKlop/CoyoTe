<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Supervisor</title>
  </head>
  <body>
    <h1>SUPERVISOR</h1>
    <hr>
    <?php

    if ( isset($_GET['cerrar']) )
    {
      echo "Se cerró sesión previamente";
      session_name("m");
      session_id("5");
      session_start();
      session_unset();
      session_destroy();
    }

     ?>
    <form class="" action="Supervisor.php" method="get">
    Usuario:  <input type="texto" name="usuario" value="">
    <br>
    <br>
    Contraseña:  <input type="password" name="contraseña" value="">
    <br><br>
      <input type="submit" name="envio" value="INGRESAR">
    </form>
  </body>
</html>


<!-- A INVISIBLE  -->
