<?php
  define('hash', 'sha256');
  define ('contraseña','Coyocaf3 is th3 b3st');
  define ('metodo','aes-192-cfb');
  function codif($con){
    $key= openssl_digest(contraseña,hash);
    $iv_len= openssl_cipher_iv_length(metodo);
    $iv= openssl_random_pseudo_bytes($iv_len);
    $conCifrada= openssl_encrypt(
      $con,
      metodo,
      $key,
      OPENSSL_RAW_DATA,
      $iv
    );
    $contra_iv=$iv.$conCifrada;
    return $contra_iv;

  }
  function decodif($conCod){
    $iv_len= openssl_cipher_iv_length(metodo);
    $iv= substr($conCod,0,$iv_len);
    $cifrado= substr($conCod, $iv_len);
    $key=openssl_digest(contraseña,hash);
    $contra_descif=openssl_decrypt(
      $cifrado,
      metodo,
      $key,
      OPENSSL_RAW_DATA,
      $iv
    );
    return $contra_descif;
  }

  $usu=strip_tags($_POST['usuario']);
  $cont=strip_tags($_POST['contraseña']);

  $conexion=mysqli_connect("localhost","root","","DBCoyote");
  if($conexion){
    $usu=mysqli_real_escape_string($conexion,$usu);
    $cont=mysqli_real_escape_string($conexion,$cont);
    $id_cliente=  "SELECT id_usuario FROM usuario";
    $resp_id= mysqli_query($conexion, $id_cliente);
    $rev_id= mysqli_fetch_array($resp_id,MYSQLI_NUM);
    if($rev_id==''){
      mysqli_close($conexion);
      header('Location:coyotein.php');
    }else{
      foreach ($rev_id as $key => $value) {
        $value=base64_decode($value);
        $value=decodif($value);
        if($value != $usu){
          mysqli_close($conexion);
          header('Location:coyotein.php');
        }else{
          $contraseña=  "SELECT Contraseña FROM usuario WHERE id_usuario LIKE '$rev_id[$key]'";
          $resp_cont= mysqli_query($conexion, $contraseña);
          $rev_cont= mysqli_fetch_array($resp_cont,MYSQLI_NUM);
          $contra_Ini=$rev_cont[$key];
          $contra_Ini=base64_decode($contra_Ini);
          $contra_Ini=decodif($contra_Ini);
          if($contra_Ini == $cont){
            mysqli_close($conexion);
            header('Location:../templates/Menu.html');
          }else{
            mysqli_close($conexion);
            header('Location:coyotein.php');
          }
        }
      }
    }
  }else{
    echo mysqli_conect_error();
    echo mysqli_conect_error();
    exit();
  }
