<?php

/**
 *
 */
class EnlacesPaginas
{

    public function enlacesPaginasModel($enlacesModel)
    {

        if ($enlacesModel == "inicio" || $enlacesModel == "nosostros" || $enlacesModel == "servicios" || $enlacesModel == "conctactenos") {

            $module = "views/modules/" . $enlacesModel . ".php";

        } else if ($enlacesModel == "index") {
            # code...

            $module = "views/modules/inicio.php";

        } else {

            $module = "views/modules/inicio.php";

        }

        return $module;

    }

}
