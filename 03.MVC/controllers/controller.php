<?php

class MvcController
{

    #LLAMADA A LA PLANTILLA
    public function plantilla()
    {

        include "views/template.php";

    }

#INTERACION DEL USUARIO
    #

    public function enlacesPaginasController()
    {

        if (isset($_GET["action"])) {

            $enlacesController = $_GET["action"];

        } else {
            $enlacesController = "index";
        }

        $respuestas = EnlacesPaginas::enlacesPaginasModel($enlacesController);

        include $respuestas;

    }

}
