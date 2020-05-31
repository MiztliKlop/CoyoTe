-- MySQL dump 10.13  Distrib 5.7.26, for osx10.10 (x86_64)
--
-- Host: localhost    Database: pruebas
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Alimento`
--

DROP TABLE IF EXISTS `Alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alimento` (
  `id_producto` int(4) NOT NULL,
  `nombreProducto` varchar(100) DEFAULT NULL,
  `costo` int(3) DEFAULT NULL,
  `id_tipo` int(1) DEFAULT NULL,
  `disponibilidad` int(3) DEFAULT NULL,
  `imagen` blob,
  PRIMARY KEY (`id_producto`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `alimento_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipoAlimento` (`id_tipoAlimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alimento`
--

LOCK TABLES `Alimento` WRITE;
/*!40000 ALTER TABLE `Alimento` DISABLE KEYS */;
INSERT INTO `Alimento` VALUES (1,'Bimbuñuelos',14,1,20,_binary 'https://www.chedraui.com.mx/medias/7501000113095-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MTY4NzY0fGltYWdlL2pwZWd8aGVlL2g0OS85NTQzMzA4NzA1ODIyLmpwZ3xjYTI1ZGIyZWFlNWIwODE0MjNlYWJkMmMyNzBmZWM0ZGNiYTRjZjZiZjZjNTg5Y2JmYWJjOGNkMmVhNmZkMDIx\r'),(2,'Donas azucaradas',13,1,20,_binary 'https://www.chedraui.com.mx/medias/7501000112500-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MzIwMDQ4fGltYWdlL2pwZWd8aDdjL2gwOS85NTQzMzA1Mzk2MjU0LmpwZ3xlNWUyYzkwODBmNzNlYmEzNGZlMjUxMjZjMDRkYTVmYmQ3MGU2ZWQ4NDg4ZWMwNGJlZWQ0MzY1ZDBlMmEyYzE1\r'),(3,'Mantecadas',18,1,20,_binary 'https://www.chedraui.com.mx/medias/7501000112401-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MjQ1MTk0fGltYWdlL2pwZWd8aDkwL2g4Mi85NTQzMzA0MTUxMDcwLmpwZ3w5NzhiNDU2ZDZmYmUxOTIzZjI5NDFiM2FhMjEzYWU4MTdkZTg3MjE1NjUyNTlkNmFjNGZlYjVjN2RhZTU1MDNk\r'),(4,'Nito',10,1,20,_binary 'https://odoo.proyectoscimarron.com/web/image/product.template/3775/image\r'),(5,'Roles de canela glaseados',15,1,20,_binary 'https://www.nutricarrito.com/24829-large_default/roles-de-canela-bimbo-glaseados-410-g.jpg\r'),(6,'Panqué de mármol',35,1,20,_binary 'https://www.nutricarrito.com/21652-large_default/panque-bimbo-marmol-255-g.jpg\r'),(7,'Panqué con chispas',35,1,20,_binary 'https://lagranbodega.vteximg.com.br/arquivos/ids/215177-1000-1000/7501000112388_1.jpg?v=636801444158830000\r'),(8,'Panqué con nueces',35,1,20,_binary 'https://www.superama.com.mx/Content/images/products/img_large/0750100011232L.jpg\r'),(9,'Donitas espolvoreadas',20,1,20,_binary 'https://www.chedraui.com.mx/medias/7501000112425-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MTQ2NjE0fGltYWdlL2pwZWd8aGY3L2g0OC85NTQzMzA0NTc3MDU0LmpwZ3xmNmFlZjc0ZGM4MDNmZGNjMTRhZGU4ZGEyNzg0NzM1OWQ0Mjk2NWM4NzNiNzNmMTQxMzI5MTQ4NmI3Y2MwNDgy\r'),(10,'Madalenas con mantequilla',20,1,20,_binary 'https://www.bimbo.com.mx/sites/default/files/product_sweet_bread_bimbo/RD_MADALENA-3p_NEW_LN3.png\r'),(11,'ChocoRoles ',16,1,20,_binary 'https://www.chedraui.com.mx/medias/75002275-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MTYwMzYwfGltYWdlL2pwZWd8aGNjL2hlNi85NTI3ODI0MDIzNTgyLmpwZ3xkYWMyNWJmOGNiN2MxYTAyMjVkNTQ3NmIzODdlY2Q5ZjU2N2QwN2FlNDg4OGE5N2M2MzI0MDYzNjhmNTJlMjhk\r'),(12,'Gansito',12,1,20,_binary 'https://www.superama.com.mx/Content/images/products/img_large/0750100015310L.jpg\r'),(13,'Barritas fresa',12,1,20,_binary 'https://www.superama.com.mx/Content/images/products/img_large/0750100013305L.jpg\r'),(14,'Barritas piña',12,1,20,_binary 'https://www.comercialtrevino.com/wp-content/uploads/2801.jpg\r'),(15,'Canelitas',14,1,20,_binary 'https://cdn.shopify.com/s/files/1/0706/6309/products/mayoreototal-media-caja-canelitas-marinela-de-360-grs-con-6-paquetes-marinela-galletas-marinela-sku_338x.png?v=1563808268\r'),(16,'Pingüinos',15,1,20,_binary 'https://www.superama.com.mx/Content/images/products/img_large/0750100015380L.jpg\r'),(17,'Triki-Trakes',12,1,20,_binary 'https://www.chedraui.com.mx/medias/7501030491057-00-CH515Wx515H?context=bWFzdGVyfHJvb3R8MjMwODh8aW1hZ2UvanBlZ3xoZGIvaGIxLzk1Mjc4NTI3MjgzNTAuanBnfGM0YWMzZmE5M2M4MjA4MmExNjdmNzMxNzEyNGE0NTM1NGYwZWRmMGRmYjBkZWY3N2E1MGY5N2VkZjQ2ZTA4M2E\r'),(18,'Polvorones',20,1,20,_binary 'https://www.superama.com.mx/Content/images/products/img_large/0750103049092L.jpg\r'),(19,'Platí-volos',12,1,20,_binary 'https://www.super-deli.com.mx/img/p/1/3/4/134-home_default.jpg\r'),(20,'Suavicremas fresa',15,1,20,_binary 'https://www.chedraui.com.mx/medias/750103046129-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MTE4OTkxfGltYWdlL2pwZWd8aGIyL2g0OC84ODI2OTQ2NTg0NjA2LmpwZ3w3ZGNkMWI3YWI3MmM2YTEzMWY2NzU5YjdmOWIyMmMxNjMwNDFmYmJiNjcwN2IzZjY0YmEyYjFjNmE5MGRmNTkz\r'),(21,'Suavicremas vainilla',15,1,20,_binary 'https://www.chedraui.com.mx/medias/750103046130-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MTEyNTk2fGltYWdlL2pwZWd8aDEzL2g1MS84ODI2OTQ2MTkxMzkwLmpwZ3w3NTAwYjA1MWM1ZmRlMjhhYzJkOTNmMTM4NjYyM2E3YWRkMjY1MWRmM2Q3MTI5MDQ5MWUwYjVlMzEyNzM2ZDMx\r'),(22,'Suavicremas chocolate',15,1,20,_binary 'https://www.chedraui.com.mx/medias/750103046128-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MTEwODM3fGltYWdlL2pwZWd8aGU4L2hjYy84ODI2OTQ1Nzk4MTc0LmpwZ3w0NTI4NDc1ZGQ0ZjE3MDQzN2Q4OWJjZTQ0ZTcyODgyOWExM2ZjMDdiNzJmMDg2ZDUzZGEwMDk3YTdjNmNkN2Q2\r'),(23,'Sabritas originales',14,1,20,_binary 'https://www.superama.com.mx/Content/images/products/img_large/0750101111560L1.jpg\r'),(24,'Sabritas adobadas',14,1,20,_binary 'https://www.superama.com.mx/Content/images/products/img_large/0750101113392L1.jpg\r'),(25,'Sabritas crujiente flamin hot',16,1,20,_binary 'https://elpoderdelconsumidor.org/wp-content/uploads/2018/10/papas-fritas-flamin-hot-d-sabritas.jpg\r'),(26,'Sabritas crema y especias',14,1,20,_binary 'https://www.chedraui.com.mx/medias/7501011115590-00-CH515Wx515H?context=bWFzdGVyfHJvb3R8MTMzMzY3fGltYWdlL2pwZWd8aGJiL2g5ZS8xMDI4MjMzNTYzMzQzOC5qcGd8MzZkYmMwN2VmYjU0ZTAyZmZjMDMxMGEwYzg1NDc3MmYzMGFlMDRiN2NiZGU2ZTgyYTQyNDdiNmIwODM2ZGJlNg\r'),(27,'Sabritas limón',14,1,20,_binary 'https://www.chedraui.com.mx/medias/7501011133938-00-CH515Wx515H?context=bWFzdGVyfHJvb3R8ODA1MDl8aW1hZ2UvanBlZ3xoMTAvaGU2LzEwMjgyMzMzNTY5MDU0LmpwZ3xhMWYzZjU1ZGMzOGRiNDYwOTU1YzUwZThmNTU1YzJiYTEzYjg4NmM1ZmMyNDA5Y2YzNmVjNzliNTg5Mjk1OTFh\r'),(28,'Sincronizada',20,2,20,_binary 'https://cdn.kiwilimon.com/recetaimagen/21367/th5-640x426-11427.jpg\r'),(29,'Torta (jamón)',25,2,20,_binary 'https://cdn.kiwilimon.com/recetaimagen/13839/13200.jpg\r'),(30,'Sándwich',18,2,20,_binary 'https://www.recetasdesbieta.com/wp-content/uploads/2018/10/sandwich-montecristo-receta-facil-y-rapida_1.jpg\r'),(31,'Chilaquiles',35,2,20,_binary 'https://picayrepica.com/wp-content/uploads/2019/07/cimentaciones-levante.png\r'),(32,'Ensalada',35,2,20,_binary 'https://t1.rg.ltmcdn.com/es/images/1/7/7/ensalada_de_apio_tomate_y_aguacate_60771_orig.jpg\r'),(33,'Hamburguesa',40,2,20,_binary 'https://cocina-casera.com/wp-content/uploads/2016/11/hamburguesa-queso-receta.jpg\r'),(34,'Hamburguesa con papas',50,2,20,_binary 'https://sifu.unileversolutions.com/image/es-MX/recipe-topvisual/2/1260-709/hamburguesa-clasica-50425188.jpg\r'),(35,'Hot-Dog',35,2,20,_binary 'https://placeralplato.com/files/2015/11/Pan-para-hot-dogs-640x480.jpg\r'),(36,'Papas a la francesa',20,2,20,_binary 'https://lh3.googleusercontent.com/proxy/FhFTX31PALTQAATgJE5-NydnQ-gBHmF-Q75JeNdIFQ1fsmu4mBY9TXl-LeLq4LVctHDKgOOKDHfqtTwSh4YmyP0djx2PGtx0ikyUtxEhXMZbKZh-EhCVz67ABE6tUh4UKALCfti8FhPm9oFGZUofiPZ3\r'),(37,'Fruta con yogurt',25,2,20,_binary 'https://www.divinacocina.es/wp-content/uploads/crema-de-yogur-con-frutas.jpg\r'),(38,'Pastel de chocolate',20,2,20,_binary 'https://i2.wp.com/thehappening.com/wp-content/uploads/2018/01/pastel-chocolate.jpg?fit=1024%2C694&ssl=1\r'),(39,'Pay de queso',20,2,20,_binary 'https://cdn.shopify.com/s/files/1/0360/9813/products/Pay_de_Queso_2019_Rebanada_copy_grande.jpg?v=1573082909\r'),(40,'Coca-cola (600 ml)',16,1,20,_binary 'https://tienda.scorpion.com.mx/media/catalog/product/cache/6b1c09900b407c50fce2db5e66ebc123/5/6/560.jpg\r'),(41,'Sprite (600 ml)',16,1,20,_binary 'https://www.chedraui.com.mx/medias/7501055305629-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MTIwNTUxfGltYWdlL2pwZWd8aDExL2gwNS8xMDE1MDY1MjM3OTE2Ni5qcGd8MDEyZTA0NDdmMzJkNGJkOTk0ZjI2YWNkZWM2ZTA1YzAwYzI4YWY3ZTViMjk5ZDUyOGM4NWM5MjFmNzJkZTRkYw\r'),(42,'Fanta (600 ml)',16,1,20,_binary 'https://www.chedraui.com.mx/medias/7501055303779-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8OTQ1Mzh8aW1hZ2UvanBlZ3xoODcvaDdjLzEwMTUwNjc1NzA5OTgyLmpwZ3w0M2FmYTRhZjM4ZWUwNjQxOGQ2MmM5OTMxMTMxYzYzYjZiMmE5OWFkZjBiMjAxOWJmYzU5MjA5MzBiNjViMjgy\r'),(43,'Ciel 1L',20,1,20,_binary 'https://d29nyx213so7hn.cloudfront.net/media/catalog/product/cache/52185b3cc8785d37a875707ba86119a3/8/5/85_ciel-purificada-1-l-botella-pet.jpg\r'),(44,'Ciel 600 ml',16,1,20,_binary 'https://d29nyx213so7hn.cloudfront.net/media/catalog/product/cache/52185b3cc8785d37a875707ba86119a3/1/0/103_ciel-purificada-600-ml-botella-pet.jpg\r'),(45,'Fuze Tea Té Negro con limón',18,1,20,_binary 'https://www.chedraui.com.mx/medias/7501055358861-00-CH1200Wx1200H?context=bWFzdGVyfHJvb3R8MjE0NTM3fGltYWdlL2pwZWd8aGM3L2hmMC8xMDIyMzMzMjI2MTkxOC5qcGd8M2I1ZGNhMTRlNTVlODQyNDE1YjBhZTI1OTg4YmU1Y2Y3MzgzYzRiYTMwZjc5NDkwMmMyNTU0OWQ2N2JlODhjNw\r'),(46,'Fuze Tea durazno',18,1,20,_binary '\"https://res.cloudinary.com/walmart-labs/image/upload/w_960'),(47,'Fuze Tea Té Verde con limón',18,1,20,_binary 'https://mizaki.mx/wp-content/uploads/2017/08/te-verde-.png\r'),(48,'Del Valle Manzana',16,1,20,_binary 'https://http2.mlstatic.com/jugo-del-valle-413-ml-manzana-D_NQ_NP_904010-MLM27760393736_072018-F.jpg\r'),(49,'Del Valle Mango',16,1,20,_binary 'https://media.justo.mx/__sized__/products/032239052000-thumbnail-510x510-70.jpg\r'),(50,'Del Valle Durazno',16,1,20,_binary 'https://www.farmalive.com.mx/wp-content/uploads/2017/08/JUGO-DEL-VALLE-NECTAR-DURAZNO-413ML.jpg\r'),(51,'Del Valle Uva',16,1,20,_binary 'https://www.nutricarrito.com/19788-large_default/bebida-del-valle-frut-con-jugo-de-uva-600-ml.jpg\r'),(52,'Capuccino',18,2,20,_binary 'https://http2.mlstatic.com/nescafe-dolce-gusto-capsulas-de-cafe-capuchino-flaco-48-va-D_NQ_NP_870189-MLM31937240035_082019-F.jpg\r'),(53,'Café Americano',15,2,20,_binary 'https://i.pinimg.com/originals/0f/af/9e/0faf9e3d38a3d59e3ac206c42519a59e.jpg\r'),(54,'Latte',18,2,20,_binary 'https://www.nespresso.com/ncp/resizer.php?width=400&height=300&file=uploads%2Frecipes%2Fnespresso-recipes-Anise-flavoured-Caffe-Latte.jpg&token=33c9b65193c6f503b68d8cf5c15ecd6b\r'),(55,'Jugo de naranja',20,2,20,_binary 'https://i.pinimg.com/600x315/1b/97/9a/1b979ad7aab10ebe134d2e7cdef8cdb6.jpg\r'),(56,'Jugo de Zanahoria',20,2,20,_binary 'https://okdiario.com/img/2018/06/22/receta-de-zumo-de-zanahoria-655x368.jpg\r'),(57,'Jugo antigripal',25,2,20,_binary 'https://cdn.kiwilimon.com/recetaimagen/33527/38886.jpg\r'),(58,'Jugo Verde',25,2,20,_binary 'https://tvpacifico.mx/recetas/intranet/images/recipes/360-379.jpg\r'),(59,'Licuado de plátano',25,2,20,_binary 'https://assets.kraftfoods.com/recipe_images/opendeploy/91471_640x428.jpg\r'),(60,'Licuado de oreo',25,2,20,_binary 'https://i.ytimg.com/vi/KLPEKUGw_I4/maxresdefault.jpg\r'),(61,'Licuado de manzana ',25,2,20,_binary 'https://www.cocinavital.mx/wp-content/uploads/2017/08/licuado-de-manzana.jpg\r'),(62,'Licuado de fresa',25,2,20,_binary 'https://www.cocinavital.mx/wp-content/uploads/2017/08/licuado-de-fresa-con-nuez.jpg\r'),(63,'Vaso de agua de Jamaica',20,2,20,_binary 'https://www.nicepng.com/png/detail/244-2441368_agua-de-jamaica-png-vaso-de-sangria.png\r'),(64,'Vaso de agua de Horchata',20,2,20,_binary 'https://upload.wikimedia.org/wikipedia/commons/f/fd/Vaso_de_horchata.png\r'),(65,'Vaso de agua de Limón',20,2,20,_binary 'https://static3.diariosur.es/www/pre2017/multimedia/noticias/201602/16/media/cortadas/limonada._xoptimizadax--490x578.jpg\r');
/*!40000 ALTER TABLE `Alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Categoria`
--

DROP TABLE IF EXISTS `Categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categoria` (
  `id_categoria` int(1) NOT NULL,
  `Categoria` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categoria`
