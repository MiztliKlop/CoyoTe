<?php
  $a=(isset($_POST['categoria']) && $_POST['categoria']=='alumno')? 'alumno':'0';
  $b=(isset($_POST['categoria']) && $_POST['categoria']=='maestro')?'maestro':'0';
  $c=(isset($_POST['categoria']) && $_POST['categoria']=='trabajador')?'trabajador':'0';
  $d=(isset($_POST['categoria']) && $_POST['categoria']=='0')?'0':'z';
  if($a=='alumno'){
    header('Location:registroA.php');
  }elseif($b=='maestro'){
    header('Location:registroM.php');
  }elseif($c=='trabajador'){
      header('Location:registroT.php');
  }
?>
