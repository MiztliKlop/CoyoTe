<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <form  action="Ingreso.php" method="get" >
    <input type="submit" name="cerrar" value="Cerrar Sesión">
    </form>
    <meta charset="utf-8">
    <title>Supervisor</title>
    <style media="screen">
      h1, iframe
      {
        text-align:center;
      }
    </style>
  </head>
  <body>
    <h1>Supervisor</h1>
    <hr>

    <?php
    session_name("m");
    session_id("5");
    session_start();
    $_SESSION['usuario'] = $_GET['usuario'];
    echo "¡Bienvenido ".$_SESSION['usuario']."!<br><br>";

    $numOrder = $_GET['orden'];
    $place = $_GET['lugar'];
    if (  isset($_GET['envio']) )
    {
      for ($i=0; $i < $numOrder; $i++)
      {

            if ( $place == "cafe" )
            {
              setcookie("tiempo", "Tiempo Restante");
              echo
              "<table border=3px>
              <tr>
              <td>";
              echo $place;
              echo $numOrder;
              echo
              "</td>
              </tr>
              </table>";
  ?>
  <br>
      <iframe src="Otro.php" width="73%" height="60" frameborder="0" scrolling="no" ></iframe>
      <br>
      <?php
    }
    else {
      setcookie("tiempo", "Tiempo Restante");
      echo
      "<table border=3px>
      <tr>
      <td>";
      echo $place;
      echo $numOrder;
      echo
      "</td>
      </tr>
      </table>";

    }
    }
  }
  if ( isset($_GET['cerrar']) )
  {
    echo "string";
    session_name("m");
    session_id("5");
    session_start();
    session_unset();
    session_destroy();
  }
    ?>
  </footer>
    </form>
  </body>
</html>
