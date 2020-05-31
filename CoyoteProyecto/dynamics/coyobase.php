
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

  $usu=strip_tags($_POST['usuario']);
  $nom=strip_tags($_POST['nombre']);
  $lug=strip_tags($_POST['area']);
  $cont=strip_tags($_POST['contraseña']);
  $cat=strip_tags($_POST['categoria']);



  $conexion=mysqli_connect("localhost","root","root","pruebas");
  if($conexion){
    $usu=mysqli_real_escape_string($conexion,$usu);
    $nom=mysqli_real_escape_string($conexion,$nom);
    $lug=mysqli_real_escape_string($conexion,$lug);
    $cont=mysqli_real_escape_string($conexion,$cont);
    $contCodif=codif($cont); //Se hashean los datos sensibles, id_usuario y su contraseña
    $usuCodif=codif($usu);

    $contBase=base64_encode($contCodif);
    $usuBase=base64_encode($usuCodif);

    $a=[];
    $i=0;

    if($cat=='1'){ //Si la categoria del usuario es 1, es decir cliente
      $id_usuario=  "SELECT id_usuario FROM usuario WHERE id_categoria=1";
      $resp_usu= mysqli_query($conexion, $id_usuario);
      while($rev_usu= mysqli_fetch_array($resp_usu)){ //Se guardan todos los registros que coincidan
        $rev_usu[0]=base64_decode($rev_usu[0]);       //con esta categoría en un arreglo
        $rev_usu[0]=decodif($rev_usu[0]);
        $a[$i]=$rev_usu[0];
        $i++;
      }
      if($a==[]){ //En caso de que sea el primer registro
        $registro= "INSERT INTO usuario (id_usuario,Nombre,Grupo,Contraseña,id_statusCliente,noPedidos,id_pedido_completo,id_categoria) VALUES ('$usuBase','$nom','$lug', '$contBase',1,0,2,'$cat')";
          mysqli_query($conexion, $registro);
          header('Location:registroCor.php'); //Registro correcto
          mysqli_close($conexion);
      }
      $cont=count($a); //Cuenta el número de registros
      for ($k=0; $k < $cont ; $k++) {
        if($a[$k]==$usu){ //Si hay un usuario con el mismo número de cuenta, redireccionará a un registro incorrecto
          mysqli_close($conexion);
          header('Location:registroInc.php');
        }else{ //Si el registro es distinto al usuario ingresado
          if($k==$cont-1){ //En caso de ser el último registro se ingresará un nuevo usuario
            $registro= "INSERT INTO usuario (id_usuario,Nombre,Grupo,Contraseña,id_statusCliente,noPedidos,id_pedido_completo,id_categoria) VALUES ('$usuBase','$nom','$lug', '$contBase',1,0,2,'$cat')";
            if(!mysqli_query($conexion, $registro)){
              header('Location:registroInc.php');
            }else{ //Si la conexión a la base ya fue cerrada, significa que ya hay un usuario con ese id_usuario
              header('Location:registroCor.php');
            }
          }
        }
      }
    }elseif($cat=='2'){ //Si la categoría del usuario es 2, es decir supervisor
      $id_usuario=  "SELECT id_usuario FROM usuario WHERE id_categoria IN (2,3)"; //Selecciona todos los registros
      $resp_usu= mysqli_query($conexion, $id_usuario); //que sean supervisores o administradores
      while($rev_usu= mysqli_fetch_array($resp_usu)){ //Se guardan los registros en un arreglo
        $rev_usu[0]=base64_decode($rev_usu[0]);
        $rev_usu[0]=decodif($rev_usu[0]);
        $a[$i]=$rev_usu[0];
        $i++;
      }
      if($a==[]){ //En caso de ser el primer registro
        $registro= "INSERT INTO usuario (id_usuario,Nombre,Grupo,Contraseña,id_statusCliente,noPedidos,id_pedido_completo,id_categoria) VALUES ('$usuBase','$nom','$lug', '$contBase',1,0,2,'$cat')";
          mysqli_query($conexion, $registro);
          header('Location:registroCor2.php');
          mysqli_close($conexion);
      }
      $cont=count($a);
      for ($k=0; $k < $cont ; $k++) {
        if($a[$k]==$usu){ //Si el registro es igual al usuario ingresado, redirecciona a un registro incorrecto
          mysqli_close($conexion);
          header('Location:registroInc2.php'); //Registro incorrecto del supervisor
        }else{
          if($k==$cont-1){ //Si es el último registro y es distinto al usuario ingresado, se ingresa un nuevo usuario
            $registro= "INSERT INTO usuario (id_usuario,Nombre,Grupo,Contraseña,id_statusCliente,noPedidos,id_pedido_completo,id_categoria) VALUES ('$usuBase','$nom','$lug', '$contBase',1,0,2,'$cat')";
            if(!mysqli_query($conexion, $registro)){
              header('Location:registroInc2.php');
            }else{ //En caso de que la conexión con la base ya fue cerrada, significa que ya hay un usuario con ese id_usuario
              header('Location:registroCor2.php');
            }
          }
        }
      }
    }elseif($cat=='3'){ //Si la categoría del usuario es 3, es un administrador
      $id_usuario=  "SELECT id_usuario FROM usuario WHERE id_categoria IN (2,3)"; //Selecciona todos los registros que tengan
      $resp_usu= mysqli_query($conexion, $id_usuario); //una categoría de administrador o de supervisor

      while($rev_usu= mysqli_fetch_array($resp_usu)){ //Guarda todos los registros en un arreglo
        $rev_usu[0]=base64_decode($rev_usu[0]);
        $rev_usu[0]=decodif($rev_usu[0]);
        $a[$i]=$rev_usu[0];
        $i++;
      }
      if($a==[]){ //Si es el primer registro
        $registro= "INSERT INTO usuario (id_usuario,Nombre,Grupo,Contraseña,id_statusCliente,noPedidos,id_pedido_completo,id_categoria) VALUES ('$usuBase','$nom','$lug', '$contBase',1,0,2,'$cat')";
          mysqli_query($conexion, $registro);
          header('Location:registroCor3.php');
          mysqli_close($conexion);
      }
      $cont=count($a);
      for ($k=0; $k < $cont ; $k++) {
        if($a[$k]==$usu){ //Si el registro es igual al usuario ingresadom cierra la conexión
          mysqli_close($conexion);
          header('Location:registroInc3.php');
        }else{
          if($k==$cont-1){ //Si es el último registro y es distinto al usuario ingresado, se ingresará un nuevo usuario
            $registro= "INSERT INTO usuario (id_usuario,Nombre,Grupo,Contraseña,id_statusCliente,noPedidos,id_pedido_completo,id_categoria) VALUES ('$usuBase','$nom','$lug', '$contBase',1,0,2,'$cat')";
            if(!mysqli_query($conexion, $registro)){
              header('Location:registroInc3.php');
            }else{ //En caso de que la conexión con la base ya fue cerrada, significa que ya hay un usuario con ese id_usuario
              header('Location:registroCor3.php');
            }
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
