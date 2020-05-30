<?php

// regex productos (?<! )^[A-ZÑ]{1}[a-zñ á-ú]+(?<! )$

if ( isset($_POST['envio']) )
{
  $sets = $_POST['producto'];
  if ($sets == "+")
  {
  echo "<p>Agregar: Base De Datos</p>
          <form class='' action='bd1.php' method='post'> Agregar Producto: <br><br>
            id: <input type='number' name='id' value='' autofocus min='1' required placeholder='ESTO NO VA AQUÍ PROBLEMA CON AUTO_INCREMENT'><br><br>
            Le Sugerimos Checar Si Ya Existe (Mostrado En Existentes)<br><br>
            ";//connect to mysql database
            $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
            //fetch data from database
            $sql = "SELECT nombreProducto FROM Alimento";
            $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
            ?>
              <label for="producto">Nombre del Producto: </label>
              <input type="text" list="nombreAlimento" name="nombre" autocomplete="off" placeholder="Existentes: " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
              <datalist id="nombreAlimento">
                  <?php while($row = mysqli_fetch_array($result))
                        { ?>
                          <option value="<?php echo $row['nombreProducto']; ?>">
                          <?php echo $row['nombreProducto']; ?>
                          </option>
                  <?php } ?>
              </datalist>
              <br><br>
              <?php mysqli_close($connection); ?>
            <?php
          echo " Costo: $<input type='number' name='costo' value='' autofocus min='0' max='1000' required><br><br>
            Tipo: <select name='tipo'>
                    <option value='1'>Preparado</option>
                    <option value='2'>Empaquetado</option>
                  </select>
                  <br><br>
            Disponibilidad: <input type='number' name='disponible' value='' autofocus min='0' max='1000' required><br><br>
            URL Imagen: <input type='text' name='imagen' maxlength='300px'><br><br>
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
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT nombreProducto FROM Alimento";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>
          <label for="producto">Producto a Modificar: </label>
          <input type="text" list="nombreAlimento" name="antes" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['nombreProducto']; ?>">
                      <?php echo $row['nombreProducto']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
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
      ";//connect to mysql database
      $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
      //fetch data from database
      $sql = "SELECT nombreProducto FROM Alimento";
      $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
      ?>
        <label for="producto">Producto a Modificar: </label>
        <input type="text" list="nombreAlimento" name="antes" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
        <datalist id="nombreAlimento">
            <?php while($row = mysqli_fetch_array($result))
                  { ?>
                    <option value="<?php echo $row['nombreProducto']; ?>">
                    <?php echo $row['nombreProducto']; ?>
                    </option>
            <?php } ?>
        </datalist>
        <br><br>
        <?php mysqli_close($connection); ?>
      <?php
    echo "
        Producto Con Nueva Disponibilidad:  <input type='number' name='disponible' value=''><br><br>
        <input type='submit' name='changeD' value='Modificar'>
      </form>
  <br><br>";}
  if ($sets == 'changeC')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>

        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT nombreProducto FROM Alimento";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>
          <label for="producto">Producto a Modificar: </label>
          <input type="text" list="nombreAlimento" name="antes" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['nombreProducto']; ?>">
                      <?php echo $row['nombreProducto']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
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
      ";//connect to mysql database
      $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
      //fetch data from database
      $sql = "SELECT nombreProducto FROM Alimento";
      $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
      ?>
        <label for="producto">Producto a Modificar: </label>
        <input type="text" list="nombreAlimento" name="antes" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
        <datalist id="nombreAlimento">
            <?php while($row = mysqli_fetch_array($result))
                  { ?>
                    <option value="<?php echo $row['nombreProducto']; ?>">
                    <?php echo $row['nombreProducto']; ?>
                    </option>
            <?php } ?>
        </datalist>
        <br><br>
        <?php mysqli_close($connection); ?>
      <?php
    echo "
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
      ";//connect to mysql database
      $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
      //fetch data from database
      $sql = "SELECT nombreProducto FROM Alimento";
      $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
      ?>
        <label for="producto">Producto a Modificar: </label>
        <input type="text" list="nombreAlimento" name="antes" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
        <datalist id="nombreAlimento">
            <?php while($row = mysqli_fetch_array($result))
                  { ?>
                    <option value="<?php echo $row['nombreProducto']; ?>">
                    <?php echo $row['nombreProducto']; ?>
                    </option>
            <?php } ?>
        </datalist>
        <br><br>
        <?php mysqli_close($connection); ?>
      <?php
    echo "
        Producto Con URL Nueva Imagen:  <input type='text' name='imagen' value='' required pattern='^https?:\/\/(.+)' title='Debe Empezar Con http(s)//:'><br><br>
        <input type='submit' name='changeI' value='Modificar'>
      </form>
  <br><br>";
  }



  if ($sets == "-")  {
  echo "
      <p>Eliminar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>Eliminar Producto: <br><br>
      ";//connect to mysql database
      $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
      //fetch data from database
      $sql = "SELECT nombreProducto FROM Alimento";
      $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
      ?>
        <label for="producto">Producto a Eliminar: </label>
        <input type="text" list="nombreAlimento" name="nombre" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
        <datalist id="nombreAlimento">
            <?php while($row = mysqli_fetch_array($result))
                  { ?>
                    <option value="<?php echo $row['nombreProducto']; ?>">
                    <?php echo $row['nombreProducto']; ?>
                    </option>
            <?php } ?>
        </datalist>
        <br><br>
        <?php mysqli_close($connection); ?>
      <?php
    echo "
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














elseif ( isset($_POST['envioU']) )
{
  $sets = $_POST['usuario'];
  if ($sets == "+")
  {
  echo "<p>Agregar: Base De Datos</p>
          <form class='' action='bd1.php' method='post'> Agregar Usuario: <br><br>
          Le Sugerimos Checar Si Ya Existe (Mostrado En Existente)<br><br>
            ";//connect to mysql database
            $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
            //fetch data from database
            $sql = "SELECT id_usuario FROM Usuario";
            $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
            ?>

              <label for="producto">Número de Cuenta del Usuario: </label>
              <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required min='300000000' max='399999999'>
              <datalist id="nombreAlimento">
                  <?php while($row = mysqli_fetch_array($result))
                        { ?>
                          <option value="<?php echo $row['id_usuario']; ?>">
                          <?php echo $row['id_usuario']; ?>
                          </option>
                  <?php } ?>
              </datalist>
              <br><br>
              <?php mysqli_close($connection); ?>
            <?php
          echo "
            Nombre del Usuario: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
            Grupo: <input type='text' name='grupo' value='' pattern='^(4(0[1-9]|1[0-7]|5[1-9]|6[0-6])|5(0[1-9]|1[0-8]|5[1-9]|6[0-4])|6(0[1-9]|1[0-9]|5[1-9]|6[0-4]))$' title='Debe Ser Un Grupo Válido'><br><br>
            Contraseña: <input type='password' name='contraseña' value='' pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&%#!¡?¿.,]))\S{10,30}$' title='Ingrese Una Contraseña Segura' required><br><br>
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
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_usuario FROM Usuario";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Cuenta: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required min='300000000' max='399999999'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_usuario']; ?>">
                      <?php echo $row['id_usuario']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Usuario Con Nuevo Nombre:  <input type='text' name='nuevoU' value='' placeholder='Escriba Correctamente' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        <input type='submit' name='cambioN' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'change#')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_usuario FROM Usuario";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Cuenta Anterior: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required autofocus min='300000000' max='399999999'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_usuario']; ?>">
                      <?php echo $row['id_usuario']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Usuario Con Nuevo Número de Cuenta:  <input type='text' name='idn' value='' required autofocus min='300000000' max='399999999'>
        <br><br>
        <input  name='cambio#' type='submit' value='Modificar'>

      </form>
      <br><br>";
  }
  if ($sets == 'changeC')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_usuario FROM Usuario";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Cuenta Anterior: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required min='300000000' max='399999999'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_usuario']; ?>">
                      <?php echo $row['id_usuario']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Usuario Con Nueva Contraseña:  <input type='password' name='contraseña' pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&%#!¡?¿.,]))\S{10,30}$' title='Ingrese Una Contraseña Segura'  value=''><br><br>
        <input type='submit' name='cambioC' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'changeG')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_usuario FROM Usuario";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Cuenta Anterior: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required min='300000000' max='399999999'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_usuario']; ?>">
                      <?php echo $row['id_usuario']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
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
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_usuario FROM Usuario";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Cuenta: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required min='300000000' max='399999999'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_usuario']; ?>">
                      <?php echo $row['id_usuario']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
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
        Nombre del Usuario: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_usuario FROM Usuario";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Cuenta: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required min='300000000' max='399999999'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_usuario']; ?>">
                      <?php echo $row['id_usuario']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
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

    echo "
        <p>Buscar: Base De Datos</p>
        <form class='' action='bd1.php' method='post'>Buscar Usuario: <br><br>
          Nombre del Usuario: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
          ";//connect to mysql database
          $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
          //fetch data from database
          $sql = "SELECT id_usuario FROM Usuario";
          $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
          ?>

            <label for="producto">Número de Cuenta: </label>
            <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required min='300000000' max='399999999'>
            <datalist id="nombreAlimento">
                <?php while($row = mysqli_fetch_array($result))
                      { ?>
                        <option value="<?php echo $row['id_usuario']; ?>">
                        <?php echo $row['id_usuario']; ?>
                        </option>
                <?php } ?>
            </datalist>
            <br><br>
            <?php mysqli_close($connection); ?>
          <?php
        echo "
          <input type='submit' name='search' value='Eliminar Usuario'><br><br>
        </form>
    <br><br>";
  }
}













