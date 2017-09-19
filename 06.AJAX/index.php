<?php

require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "controllers/controller.php";

$mvc = new MvcController();
$mvc -> pagina();

#Si un fichero contiene código PHP puro, es preferible omitir la etiqueta de cierre de PHP al final del fichero. Esto impide que se añadan espacios en blanco o nuevas líneas después de la etiqueta de cierre de PHP, los cuales pueden causar efectos no deseados debido a que PHP iniciará la salida del buffer cuando no había intención por parte del programador de enviar ninguna salida en ese punto del script.