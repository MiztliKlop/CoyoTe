
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

    $a=[];
    $i=0;

    $id_usuario=  "SELECT id_usuario FROM usuario";
    $resp_usu= mysqli_query($conexion, $id_usuario);

    while($rev_usu= mysqli_fetch_array($resp_usu)){
      $rev_usu[0]=base64_decode($rev_usu[0]);
      $rev_usu[0]=decodif($rev_usu[0]);
      $a[$i]=$rev_usu[0];
      echo $a[$i].'<br>';
      $i++;
    }
    if($a[0]==''){
      $registro= "INSERT INTO usuario VALUES ('$usuBase','$nomBase','$lug', '$contBase', '$stat')";
      if(mysqli_query($conexion, $registro)){
        mysqli_close($conexion);
        header('Location:registroCor.php');
      }
    }
    $cont=count($a);
    echo 'Total:'.$cont.'<br>';
    for ($k=0; $k <$cont ; $k++) {
      if($a[$k]==$usu){
        mysqli_close($conexion);
        header('Location:registroInc.php');
      }elseif($a[$k]!=$usu){
        if($k==$cont-1){
          $registro= "INSERT INTO usuario VALUES ('$usuBase','$nomBase','$lug', '$contBase', '$stat')";
          if(mysqli_query($conexion, $registro)){
            mysqli_close($conexion);
            header('Location:registroCor.php');
          }
        }
      }
    }
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