elseif ( isset($_POST['envioF']) )
{
  $sets = $_POST['usuario'];
  if ($sets == "+")
  {
  echo "<p>Agregar: Base De Datos FUNCIONARIO</p>
          <form class='' action='bd1.php' method='post'> Agregar Usuario: <br><br>
          RFC:  <input type='text' name='id' value='' required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title='Debe Seguir el Formato RFC'><br><br>
            Nombre del Usuario: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
              ";//Colegio (Gremio):
            $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
            //fetch data from database
            $sql = "SELECT Grupo FROM Colegio";
            $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
            ?>

              <label for="producto">Colegio: </label>
              <input type="text" list="nombreAlimento" name="grupo" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title="Adecue el Formato de Su RFC">
              <datalist id="nombreAlimento">
                  <?php while($row = mysqli_fetch_array($result))
                        { ?>
                          <option value="<?php echo $row['Grupo']; ?>">
                          <?php echo $row['Grupo']; ?>
                          </option>
                  <?php } ?>
              </datalist>
              <br><br>
              <?php mysqli_close($connection); ?>
            <?php
          echo "
            Contraseña: <input type='password' name='contraseña' value='' pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&%#!¡?¿.,]))\S{10,30}$' title='Ingrese Una Contraseña Segura' required><br><br>
            <input type='submit' name='Incorporar' value='Añadir Usuario'><br><br>
          </form>
        <br>
        <br>";
  }


  if ($sets == 'changeN')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_rfc FROM Profesor";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de RFC: </label>
          <input type="text" list="nombreAlimento" pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title='Debe Seguir el Formato RFC' name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required >
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_rfc']; ?>">
                      <?php echo $row['id_rfc']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Usuario Con Nuevo Nombre:  <input type='text' name='nuevoU' value='' placeholder='Escriba Correctamente' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        <input type='submit' name='permutaN' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'change#')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_rfc FROM Profesor";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de RFC Anterior: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title='Debe Seguir el Formato RFC'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_rfc']; ?>">
                      <?php echo $row['id_rfc']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Usuario Con Nuevo RFC:  <input type='text' name='idn' value='' required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title='Debe Seguir el Formato RFC'>
        <br><br>
        <input  name='permuta#' type='submit' value='Modificar'>

      </form>
      <br><br>";
  }
  if ($sets == 'changeC')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_rfc FROM Profesor";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">RFC Anterior: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title='Debe Seguir el Formato RFC'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_rfc']; ?>">
                      <?php echo $row['id_rfc']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Usuario Con Nueva Contraseña:  <input type='password' name='contraseña' pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&%#!¡?¿.,]))\S{10,30}$' title='Ingrese Una Contraseña Segura'  value=''><br><br>
        <input type='submit' name='permutaC' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'changeG')
  {
    echo "<p>Agregar: Base De Datos FUNCIONARIO</p>
            <form class='' action='bd1.php' method='post'> Agregar Usuario: <br><br>
            RFC:  <input type='text' name='id' value='' required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title='Debe Seguir el Formato RFC'><br><br>
              Nombre del Usuario: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
                ";//Colegio (Gremio):
              $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
              //fetch data from database
              $sql = "SELECT Grupo FROM Colegio";
              $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
              ?>

                <label for="producto">Colegio: </label>
                <input type="text" list="nombreAlimento" name="grupo" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title="Adecue el Formato de Su RFC">
                <datalist id="nombreAlimento">
                    <?php while($row = mysqli_fetch_array($result))
                          { ?>
                            <option value="<?php echo $row['Grupo']; ?>">
                            <?php echo $row['Grupo']; ?>
                            </option>
                    <?php } ?>
                </datalist>
                <br><br>
                <?php mysqli_close($connection); ?>
              <?php
            echo "
              <input type='submit' name='permutaG' value='Añadir Usuario'><br><br>
            </form>
          <br>
          <br>";
  }
  if ($sets == 'changeS')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Usuario a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_rfc FROM Profesor";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">RFC: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title="Adecue el Formato de Su RFC">
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_rfc']; ?>">
                      <?php echo $row['id_rfc']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Profesor Con Nuevo Status:  <select name='tipo'>
                <option value='1'>No Sancionado</option>
                <option value='2'>Sancionado</option>
              </select><br><br>
        <input type='submit' name='permutaS' value='Modificar'>
      </form>
  <br><br>";
  }



  if ($sets == "-")  {
  echo "
      <p>Eliminar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>Eliminar Usuario: <br><br>
        Nombre del Profesor: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_rfc FROM Profesor";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">RFC: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title="Adecue el Formato de Su RFC">
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_rfc']; ?>">
                      <?php echo $row['id_rfc']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        <input type='submit' name='excluir' value='Eliminar Usuario'><br><br>
      </form>
  <br><br>";
  }
  if ($sets == "todo") {
    echo "<form class='' action='bd1.php' method='post'>Profesores: <br><br>
      <input type='submit' name='sede' value='Mostrar Todo'><br><br>
    </form><br><br>";
  }
  if ($sets == "buscar")
  {

    echo "
        <p>Buscar: Base De Datos</p>
        <form class='' action='bd1.php' method='post'>Buscar Usuario: <br><br>
          Nombre del Usuario: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
          ";//connect to mysql database
          $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
          //fetch data from database
          $sql = "SELECT id_rfc FROM Profesor";
          $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
          ?>

            <label for="producto">RFC: </label>
            <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^[A-Z]{4}\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$' title="Adecue el Formato de Su RFC">
            <datalist id="nombreAlimento">
                <?php while($row = mysqli_fetch_array($result))
                      { ?>
                        <option value="<?php echo $row['id_rfc']; ?>">
                        <?php echo $row['id_rfc']; ?>
                        </option>
                <?php } ?>
            </datalist>
            <br><br>
            <?php mysqli_close($connection); ?>
          <?php
        echo "
          <input type='submit' name='lupa' value='Eliminar Usuario'><br><br>
        </form>
    <br><br>";
  }
}










