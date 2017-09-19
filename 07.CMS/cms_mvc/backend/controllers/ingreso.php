<?php

class Ingreso
{

    public function ingresoController()
    {

        if (isset($_POST["usuarioIngreso"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])) {

                $datosController = array("usuario" => $_POST["usuarioIngreso"]);

                $respuesta = IngresoModels::IngresoModel($datosController, "usuarios");

                $intentos      = $respuesta["intentos"];
                $usuarioActual = $_POST["usuarioIngreso"];

                $maximoIntenetos = 2;

                if ($intentos < $maximoIntenetos) {

                    if ($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]) {

                        $intentos        = 0;
                        $datosController = array("usuarioActual" => $usuarioActual, "actualizarIntentos" => $intentos);

                        $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

                        session_start();
                        $_SESSION["validar"] = true;

                        $_SESSION["usuario"] = $usuarioActual;

                        header("location: inicio");

                    } else {

                        ++$intentos;

                        echo '<script>alert (" Ha respondido ' . $usuarioActual . '");</script>';
                        echo '<script>alert (" Ha respondido ' . $intentos . '");</script>';

                        $datosController = array("usuarioActual" => $usuarioActual, "actualizarIntentos" => $intentos);

                        $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

                        echo '<div class="alert alert-danger">Error al ingresar</div>';

                    }

                } else {

                    $intentos        = 0;
                    $datosController = array("usuarioActual" => $usuarioActual, "actualizarIntentos" => $intentos);

                    $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

                    echo '<div class="alert alert-danger">Ha fallado 3 veces, duestre que no es un robot</div>';

                }
            }
        }
    }

}
