<?php
  $lugar=$_POST['lugar'];
  if ($lugar=="Si") {
    header("Location:./Cafeteria.php");
    exit;
  }
  elseif ($lugar=="No") {
    header("Location:./Otro.php");
    exit;
  }
 ?>
