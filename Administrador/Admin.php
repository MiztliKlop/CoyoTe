<?php

if ( isset($_GET['producto']) ) {

?>
<h3>¿Segur@?</h3>
<table border="1">
  <tr>
    <td>
      <?php
      echo $_GET['producto'];
       ?>
    </td>
  </tr>
</table>

<form class="" action="Admin.php" method="post">
  <input type="submit" name="actualizar" value="Sí">
</form>

<?php
}
else {
  // code...

echo "Base De Datos Alterada Con Éxito";

}
 ?>

<br><br>
 <a href="Administrador.php">REGRESAR</a>
