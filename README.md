# CoyoTé :wolf::coffee:
![CoyoTé](https://raw.githubusercontent.com/MiztliKlop/CoyoTe/cliente/statics/img/Prepa.ico)
## _Proyecto de Módulo: PHP, Seguridad, Bases de Datos. Curso de Programación 2020._

### Nombre del equipo: Coyoffee
### Integrantes:
* Giovanni Garfias 
* Omar Ordóñez 
* Valeria Oviedo 
* Maximiliano Ruiz    


#### ¿Cómo instalo CoyoTé?

1. Asegúrate de tener instalado XAMPP o en su defecto MAMP, ya que será necesario para poder visualizar la aplicación web y establecer una conexión con la base de datos.

2. Una vez instalado, dirígete a la rama master del repositorio Coyote, en la última versión de esta rama es donde encontraremos todos los archivos necesarios para el funcionamiento de nuestra aplicación, dentro de una carpeta llamada CoyoTé.

3. Primero, tendrás que descargar 3 carpetas que se encuentran en la carpeta CoyoTé (dynamics, templates y statics), descargarás estas carpetas en la carpeta htdocs que se encuentra en la carpeta xampp que se crea cuando instalas XAMPP, (o Mamp), esta carpeta la encuentras en tu directorio raíz, ahí tendrás que descargar las carpetas mencionadas anteriormente. Es importante que se respeten estas carpetas y que se encuentren al mismo nivel. 

4. Cuando tengas listas tus carpetas dentro de htdocs, tendrás que entrar a la carpeta docs que también se encuentra en la carpeta CoyoTé, aquí encontrarás el respaldo de la base de datos (DB_CoyoTe.sql). Para utilizarla tendrás que entrar a la carpeta mysql, que se encuentra en la carpeta xampp, posteriormente entrarás a la carpeta bin y es aquí donde descargarás el respaldo DB_CoyoTe.sql. 

5. Una vez que tengas tu respaldo descargado, entrarás a tu terminal. Una vez dentro, entraremos a la carpeta xampp posicionándonos en el directorio raíz, luego entraremos a la carpeta xampp, luego a la carpeta mysql y finalmente a la carpeta bin. Una vez dentro de la carpeta bin, entraremos a nuestro SGBD, para una mejor compatibilidad se utilizará root como contraseña. 

6. Crearemos un base de datos de la siguiente forma: CREATE DATABASE pruebas CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;, entramos a esta base y aquí descargaremos nuestro respaldo. (source DB_CoyoTe.sql) 

7. Ya tenemos nuestra base lista, finalmente para visualizar CoyoTé, accederemos a nuestra aplicación desde el navegador con la siguiente sentencia: localhost/dynamics/coyotein.php. Asegurándonos de tener tanto la opción de Apache como la de MYSQL activadas en Xampp. Con esto entraremos a la página inicial de nuestra aplicación y estamos listos para ordenar. 


#### ¿En qué consiste CoyoTé?

Es una aplicación web cuya función principal es servir como un sistema de pedidos a la cafetería para la comunidad de la Prepa 6, en la que pueden ordenar de una amplia gama de productos. CoyoTé ofrece 3 modalidades distintas para el usuario:
1. Cliente:
El cliente será capaz de crear un usuario en el sistema, con el que podrá hacer pedidos a la cafetería. El usuario necesitará un identificador para ingresar al sistema, en el caso de los alumnos necesitan su número de cuenta, los profesores y funcionarios necesitan su RFC y los trabajadores utilizarán su número de trabajador. Los clientes podrán pedir hasta 3 alimentos distintos y la unidad que ellos gusten, siempre y cuando hayan suficientes unidades disponibles, sólo se podrá ordenar un alimento preparado por pedido. Si el pedido ya tiene 3 alimentos, la orden se cerrrará automáticamente y el cliente no podrá ordenar más cosas hasta que sus alimentos sean entregados. Podrán elegir si desean recoger su pedido en la cafetería o en un área específica de la preparatoria.   
2. Supervisor:
La función del supervisor es mantener un control sobre el número de pedidos que se están ingresando a la aplicación, una de las funciones del supervisor es vigilar a los clientes que tengan una sanción, es decir, cuando el cliente haya sobrepasado el límite de 5 minutos para recoger su pedido, se le aplicará dicha sanción que durará 5 días hábiles. 
3. Administrador:
El administrador podrá retirar y eliminar usuarios de la base de datos, ya sea de cliente, supervisor o administrador. También será capaz de ingresar nuevos productos al menú. 

#### Comentarios adicionales 

* En caso de querer registrarse como un administrador o supervisor, utilizaremos una clave que únicamente se le otorga a los supervisores y administradores, la clave es: 23112002. 

* El inicio de sesión de cada usuario tiene que llevarse a cabo en la ventana correspondiente a su categoría, ya sea administrador, supervisor o cliente. 

* El usuario de supervisor y administrador tiene el siguiente formato: Iniciales del nombre seguidas de la fecha de nacimiento en el siguiente formato (aa/mm/dd). Por ejemplo: VAOS021123

* El número de trabajador es de 6 dígitos.

* La contraseña deberá tener mínimo 10 caracteres y mínimo una mayúscula, una minúscula, un número y un carácter especial.

