<?php
/******************************************************
*Archivo del menú. En este archivo se seleccionaran los alimentos
*que el usario guste. Mostrando en pantalla los ya sellecionados
* en una especie de carrito. En caso de tener alimentos en
*preparacion se le dará la opción de visualizar a los mismos.
*Uso principal de sesiones para tener un mejor manejo de datos.
*********************************************************/
  define("DBUSER","root");
  define("DBHOST","localhost");
  define("PASSWORD","root");


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

    $obtencion = $_SESSION['transporte'];
    $consulta_usuario = "SELECT * FROM Usuario WHERE id_usuario = '$obtencion'";
    $usuario = mysqli_query($conexion,$consulta_usuario);
    $fio = mysqli_fetch_array($usuario);
    $_SESSION['usuario'] = $fio['Nombre'];
    $_SESSION['statusCliente'] = $fio['id_statusCliente'];
    //$_SESSION['id_usuario'] = $fio['id_usuario'];
    $validacion = $fio['noPedidos'];
    $estado_pedido= $fio['id_pedido_completo'];


    if(!isset($_SESSION['validacion']) || $_SESSION['validacion']==0 )
    {
      $_SESSION['validacion'] = $validacion;

    }
    if ($validacion != 0)
    {
      echo "<a href='cocina.php'>Verifica tus órdenes.</a>";
    }

    if($validacion < 3 && $estado_pedido == 2)
    {
      if(!$_SESSION['pedidoTotal'])
      {
        $_SESSION['pedidoTotal']=[];
      }
      if($_SESSION['statusCliente'] == 1)
      {
        echo "Hola ".$_SESSION['usuario']."<br>";
        $consulta = "SELECT * FROM Alimento";
        $wow = mysqli_query($conexion,$consulta);
        echo "Nombre del alimento: <br>";

        echo "<form action='supervisor.php' method='post'>
        <select  name='orden'>";

        while($row = mysqli_fetch_array($wow))
        {
          if ($row['disponibilidad'] > 0)
          {
              echo "<option value='".$row['id_producto']."'>".$row['nombreProducto']."</option>";
          }

        }
        echo "</select>";
        echo "<input type='number' name='cantidad' min=0 pattern='(?<! )^[A-ZÑ]{1}[a-zñ á-ú]+(?<! )$'>";
        echo "<input type='submit' value='Agregar al carrito'><br>";
        echo "</form>";
        echo "<table align='right'>
              <tr>
                <th>Producto</th>
                <th>Costo unitario</th>
                <th>Cantidad</th>
                <th>Precio final</th>
              </tr>";

        $cantidad = (isset($_POST['cantidad']) && $_POST['cantidad'] != "" && $_POST['cantidad'] > 0  ) ? $_POST['cantidad'] : false;

        if(isset($_POST['orden']) && $cantidad != false && (!isset($_SESSION['orden1']) || count($_SESSION['orden1']) == 0) && $_SESSION['validacion'] < 3)
        {
          $_SESSION['orden1'] = [$_POST['orden'],$_POST['cantidad']];
          array_push($_SESSION['pedidoTotal'], $_SESSION['orden1']);
          $yo = $_POST['orden'];
          $consulta_orden1 = "SELECT * FROM Alimento WHERE id_producto = $yo";
          $conexio_orden1 = mysqli_query($conexion,$consulta_orden1);
          $_SESSION['interfaz1'] = mysqli_fetch_array($conexio_orden1,MYSQLI_ASSOC);
          $parcial = $_POST['cantidad']*$_SESSION['interfaz1']['costo'];
          $_SESSION['cuenta'] = $parcial;
          $_SESSION['validacion'] += 1;
          $_SESSION['carrito1'] = "<td align='center'>".$_SESSION['interfaz1']['nombreProducto']."</td> <td align='center'>".$_SESSION['interfaz1']['costo']."</td><td align='center'>".$_POST['cantidad']."</td><td align='center'>".$parcial;
          echo "<tr>";
          echo $_SESSION['carrito1'];
          echo "</tr>";
        }
        elseif (isset($_POST['orden']) && $cantidad != false && (!isset($_SESSION['orden2']) || count($_SESSION['orden2']) == 0) && count($_SESSION['orden1']) !=0 && $_SESSION['validacion'] < 3)
        {
          $_SESSION['orden2'] = [$_POST['orden'],$_POST['cantidad']];
          array_push($_SESSION['pedidoTotal'], $_SESSION['orden2']);
          $go = $_POST['orden'];
          $consulta_orden2 = "SELECT * FROM Alimento WHERE id_producto = $go";
          $conexio_orden2 = mysqli_query($conexion,$consulta_orden2);
          $_SESSION['interfaz2'] = mysqli_fetch_array($conexio_orden2,MYSQLI_ASSOC);
          $parcial2 = $_POST['cantidad']*$_SESSION['interfaz2']['costo'];
          $_SESSION['cuenta'] += $parcial2;
          $_SESSION['validacion'] += 1;
          $_SESSION['carrito2'] = "<td align='center'>".$_SESSION['interfaz2']['nombreProducto']."</td> <td align='center'>".$_SESSION['interfaz2']['costo']."</td><td align='center'>".$_POST['cantidad']."</td><td align='center'>".$parcial2;
          echo "<tr>";
          echo $_SESSION['carrito1'];
          echo "</tr>";
          echo "<tr>";
          echo  $_SESSION['carrito2'];
          echo "</tr>";

        }
        elseif (isset($_POST['orden']) && $cantidad != false && (!isset($_SESSION['orden3']) || count($_SESSION['orden3']) == 0) && count($_SESSION['orden2']) !=0 && $_SESSION['validacion'] < 3)
        {
          $_SESSION['orden3'] = [$_POST['orden'],$_POST['cantidad']];
          array_push($_SESSION['pedidoTotal'], $_SESSION['orden3']);
          $to = $_POST['orden'];
          $consulta_orden3 = "SELECT * FROM Alimento WHERE id_producto = $to";
          $conexio_orden3 = mysqli_query($conexion,$consulta_orden3);
          $_SESSION['interfaz3'] = mysqli_fetch_array($conexio_orden3,MYSQLI_ASSOC);
          $parcial3=$_POST['cantidad']*$_SESSION['interfaz3']['costo'];
          $_SESSION['cuenta'] += $parcial3;
          $_SESSION['carrito3']= "<td align='center'>".$_SESSION['interfaz3']['nombreProducto']."</td> <td align='center'>".$_SESSION['interfaz3']['costo']."</td><td align='center'>".$_POST['cantidad']."</td><td align='center'>".$parcial3;
          echo "<tr>";
          echo $_SESSION['carrito1'];
          echo "</tr>";
          echo "<tr>";
          echo $_SESSION['carrito2'];
          echo "</tr>";
          echo "<tr>";
          echo $_SESSION['carrito3'];
          echo "</tr>";

        }
        elseif($cantidad == false && isset($_POST['orden']))
        {
          echo "Escribe el número de unidades que vas a seleccionar, porfavor.";
          echo "<tr>";
          echo $_SESSION['carrito1'];
          echo "</tr>";
          echo "<tr>";
          echo $_SESSION['carrito2'];
          echo "</tr>";
          echo "<tr>";
          echo $_SESSION['carrito3'];
          echo "</tr>";
        }

        elseif (count($_SESSION['orden3']) != 0 || $_SESSION['validacion'] == 3 )
        {
          echo "<tr>";
          echo $_SESSION['carrito1'];
          echo "</tr>";
          echo "<tr>";
          echo $_SESSION['carrito2'];
          echo "</tr>";
          echo "<tr>";
          echo $_SESSION['carrito3'];
          echo "</tr>";
          echo "Ya no puedes pedir más alimentos en este pedido.";
        }



        echo "</table><br><br><br><br><br><br>";
        echo "<p align='right'><strong>Tu total a pagar es de: </strong>".$_SESSION['cuenta']."</p>";
        echo "<br><br><br><br><br><br>";
        echo "Si tus órdenes están listas. Haz click aquí:";
        echo "<a href='carrito.php'>Aquí</a>";
      }
      else
      {
        echo "Lo siento, amigo tienes una sanción";
        session_unset();
        session_destroy();
      }
    }
    else {
      echo "No seas desesperado, en un momento te entregan tus alimentos";
    }

    echo "<br><br><br><br><br>";
    echo "<a href='cierrasesion.php'>Cierra Sesion.</a>";
    mysqli_close($conexion);
  }

?>
