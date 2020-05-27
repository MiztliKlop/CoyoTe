<?php

if ( isset($_GET['envio']) )
{
  $sets = $_GET['producto'];
  if ($sets == "+")
  {
  echo "<p>Agregar: Base De Datos</p>
          <form class='' action='bd1.php' method='post'> Agregar Producto: <br><br>
            id: <input type='number' name='id' value='' autofocus min='1' required><br><br>
            Nombre del Producto: <input type='text' name='nombre' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
            Costo: $<input type='number' name='costo' value='' autofocus min='1' required><br><br>
            Tipo: <select name='tipo'>
                    <option value='1'>Preparado</option>
                    <option value='2'>Empaquetado</option>
                  </select>
            Disponibilidad: <input type='number' name='disponible' value='' autofocus min='0' required><br><br>
            URL Imagen: <input type='text' name='imagen' maxlength='300px'>
            <input type='submit' name='insertar' value='Agregar Producto'><br><br>
          </form>
        <br>
        <br>";
  }


  if ($sets == 'changeN')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Producto a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Producto Con Nuevo Nombre:  <input type='text' name='nuevo' value='' placeholder='Escriba Correctamente' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        <input type='submit' name='changeN' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'changeD')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Producto a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Producto Con Nueva Disponibilidad:  <input type='number' name='disponible' value=''><br><br>
        <input type='submit' name='changeD' value='Modificar'>
      </form>
  <br><br>";}
  if ($sets == 'changeC')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Producto a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Producto Con Nuevo Costo:  $<input type='number' name='costo' value=''><br><br>
        <input type='submit' name='changeC' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'changeT')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Producto a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Producto Con Nuevo Tipo: <select name='tipo'>
                <option value='1'>Preparado</option>
                <option value='2'>Empaquetado</option>
              </select><br><br>
        <input type='submit' name='changeT' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'changeI')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Producto a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Producto Con URL Nueva Imagen:  <input type='text' name='imagen' value=''><br><br>
        <input type='submit' name='changeI' value='Modificar'>
      </form>
  <br><br>";
  }



  if ($sets == "-")  {
  echo "
      <p>Eliminar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>Eliminar Producto: <br><br>
        Nombre del Producto: <input type='text' name='nombre' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        <input type='submit' name='eliminar' value='Eliminar Producto'><br><br>
      </form>
  <br><br>";
  }
  if ($sets == "todo") {
    echo "<form class='' action='bd1.php' method='post'>Agregar Producto: <br><br>
      <input type='submit' name='todo' value='Mostrar Todo'><br><br>
    </form><br><br>";
  }
  if ($sets == "buscar")
  {
    //connect to mysql database
    $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
    //fetch data from database
    $sql = "SELECT nombreProducto FROM Alimento";
    $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    ?>
    <form class="" action="bd1.php" method="post">
    <label for="producto">Nombre del Producto: </label>
    <input type="text" list="nombreAlimento" name="nombre" autocomplete="off" id="producto">
    <datalist id="nombreAlimento">
        <?php while($row = mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $row['nombreProducto']; ?>"><?php echo $row['nombreProducto']; ?></option>
        <?php } ?>
    </datalist><br><br>
    <?php mysqli_close($connection); ?>
    <input type='submit' name='buscar' value='Buscar'><br><br>
    </form>
    <?php
  }
}














elseif ( isset($_GET['envioU']) )
{
  $sets = $_GET['usuario'];
  if ($sets == "+")
  {
  echo "<p>Agregar: Base De Datos</p>
          <form class='' action='bd1.php' method='post'> Agregar Usuario: <br><br>
            Número de Cuenta: <input type='number' name='id' value='' min='300000000' max='399999999' required><br><br>
            Nombre del Usuario: <input type='text' name='nombre' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
            Grupo: <input type='text' name='grupo' value='' pattern='^(4(0[1-9]|1[0-7]|5[1-9]|6[0-6])|5(0[1-9]|1[0-8]|5[1-9]|6[0-4])|6(0[1-9]|1[0-9]|5[1-9]|6[0-4]))$' title='Debe Ser Un Grupo Válido'><br><br>
            Contraseña: <input type='password' name='contraseña' value='' required><br><br>
            <input type='submit' name='añadir' value='Añadir Usuario'><br><br>
          </form>
        <br>
        <br>";
  }


  if ($sets == 'changeN')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Usuario Con Nuevo Nombre:  <input type='text' name='nuevo' value='' placeholder='Escriba Correctamente' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        <input type='submit' name='cambioN' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'change#')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Usuario Con Nuevo Número de Cuenta:  <input type='text' name='id' value='' min='300000000' max='399999999><br><br>
        <input type='submit' name='cambio#' value='Modificar'>
      </form>
  <br><br>";}
  if ($sets == 'changeC')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Usuario Con Nueva Contraseña:  <input type='password' name='contraseña' value=''><br><br>
        <input type='submit' name='cambioC' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'changeG')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Usuario Con Nuevo Grupo: <input type='text' name='grupo' value='' pattern='^(4(0[1-9]|1[0-7]|5[1-9]|6[0-6])|5(0[1-9]|1[0-8]|5[1-9]|6[0-4])|6(0[1-9]|1[0-9]|5[1-9]|6[0-4]))$' title='Debe Ser Un Grupo Válido'><br><br>
        <input type='submit' name='cambioG' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'changeS')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='antes' value='' placeholder='Escriba Correctamente' required><br><br>
        Usuario Con Nuevo Status:  <select name='tipo'>
                <option value='1'>No Sancionado</option>
                <option value='2'>Sancionado</option>
              </select><br><br>
        <input type='submit' name='cambioS' value='Modificar'>
      </form>
  <br><br>";
  }



  if ($sets == "-")  {
  echo "
      <p>Eliminar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>Eliminar Usuario: <br><br>
        Nombre del Usuario: <input type='text' name='nombre' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        Número de Cuenta: <input type='number' name='id' value='' min='300000000' max='399999999' required><br><br>
        <input type='submit' name='sacar' value='Eliminar Usuario'><br><br>
      </form>
  <br><br>";
  }
  if ($sets == "todo") {
    echo "<form class='' action='bd1.php' method='post'>Usuario: <br><br>
      <input type='submit' name='base' value='Mostrar Todo'><br><br>
    </form><br><br>";
  }
  if ($sets == "buscar")
  {
    //connect to mysql database
    $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
    //fetch data from database
    $sql = "SELECT Nombre FROM Usuario";
    $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    ?>
    <form class="" action="bd1.php" method="post">
    <label for="producto">Nombre del Usuario: </label>
    <input type="text" list="nombreAlimento" name="nombre" autocomplete="off" id="producto">
    <datalist id="nombreAlimento">
        <?php while($row = mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $row['Nombre']; ?>"><?php echo $row['Nombre']; ?></option>
        <?php } ?>
    </datalist><br><br>
    <?php mysqli_close($connection); ?>
    <input type='submit' name='search' value='Buscar'><br><br>
    </form>
    <?php
  }
}

?>
