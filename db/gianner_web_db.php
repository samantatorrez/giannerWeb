<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.6.5.2
 */

/**
 * Database `gianner_web_db`
 */

/* `gianner_web_db`.`categoria` */
$categoria = array(
  array('id' => '1','nombre' => 'Mochilas'),
  array('id' => '2','nombre' => 'Billeteras'),
  array('id' => '3','nombre' => 'Morrales')
);

/* `gianner_web_db`.`producto` */
$producto = array(
  array('id' => '1','nombre' => 'Katrina Black','descripcion' => 'Cuero napón liso bordeaux mate.
Detalles en charol importado italiano bordeaux.
Tela gobelino estampado con motivos florales, fondo negro.
Herrajes baño oro.
Texturado de tapa (referencia a caja toráxica humana)
Cerradura de aperture por rotación.
Bolsillo interno con cierre, abertura 18 cm.
Apertura y cierre mediante ojales a tornillo de alta calidad y cordón de cuero con regulador de tensión.
Tapones dorados pirámide en base.
Correas regulables con hebillas.
','precio' => '1950','medidas' => '30 x 29 x 19 cm','id_categoria' => '1','imagen_dir' => 'images/mochilaCatrina.jpg'),
  array('id' => '2','nombre' => 'Isabella','descripcion' => 'Cuero napón liso bordeaux mate.
Detalles en charol importado italiano bordeaux.
Tela gobelino estampado con motivos florales, fondo negro.
Herrajes baño oro.
Texturado de tapa (referencia a columna vertebral)
Cerradura de aperture por rotación.
Bolsillo delantero con vivo de cuero.
Tapones dorados pirámide en base.
Correa superior de agarre con detalle de remache piramide dirado.
Llavero extraible en cuero liso bordeaux y charol italiano con logo Gianner.','precio' => '1500','medidas' => '32 x 25 x 7 cm','id_categoria' => '3','imagen_dir' => 'images/morralPeque.jpg'),
  array('id' => '3','nombre' => 'Lolita','descripcion' => 'Cuero exterior grabado ¨caviar¨ rosa tropic.
Gobelino floreado.
Logo Gianner con baño oro.
Cierre de bronce negro.
Deslizador con capuchón dorado con rosa de cuero.
Tarjetero interno con 12 compartimientos.
Monedero interno con cierre y deslizador.
Interior en shantung negro bordado.','precio' => '840','medidas' => '21 x 12 cm','id_categoria' => '2','imagen_dir' => 'images/billeteraLolita.jpg')
);

/* `gianner_web_db`.`usuario` */
$usuario = array(
  array('id' => '1','username' => 'user','password' => '1234','role' => '0'),
  array('id' => '2','username' => 'admin','password' => '4321','role' => '1')
);