elseif ( isset($_POST['envioT']) )
{
  $sets = $_POST['usuario'];
  if ($sets == "+")
  {
  echo "<p>Agregar: Base De Datos</p>
          <form class='' action='bd1.php' method='post'> Agregar Usuario: <br><br>
          Le Sugerimos Checar Si Ya Existe (Mostrado En Existente)<br><br>
            ";//connect to mysql database
            $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
            //fetch data from database
            $sql = "SELECT id_trab FROM Trabajador";
            $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
            ?>

              <label for="producto">Número de Trabajador: </label>
              <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required autofocus min='0' max='1500'>
              <datalist id="nombreAlimento">
                  <?php while($row = mysqli_fetch_array($result))
                        { ?>
                          <option value="<?php echo $row['id_trab']; ?>">
                          <?php echo $row['id_trab']; ?>
                          </option>
                  <?php } ?>
              </datalist>
              <br><br>
              <?php mysqli_close($connection); ?>
            <?php
          echo "
            Nombre del Usuario: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
            Contraseña: <input type='password' name='contraseña' value='' pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&%#!¡?¿.,]))\S{10,30}$' title='Ingrese Una Contraseña Segura' required><br><br>
            <input type='submit' name='aditivo' value='Añadir Usuario'><br><br>
          </form>
        <br>
        <br>";
  }


  if ($sets == 'changeN')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        TRABAJADOR a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_trab FROM Trabajador";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Trabajador: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required autofocus min='0' max='1500'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_trab']; ?>">
                      <?php echo $row['id_trab']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        TRABAJADOR Con Nuevo Nombre:  <input type='text' name='nuevoU' value='' placeholder='Escriba Correctamente' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        <input type='submit' name='sustituirN' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'change#')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Trabajador a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_trab FROM Trabajador";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Trabajador Anterior: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required autofocus min='0' max='1500'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_trab']; ?>">
                      <?php echo $row['id_trab']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
         Trabajador Con Nuevo Número de Trabajador:  <input type='text' name='idn' value='' required autofocus min='0' max='1500'>
        <br><br>
        <input  name='sustituir#' type='submit' value='Modificar'>

      </form>
      <br><br>";
  }
  if ($sets == 'changeC')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Trabajador a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_trab FROM Trabajador";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Trabajador Anterior: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required  autofocus min='0' max='1500'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_trab']; ?>">
                      <?php echo $row['id_trab']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Trabajador Con Nueva Contraseña:  <input type='password' name='contraseña' pattern='^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@&%#!¡?¿.,]))\S{10,30}$' title='Ingrese Una Contraseña Segura'  value=''><br><br>
        <input type='submit' name='sustituirC' value='Modificar'>
      </form>
  <br><br>";
  }
  if ($sets == 'changeS')
  {
  echo "
      <p>Modificar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>
        Trabajador a Modificar:  <input type='text' name='nombreU' value='' placeholder='Escriba Correctamente' required><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_trab FROM Trabajador";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Cuenta: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required autofocus min='0' max='1500'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_trab']; ?>">
                      <?php echo $row['id_trab']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        Trabajador Con Nuevo Status:  <select name='tipo'>
                <option value='1'>No Sancionado</option>
                <option value='2'>Sancionado</option>
              </select><br><br>
        <input type='submit' name='sustituirS' value='Modificar'>
      </form>
  <br><br>";
  }



  if ($sets == "-")  {
  echo "
      <p>Eliminar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>Eliminar Usuario: <br><br>
        Nombre del Trabajador: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT id_trab FROM Trabajador";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Número de Cuenta: </label>
          <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required min='0' max='1500'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['id_trab']; ?>">
                      <?php echo $row['id_trab']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        <input type='submit' name='expulsar' value='Eliminar Usuario'><br><br>
      </form>
  <br><br>";
  }
  if ($sets == "todo") {
    echo "<form class='' action='bd1.php' method='post'>Usuario: <br><br>
      <input type='submit' name='all' value='Mostrar Todo'><br><br>
    </form><br><br>";
  }
  if ($sets == "buscar")
  {

    echo "
        <p>Buscar: Base De Datos</p>
        <form class='' action='bd1.php' method='post'>Buscar Usuario: <br><br>
          Nombre del Trabajador: <input type='text' name='nombreU' value='' required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'><br><br>
          ";//connect to mysql database
          $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
          //fetch data from database
          $sql = "SELECT id_trab FROM Trabajador";
          $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
          ?>

            <label for="producto">Número de Cuenta: </label>
            <input type="text" list="nombreAlimento" name="id" autocomplete="off" placeholder=" - Existente - " id="producto" required autofocus min='0' max='1500'>
            <datalist id="nombreAlimento">
                <?php while($row = mysqli_fetch_array($result))
                      { ?>
                        <option value="<?php echo $row['id_trab']; ?>">
                        <?php echo $row['id_trab']; ?>
                        </option>
                <?php } ?>
            </datalist>
            <br><br>
            <?php mysqli_close($connection); ?>
          <?php
        echo "
          <input type='submit' name='inquiry' value='Eliminar Usuario'><br><br>
        </form>
    <br><br>";
  }
}















































