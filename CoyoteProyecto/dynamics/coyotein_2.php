<?php
  define('hash', 'sha256');
  define ('contraseña','Coyocaf3 is th3 b3st');
  define ('metodo','aes-192-cfb');
  function codif($con){ //Función para hashear
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
  function decodif($conCod){ //Función para deshashear
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
  echo $_POST['cat'];
  $usu=strip_tags($_POST['usuario']);
  $contras=strip_tags($_POST['contraseña']);
  $cat=strip_tags($_POST['cat']);
  session_start();
  $conexion=mysqli_connect("localhost","root","root","pruebas");
  if($conexion){
    $usu=mysqli_real_escape_string($conexion,$usu);
    $contras=mysqli_real_escape_string($conexion,$contras);

    $a=[];
    $i=0;
    $j=0;
    $b=[];

    if($cat==1){ //En caso de que la categoría sea uno, es decir cliente
      $id_usuario=  "SELECT id_usuario FROM usuario WHERE id_categoria=1"; //Selecciona todos los id_usuario que correspondan a esta categoría
      $resp_usu= mysqli_query($conexion, $id_usuario);
      while($rev_usu= mysqli_fetch_array($resp_usu)){ //Se guardan todos los registros
        $b[$i]=$rev_usu[0]; //Se guardan los registros hasheados
        $rev_usu[0]=base64_decode($rev_usu[0]);
        $rev_usu[0]=decodif($rev_usu[0]);
        $a[$i]=$rev_usu[0]; //Se guardan los registros deshasheados
        $i++;
      }
      if($a==[]){ //SSi no hay registros, significia que no hay un usuario registrado así
        mysqli_close($conexion);
        header('Location:coyotein.php'); //Usuario inválido
      }
      $cont=count($a); //Cuenta el número de registros
      for ($k=0; $k < $cont ; $k++) {
        if($a[$k]==$usu){ //Si hay un usuario igual al que se ingresó
          $contra=  "SELECT Contraseña FROM usuario WHERE id_usuario LIKE '$b[$k]'";
          $resp_cont= mysqli_query($conexion, $contra); //Se obtiene su contraseña
          $rev_cont= mysqli_fetch_array($resp_cont);
          $contra_Ini=$rev_cont[0];
          $contra_Ini=base64_decode($contra_Ini); //Se deshashea
          $contra_Ini=decodif($contra_Ini);
          if($contra_Ini == $contras){ //Se compara con la contraseña ingresada
            mysqli_close($conexion); //Las contraseñas coinciden
            $primero= $b[$k];
            $_SESSION['transporte']=$primero;
            header('Location: supervisor.php');
          }elseif($contra_Ini!= $contras){  //Las contraseñas no coinciden
            mysqli_close($conexion);
            header('Location:coyotein.php');
          }
        }else{ //Si no hay coincidencias entre los usuarios
          if($k==$cont-1 && $contra_Ini!=$contras){
            mysqli_close($conexion);
            header('Location:coyotein.php');
          }
        }
      }
    }elseif($cat==2){ //En caso de que la categoría sea 2, es decir supervisor
      $id_usuario=  "SELECT id_usuario FROM usuario WHERE id_categoria= 2"; //Selecciona todos los registros que correspondan a esta categoría
      $resp_usu= mysqli_query($conexion, $id_usuario);
      while($rev_usu= mysqli_fetch_array($resp_usu)){ //Se guardan todos los registros que coincidan
        $b[$i]=$rev_usu[0]; //Se guardan los registros hasheados
        $rev_usu[0]=base64_decode($rev_usu[0]);
        $rev_usu[0]=decodif($rev_usu[0]);
        $a[$i]=$rev_usu[0]; //Se guardan los registros deshasheados
        //echo $a[$i].'<br>';
        $i++;
      }
      if($a==[]){ //En caso de que no haya registros
        mysqli_close($conexion);
        header('Location:inicioS.php'); //No hay un usuario registrado así
      }
      $cont=count($a); //Cuenta el número de registros
      for ($k=0; $k < $cont ; $k++) {
        if($a[$k]==$usu){ //Si hay un usuario igual al ingresado
          $contra=  "SELECT Contraseña FROM usuario WHERE id_usuario LIKE '$b[$k]'"; //Selecciona la contraseña que corresponde
          $resp_cont= mysqli_query($conexion, $contra);                             //a ese usuario
          $rev_cont= mysqli_fetch_array($resp_cont);
          $contra_Ini=$rev_cont[0];
          $contra_Ini=base64_decode($contra_Ini);
          $contra_Ini=decodif($contra_Ini);
          if($contra_Ini == $contras){ //Si las contraseñas coinciden
            mysqli_close($conexion);
            header('Location:./pagsupervisor.php');
          }elseif($contra_Ini!= $contras){ //Si las contraseñas no coinciden
            mysqli_close($conexion);
            header('Location:inicioS.php');
          }
        }else{ //Si es el último registro y las contraseñas no coinciden
          if($k==$cont-1 && $contra_Ini!=$contras){
            mysqli_close($conexion);
            header('Location:inicioS.php');
          }
        }
      }
    }elseif($cat==3){ //Si la categoría es 3, en este caso administrador
      $id_usuario=  "SELECT id_usuario FROM usuario WHERE id_categoria=3"; //Selecciona todos los registros que correspondan a esta categoría
      $resp_usu= mysqli_query($conexion, $id_usuario);
      while($rev_usu= mysqli_fetch_array($resp_usu)){ //Se guardan todos los registros que coincidan
        $b[$i]=$rev_usu[0]; //Se guardan los registros hasheados
        $rev_usu[0]=base64_decode($rev_usu[0]);
        $rev_usu[0]=decodif($rev_usu[0]);
        $a[$i]=$rev_usu[0]; //Se guardan todos los registros deshasheados
        //echo $a[$i].'<br>';
        $i++;
      }
      if($a==[]){ //En caso de que no haya registros
        mysqli_close($conexion);
        header('Location:inicioA.php'); //No hay un usuario registrado así
      }
      $cont=count($a); //Cuenta el número de registros
      for ($k=0; $k < $cont ; $k++) {
        if($a[$k]==$usu){ //Si hay un usuario igual al ingresado
          $contra=  "SELECT Contraseña FROM usuario WHERE id_usuario LIKE '$b[$k]'";
          $resp_cont= mysqli_query($conexion, $contra); //Selecciona la contraseña que corresponda al usuario hasheado
          $rev_cont= mysqli_fetch_array($resp_cont);
          $contra_Ini=$rev_cont[0];
          $contra_Ini=base64_decode($contra_Ini);
          $contra_Ini=decodif($contra_Ini);
          if($contra_Ini == $contras){ //Si las contraseñas coinciden
            mysqli_close($conexion);
            header('Location:./Administrador.php');
          }elseif($contra_Ini!= $contras){ //Si las contraseñas no coinciden
            mysqli_close($conexion);
            header('Location:inicioA.php');
          }
        }else{ //Si es el último registro y las contraseñas no coinciden
          if($k==$cont-1 && $contra_Ini!=$contras){
            mysqli_close($conexion);
            header('Location:inicioA.php');
          }
        }
      }
    }
  }else{
    echo mysqli_conect_error();
    echo mysqli_conect_error();
    exit();
  }
?>
