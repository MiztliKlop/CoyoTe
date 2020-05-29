<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <form  action="Admin.php" method="post" >
    <input type="submit" name="cerrar" value="Cerrar Sesión">
    </form>
    <a href="Administrador.php">Alterar Usuario</a>
    <a href="Administrador.php">Alterar Productos</a>
    <meta charset="utf-8">
    <title>Administrador</title>
    <style media="screen">
      h1
      {
        text-align: center;
      }
      input[type="number"]
      {
        width:50px;
      }
    </style>
  </head>
  <body>
    <h1>Administrador</h1>
    <hr>
<!-- <iframe src="Admin.php" width="" height=""></iframe> -->

<form style="text-align: center" class="" action="Modificador.php" method="post" >Alterar Productos <br><br>
  <select name="producto">
    <option value="+">AGREGAR +</option>
    <optgroup label="MODIFICAR">
    <option value="changeN">Nombre del Producto</option>
    <option value="changeC">Costo</option>
    <option value="changeT">Tipo</option>
    <option value="changeD">Disponibilidad</option>
    <option value="changeI">Imagen</option>
    </optgroup>
    <option value="-">ELIMINAR -</option>
    <option value="todo">MOSTRAR TODA LA BASE DE ALIMENTOS</option>
    <option value="buscar">BUSCAR PRODUCTOS</option>
    </select>
      <br><br>
  <input type="submit" name="envio" value="Alterar">
</form>

<br><br>

 <!-- <iframe src="Admin.php" width="" height=""></iframe><br> <br> -->
¡FALTAN TRABAJADORES Y PROFESORES/FUNCIONARIOS!

<form class=""  style="text-align: center" action="Modificador.php" method="post" >Alterar Usuarios <br><br>
  <select name="usuario">
    <option value="+">AÑADIR</option>
    <optgroup label="EDITAR">
      <option value="change#">Número de Cuenta</option>
      <option value="changeN">Nombre</option>
      <option value="changeG">Grupo</option>
      <option value="changeC">Contraseña</option>
      <option value="changeS">Status</option>
    </optgroup>
    <option value="-">SACAR -</option>
    <option value="todo">MOSTRAR TODA LA BASE DE USUARIOS</option>
    <option value="buscar">BUSCAR USUARIOS</option>
    </select>
    <br><br>
  <input type="submit" name="envioU" value="Alterar">
</form>
<br>


<br>
<form class=""  style="text-align: center" action="Modificador.php" method="post" >Alterar Lugares <br><br>
  <select name="lugar">
    <option value="+">PONER +</option>
    <option value="-">QUITAR -</option>
    <option value="todo">MOSTRAR MAPA Y BASE DE LUGARES</option>
    <option value="buscar">BUSCAR LUGARES</option>
  </select>
    <br><br>
  <input type="submit" name="envioL" value="Alterar">
</form>
<br>
<br>



<form class=""  style="text-align: center" action="" method="post" >Limitar<br><br>

  <select name="">
    <option value="+">Número de Supervisores</option>
    <option value="-">Número de Administradores</option>
    <option value="todo">Número de Usuarios</option>
    <option value="buscar">Número de Pedidos Simultáneos</option>
    <option value="buscar">Tiempos</option>
    <option value="buscar">Generaciones</option>
  </select>
    <br><br>
  <input type="submit" name="envioL" value="Alterar">
</form>



  </body>
</html>
