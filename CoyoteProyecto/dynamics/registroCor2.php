<?php
//Página en caso de que el registro del Supervisor haya sido exitoso.
echo "<!DOCTYPE html>
  <head>
    <meta charset='utf-8'>
    <title>CoyoTé</title>
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=La+Belle+Aurore' />
    <link rel='stylesheet'' type='text/css' href='//fonts.googleapis.com/css?family=Hammersmith+One' />
    <style>
      body{
        background-color:#D8FA9D;
        width: 50%;
        margin: 0 auto;
        text-align: center;
      }
      img{
        width: 30%;
        height: 30%;
      }
      h2 {
        font-family: 'La Belle Aurore';
        font-size: 50px;
        font-style: normal;
        font-variant: normal;
        font-weight: 700;
        line-height: 26.4px;
        color:#223415;
       }
       h3{
         color:rgb(224, 188, 31);
         font-family: 'Hammersmith One';
       }
       a:hover{
         color:rgb(22, 99, 17);
         font-family: 'Hammersmith One';
         font-size: 18px;
       }
       a{
         color:rgb(25, 47, 23);
         font-family: 'Hammersmith One';
         font-size: 18px;
       }
    </style>
  </head>
  <body>"; //Ventana de registro correcto en el caso del supervisor
echo  "<h2>Registro correcto</h2>
      <img src='../statics/img/PrepaN.png' alt='CoyoTé'><br><br>
      <a href='inicioS.php'>Regresar</a>
    </form>
  </body>"; //Redirecciona a la página de inicio del supervisor

 ?>