elseif ( isset($_POST['envioL']) )
{
  $sets = $_POST['lugar'];
  if ($sets == "+")
  {
  echo "<p>Agregar: Base De Datos</p>
          <form class='' action='bd1.php' method='post'> Agregar Lugar: <br><br>
            Sector/Número de Lugar: <input type='number' min='0' name='id' value='' required><br><br>
            Le Sugerimos Checar Si Ya Existe (Mostrado En Existente)<br><br>
            ";//connect to mysql database
            $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
            //fetch data from database
            $sql = "SELECT lugar FROM Lugar";
            $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
            ?>

              <label for="producto">Lugar: </label>
              <input type="text" list="nombreAlimento" name="nombre" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
              <datalist id="nombreAlimento">
                  <?php while($row = mysqli_fetch_array($result))
                        { ?>
                          <option value="<?php echo $row['lugar']; ?>">
                          <?php echo $row['lugar']; ?>
                          </option>
                  <?php } ?>
              </datalist>
              <br><br>
              <?php mysqli_close($connection); ?>
            <?php
          echo "
            <input type='submit' name='poner' value='Añadir Usuario'><br><br>
          </form>
        <br>
        <br>";
  }

  if ($sets == "-")  {
  echo "
      <p>Eliminar: Base De Datos</p>
      <form class='' action='bd1.php' method='post'>Eliminar Lugar: <br><br>
        ";//connect to mysql database
        $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
        //fetch data from database
        $sql = "SELECT lugar FROM Lugar";
        $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        ?>

          <label for="producto">Lugar: </label>
          <input type="text" list="nombreAlimento" name="nombre" autocomplete="off" placeholder=" - Existente - " id="producto" required pattern='^([A-ZÁ-ÚÑ]+)[A-ZÁ-ÚÑa-zá-úñ\s]+' title='Debe Empezar Con Mayúscula'>
          <datalist id="nombreAlimento">
              <?php while($row = mysqli_fetch_array($result))
                    { ?>
                      <option value="<?php echo $row['lugar']; ?>">
                      <?php echo $row['lugar']; ?>
                      </option>
              <?php } ?>
          </datalist>
          <br><br>
          <?php mysqli_close($connection); ?>
        <?php
      echo "
        <input type='submit' name='quitar' value='Eliminar Lugar'><br><br>
      </form>
  <br><br>";
  }
  if ($sets == "todo") {
    echo "<form class='' action='bd1.php' method='post'>Usuario: <br><br>
      <input type='submit' name='mapa' value='Mostrar Todo'><br><br>
    </form><br><br>";
  }
  if ($sets == "buscar")
  {
    //connect to mysql database
    $connection = mysqli_connect("localhost","root","root","CoyoTe") or die("Error " . mysqli_error($connection));
    //fetch data from database
    $sql = "SELECT lugar FROM Lugar";
    $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    ?>
    <form class="" action="bd1.php" method="post">
    <label for="producto">Nombre del Lugar: </label>
    <input type="text" list="nombreAlimento" name="nombre" autocomplete="off" id="producto">
    <datalist id="nombreAlimento">
        <?php while($row = mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $row['lugar']; ?>"><?php echo $row['lugar']; ?></option>
        <?php } ?>
    </datalist><br><br>
    <?php mysqli_close($connection); ?>
    <input type='submit' name='localizar' value='Buscar'><br><br>
    </form>
    <?php
  }
}
















