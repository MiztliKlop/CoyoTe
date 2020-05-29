<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../statics/css/estilo.css">
    <link rel="icon" type="image/ico" href="../statics/img/Prepa.ico" />
    <title>Bebidas</title>
  </head>
  <body>
    <div class ="contenedor">
      <header class="encabezado">
        <div class="encabezado-superior">
          <div class="logo">
            <a href="Menu.html"><img src="../statics/img/Cafe.jpg" alt="Cafe"></a>
          </div>
          <nav class="chico"> </nav>
          <nav class="grande">
            <div class="box">
              <div class="container-1">
                <span class="icon"><i class="fa fa-search"></i></span>
                <input type="search" id="search" placeholder="Search..." />
              </div>
            </div>
            <ul class="nav">
              <li><a href="#"><i class="fas fa-truck" ></i></a>
                <ul>
                  <li><a href="RastreoPedido.html"target="_self">Rastrear Pedidos</a></li>
                  <li><a href="HistorialPedidos.html"target="_self">Historial de Pedidos</a></li>
                </ul>
              </li>
              <li><a href="Carrito_Vacío.html" target="_self"><i class="fas fa-shopping-cart"></i> Carrito</a></li>
            </ul>
          </nav>
        </div>
      </header>
      <div class="contenido">
        <!-- Fromato para los productos
        <div class=objeto_1>
          <img src="../statics/img/">
            <div class=texto>
              <p>
                <br>
                <b>Precio: $</b><br>
                <form action="" method="post">
                  Cantidad: <input type="number" name="Precio" value="" min="0" max="50" required></input><br>
                  <i class="fas fa-shopping-cart"></i><input type="submit" name="Enviar" value="AÑADIR AL CARRITO"></input><br>
                  <i class="fab fa-paypal"></i><input type="submit" name="Enviar" value="PROCEDER A COMPRA"></input><br>
                </form>
              </p>
            </div>
        </div>
      -->
      </div>
    </div>
    <div class="Final">
      <footer class="footer">
        <div class="principal">
          <div class="opinion">
            <figure>
              <form class="opinion" action="" method="post">
                <label for="Opinion">Alguna opinion que desees dejar</label>
                <textarea name="Opinion" style="resize:none"  rows="5" cols="50" maxlength="250"></textarea><br>
                <input type="submit" name="envio" value="Enviar"></input>
              </form>
            </figure>
          </div>
          <div class="contacto">
            <div class="redes-sociales">
              <a href="https://www.facebook.com/prepa6/" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com/prepa6_unam" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://www.instagram.com/explore/tags/prepa6/?hl=es" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
