<?php
/******************************************************
*Página que en caso de ser la primer orden del usuario
*dará la opción de escoger el lugar donde recogerá el pedido.
*De igual manera realiza las validaciones de disponibilidad
*de los productos seleccionados, como también que no se hayan
*seleccionado más de dos alimentos preparados o que ya exista en
*el pedido. En caso de tener una orden en el pedido, pondrá
el lugar de la orden ya existente.
*********************************************************/
define("DBUSER","root");
define("DBHOST","localhost");
define("PASSWORD","root");
function borrar()
{
  $_SESSION['pedidoTotal']=[];
  $_SESSION['validacion']=0;
  $_SESSION['cuenta']=0;

  if (isset($_SESSION['orden1']))
  {
    $_SESSION['orden1']=[];
  }
  if (isset($_SESSION['orden2']))
  {
    $_SESSION['orden2']=[];
  }
  if (isset($_SESSION['orden3']))
  {
    $_SESSION['orden3']=[];
  }
}

function connectDB2 ($base)
{
  $con = mysqli_connect(DBHOST, DBUSER, PASSWORD, $base);
  if (!$con)
  {
    echo "No se ha podido acceder a la base. <br>";
  }
  return $con;
}
$conexion = connectDB2("pruebas");
if(!$conexion)
{
  echo mysqli_connect_error()."<br>";
  echo mysqli_connect_errno()."<br>";
  exit();
}
else
{
  session_start();
  $verificacion=[];
  $existencia_repeticiones=[];
  $cambio_lugar=[];
  $y = $_SESSION['transporte'];
  $usuario_en_uso="'$y'";


  foreach ($_SESSION['pedidoTotal'] as $key => $value)
  {

    $alimento_a_evaluar=$value[0];
    $tipo_alimento ="SELECT*FROM Alimento WHERE id_producto=$alimento_a_evaluar";
    $consul_tipo_alimento = mysqli_query($conexion,$tipo_alimento);
    $resp_tipo_alimento = mysqli_fetch_array($consul_tipo_alimento);
    $rep="SELECT*FROM pedido NATURAL JOIN Alimento WHERE id_usuario = $usuario_en_uso";
    $resprep= mysqli_query($conexion,$rep);
    while($existencia_unidades = mysqli_fetch_array($resprep,MYSQLI_ASSOC))
    {
      if ($existencia_unidades['id_status'] == 2)
      {
        if ($existencia_unidades['id_tipo']== 2 && $resp_tipo_alimento['id_tipo'] == 2)

        {
          array_push($existencia_repeticiones,1);
        }
      }

    }
  }
  foreach ($_SESSION['pedidoTotal'] as $key => $value)
  {
    $consulta_alpreparado="SELECT*FROM Alimento WHERE id_producto = $value[0]";
    $alimentoPreparado = mysqli_query($conexion,$consulta_alpreparado);
    $verdadero =  mysqli_fetch_array($alimentoPreparado,MYSQLI_ASSOC);
    if ($verdadero['id_tipo'] == 2)
    {
      for ($i=0; $i < $value[1] ; $i++)
      {
        array_push($verificacion,1);
      }
    }
  }

  $consulta_alpreparado_anterior="SELECT*FROM pedido NATURAL JOIN Usuario WHERE id_usuario = $usuario_en_uso";
  $lugar = mysqli_query($conexion,$consulta_alpreparado_anterior);
  while($existencia_pedidos = mysqli_fetch_array($lugar))
  {
    if ($existencia_pedidos['id_status'] == 2)
    {
      array_push($cambio_lugar,1);
    }

  }
  $verificador_disponibilidad = [];
  foreach ($_SESSION['pedidoTotal'] as $key => $value)
  {
    $valid_suficiente=$value[0];
    $consulta_suficiencia= "SELECT*FROM Alimento WHERE id_producto = $valid_suficiente";
    $accion_suficiencia = mysqli_query($conexion,$consulta_suficiencia);
    while ($pedido_actual = mysqli_fetch_array($accion_suficiencia))
    {
    $actual_disponibilidad = $pedido_actual['disponibilidad'];
    $resultado = $actual_disponibilidad - $value[1];

      if ($resultado < 0)
      {
        array_push($verificador_disponibilidad,1);
      }
    }
  }

  if(isset($_SESSION['pedidoTotal']) && $_SESSION['pedidoTotal']!= "")
  {
    if (count($_SESSION['pedidoTotal'])!= 0) {

      if(count($verificacion)<2 && count($existencia_repeticiones)== 0)
      {
        if (count($verificador_disponibilidad) == 0)
        {
          if (count($cambio_lugar) == 0 && isset($_SESSION['pedidoTotal']))
          {
          echo "Estimado ".$_SESSION['usuario']." para mejorar tu experiencia con Coyoté
          tenemos la opción de entrega al lugar donde te encuentres.";

          $consulta_lugar = "SELECT * FROM Lugar";
          $pulpo = mysqli_query($conexion,$consulta_lugar);
          echo "Selecciona dónde recogerás el pedido: <br>";

          echo "<form action='cocina.php' method='post'>
          <select  name='lugar'>";

          while($fila = mysqli_fetch_array($pulpo))
          {
            echo "<option value='".$fila['id_lugar']."'>".$fila['lugar']."</option>";

          }
          echo "</select><br><br>";
          echo "<input type='submit' value='¡A la cocina!'>";
          echo "</form>";
          }
          elseif(count($cambio_lugar) != 0 && isset($_SESSION['pedidoTotal']))
          {
            mysqli_close($conexion);
            header('Location: cocina.php');
          }
        }
        else
        {

          borrar();
          echo "Has seleccionado un alimento que no tiene suficiente disponibilidad para tu pedido.<br>";
          echo "<a href='supervisor.php'>Regresa y registra correctamente tus alimentos</a>";
        }
      }
      else
      {
        borrar();
        echo "Has seleccionado más de dos alimentos preparados. Recuerda que es solo 1 por pedido<br>";
        echo "<a href='supervisor.php'>Regresa y registra correctamente tus alimentos</a>";
      }
    }
    else
    {
      echo "No has sellecionado algún alimento.<br>";
      echo "<a href='supervisor.php'>Regresa y registra correctamente tus alimentos</a>";
    }
  }
  else
  {
    mysqli_close($conexion);
    header('Location:supervisor.php');
  }
  mysqli_close($conexion);
}


 ?>