elseif ( isset($_POST['envioD']) )
{
  $sets = $_POST['#'];
  if ($sets == "#U")
  {

  echo "<p>Agregar: Base De Datos</p><br><br><p>¡OJO, SI LIMITAS ESTÁS CONSCIENTE DE ELIMINAR A USUARIOS!
          <form class='' action='bd1.php' method='post'> Limitar: <br><br>
            Número Máximo de Usuarios: <input type='number' min='0' name='id' value='' required><br><br>
            <input type='submit' name='#U' value='Añadir Usuario'><br><br>
          </form>
        <br>
        <br>";
  }
  if ($sets == "#S")
  {
  echo "<p>Agregar: Base De Datos</p>
          <form class='' action='bd1.php' method='post'> Agregar Lugar: <br><br>
            Número Máximo de Supervisores: <input type='number' min='0' name='id' value='' required><br><br>
            <input type='submit' name='#S' value='Añadir Usuario'><br><br>
          </form>
        <br>
        <br>";
  }
  if ($sets == "#A")
  {
  echo "<p>Agregar: Base De Datos</p>
          <form class='' action='bd1.php' method='post'> Agregar Lugar: <br><br>
            Número Máximo de Administradores: <input type='number' min='0' name='id' value='' required><br><br>
            <input type='submit' name='#A' value='Añadir Usuario'><br><br>
          </form>
        <br>
        <br>";
  }
}














else {
  echo "
    <a href='Administrador.php'> Regresar A Principal</a><br><br>";
}

?>