--

LOCK TABLES `Categoria` WRITE;
/*!40000 ALTER TABLE `Categoria` DISABLE KEYS */;
INSERT INTO `Categoria` VALUES (1,'cliente'),(2,'supervisor'),(3,'administrador');
/*!40000 ALTER TABLE `Categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lugar`
--

DROP TABLE IF EXISTS `Lugar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lugar` (
  `id_lugar` int(2) NOT NULL,
  `lugar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_lugar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lugar`
--

LOCK TABLES `Lugar` WRITE;
/*!40000 ALTER TABLE `Lugar` DISABLE KEYS */;
INSERT INTO `Lugar` VALUES (1,'Cafeteria'),(2,'Jardin El Pulpo'),(3,'Patio de quintos'),(4,'Patio de cuartos'),(5,'Patio de sextos'),(6,'Entrada'),(7,'Pimponeras'),(8,'Multicanchas');
/*!40000 ALTER TABLE `Lugar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `id_usuario` varchar(80) NOT NULL,
  `Nombre` text,
  `Grupo` text,
  `Contraseña` text,
  `id_statusCliente` int(1) DEFAULT NULL,
  `noPedidos` int(1) DEFAULT '0',
  `id_pedido_completo` int(1) DEFAULT '2',
  `id_categoria` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_statusCliente` (`id_statusCliente`),
  KEY `conexion` (`id_categoria`),
  CONSTRAINT `conexion` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_statusCliente`) REFERENCES `statusCliente` (`id_statusCliente`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id_pedido` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(80) DEFAULT NULL,
  `id_producto` int(4) DEFAULT NULL,
  `cantidad` int(1) DEFAULT NULL,
  `id_lugar` int(1) DEFAULT NULL,
  `id_status` int(1) DEFAULT NULL,
  `tiempo` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_producto` (`id_producto`),
  KEY `id_lugar` (`id_lugar`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `Alimento` (`id_producto`),
  CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`),
  CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `statusPedido` (`id_statusPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proceso_pedido`
--

DROP TABLE IF EXISTS `proceso_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proceso_pedido` (
  `id_pedido_completo` int(1) NOT NULL,
  `confirmacion` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pedido_completo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proceso_pedido`
--

LOCK TABLES `proceso_pedido` WRITE;
/*!40000 ALTER TABLE `proceso_pedido` DISABLE KEYS */;
INSERT INTO `proceso_pedido` VALUES (1,'Completo'),(2,'Incompleto');
/*!40000 ALTER TABLE `proceso_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusCliente`
--

DROP TABLE IF EXISTS `statusCliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusCliente` (
  `id_statusCliente` int(1) NOT NULL,
  `statusCliente` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_statusCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusCliente`
--

LOCK TABLES `statusCliente` WRITE;
/*!40000 ALTER TABLE `statusCliente` DISABLE KEYS */;
INSERT INTO `statusCliente` VALUES (1,'Activo'),(2,'Sancionado');
/*!40000 ALTER TABLE `statusCliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusPedido`
--

DROP TABLE IF EXISTS `statusPedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusPedido` (
  `id_statusPedido` int(1) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_statusPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusPedido`
--

LOCK TABLES `statusPedido` WRITE;
/*!40000 ALTER TABLE `statusPedido` DISABLE KEYS */;
INSERT INTO `statusPedido` VALUES (1,'Entregado'),(2,'En espera'),(3,'Fuera de tiempo');
/*!40000 ALTER TABLE `statusPedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoAlimento`
--

DROP TABLE IF EXISTS `tipoAlimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoAlimento` (
  `id_tipoAlimento` int(1) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipoAlimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoAlimento`
--

LOCK TABLES `tipoAlimento` WRITE;
/*!40000 ALTER TABLE `tipoAlimento` DISABLE KEYS */;
INSERT INTO `tipoAlimento` VALUES (1,'Preparado'),(2,'Empaquetado');
/*!40000 ALTER TABLE `tipoAlimento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-30 22:42:37
