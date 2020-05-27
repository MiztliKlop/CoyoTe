
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
  $nom=strip_tags($_POST['nombre']);
  $lug=strip_tags($_POST['area']);
  $cont=strip_tags($_POST['contraseña']);
  $stat=strip_tags($_POST['status']);

  $conexion=mysqli_connect("localhost","root","","DBCoyote");
  if($conexion){
    $usu=mysqli_real_escape_string($conexion,$usu);
    $nom=mysqli_real_escape_string($conexion,$nom);
    $lug=mysqli_real_escape_string($conexion,$lug);
    $cont=mysqli_real_escape_string($conexion,$cont);
    $contCodif=codif($cont);
    $nomCodif=codif($nom);
    $usuCodif=codif($usu);
    /*$iv_len= openssl_cipher_iv_length(metodo);
    $iv= substr($contraseñac,0,$iv_len);
    $contrabase= substr($contraseñac, $iv_len);*/
    $contBase=base64_encode($contCodif);
    $nomBase=base64_encode($nomCodif);
    $usuBase=base64_encode($usuCodif);
    //contBase, nomBase, usuBase, lug;
    $id_usuario=  "SELECT id_usuario FROM usuario";
    //$nombre=  "SELECT Nombre FROM usuario";
    $resp_usu= mysqli_query($conexion, $id_usuario);
    //$resp_nom= mysqli_query($conexion, $nombre);
    $rev_usu= mysqli_fetch_array($resp_usu,MYSQLI_NUM);
    if($rev_usu==''){
      $registro= "INSERT INTO usuario VALUES ('$usuBase','$nomBase','$lug', '$contBase', '$stat')";
        if(mysqli_query($conexion, $registro)){
          mysqli_close($conexion);
          header('Location:registroCor.php');
        }
    }else{
      foreach ($rev_usu as $key => $value) {
        $value=base64_decode($value);
        $value=decodif($value);
        echo $value;
        if($value == $usu){
          mysqli_close($conexion);
          header('Location:registroInc.php');
        }else{
          $registro= "INSERT INTO usuario VALUES ('$usuBase','$nomBase','$lug', '$contBase', '$stat')";
            if(mysqli_query($conexion, $registro)){
              mysqli_close($conexion);
              header('Location:registroCor.php');
            }else{
              mysqli_close($conexion);
              header('Location:registroInc.php');
            }
        }
      }
    }
    //$rev_nom= mysqli_fetch_array($resp_nom,MYSQLI_NUM);
    /*var_dump($rev_usu);

    foreach ($rev_usu as $key => $value) {

      $value=base64_decode($value);
      $value=decodif($value);
      if($value == $usu){
        mysqli_close($conexion);
        header('Location:registroInc.php');
      }
    }*/
    /*foreach ($rev_usu as $key => $value) {
      $value=base64_decode($value);
      $value=decodif($value);
      if($value == $usu){
        mysqli_close($conexion);
        header('Location:registroInc.php');
      }else{
        foreach ($rev_nom as $key => $value) {
          $value=base64_decode($value);
          $value=decodif($value);
          if($value == $nom){
            mysqli_close($conexion);
            header('Location:registroInc.php');
          }else{
            if($cat=='alumno')
              $cat='Alumno';
            elseif($cat=='maestro'){
              $cat='Maestro/funcionario';
            }elseif($cat=='trabajador'){
              $cat='Trabajador';
            }
            $registro= "INSERT INTO usuario VALUES ('$usuBase','$nomBase','$lug', '$contBase', '$cat')";
              if(mysqli_query($conexion, $registro)){
                mysqli_close($conexion);
                header('Location:registroCor.php');
              }else{
                mysqli_close($conexion);
                header('Location:registroInc.php');
              }
          }
        }
      }
    }*/
  }else{
    echo mysqli_conect_error();
    echo mysqli_conect_error();
    exit();
  }
  //$contraseñad=decodif($contraseñac);
  //Alumno:Número de cuenta, nombre, grupo, contraseña
  //Maestro:RFC, nombre, colegio, contraseña
  //Trabajador:No. de trabajador, nombre, contraseña*/
?>
