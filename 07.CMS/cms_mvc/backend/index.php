<?php



ob_start(); 
require_once "models/enlaces.php";
require_once "models/ingreso.php";
/*todo*/
require_once "controllers/template.php";
require_once "controllers/enlaces.php";
require_once "controllers/ingreso.php";
echo "prueba";

echo "prueba";

echo "prueba";

$template = new TemplateController();
$template -> template();
ob_end_flush();