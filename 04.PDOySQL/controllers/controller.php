<?php
class MvcController
{

    #LLAMADA A LA PLANTILLA
    #-------------------------------------

    public function pagina()
    {

        include "views/template.php";

    }

    #ENLACES
    #-------------------------------------

    public function enlacesPaginasController()
    {

        if (isset($_GET['action'])) {

            $enlaces = $_GET['action'];

        } else {

            $enlaces = "index";
        }

        $respuesta = Paginas::enlacesPaginasModel($enlaces);

        include $respuesta;

    }

    #REGISTRO DE USUARIOS
    #------------------------------------
    public function registroUsuarioController()
    {

        if (isset($_POST["usuarioRegistro"])) {

            $datosController = array("usuario" => $_POST["usuarioRegistro"],
                "password"                         => $_POST["passwordRegistro"],
                "email"                            => $_POST["emailRegistro"]);

            $respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

            if ($respuesta == "success") {

                $url = "index.php?action=ok";

                header("location:" . $url);

            } else {

                header("location:index.php");
            }

        }

    }

    #INGRESO DE USUARIOS
    #------------------------------------

    public function IngresoUsuarioController()
    {

        if (isset($_POST["usuarioIngreso"])) {

            $datosController = array("usuario" => $_POST["usuarioIngreso"],
                "password"                         => $_POST["passwordIngreso"]);

            $respuesta = Datos::IngresoUsuarioModel($datosController, "usuarios");

            if ($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]) {

                session_start();

                $_SESSION["validar"] = true;

                $url = "index.php?action=usuarios";

                header("location:" . $url);

            } else {

                header("location:index.php?action=fallo");
            }

        }

    }

    #vista DE USUARIOS
    #------------------------------------

    public function vistaUsuarioController()
    {

        $respuesta = Datos::vistaUsuarioModel("usuarios");

        foreach ($respuesta as $row => $item) {

            echo '<tr>
                <td>' . $item["usuario"] . '</td>
                <td>' . $item["password"] . '</td>
                <td>' . $item["email"] . '</td>
                <td><a href="index.php?action=editar&id=' . $item["id"] . '"><button>Editar</button></a></td>
                <td><button>Borrar</button></td>
            </tr>';

        }

    }

    #EDITAR DE USUARIOS
    #------------------------------------

    public function editarUsuarioController()
    {

        $datos = $_GET["id"];

        $respuesta = Datos::editarUsuarioModel($datos, "usuarios");

        echo '

           <input type="hidden" value=' . $respuesta["id"] . ' name="idEditar" required>
    <input type="text" value=' . $respuesta["usuario"] . ' name="usuarioEditar" required>

    <input type="text" value=' . $respuesta["password"] . ' name="passwordEditar" required>

    <input type="email" value=' . $respuesta["email"] . ' name="emailEditar" required>

    <input type="submit" value="Actualizar">';

    }

    #ACTUALIZAR DE USUARIOS
    #------------------------------------

    public function actualizarUsuarioController()
    {

        if (isset($_POST["usuarioEditar"])) {

            $datosController = array("usuario" => $_POST["usuarioEditar"], "password" => $_POST["passwordEditar"], "email" => $_POST["emailEditar"],

                "id"                               => $_POST["idEditar"],

            );

            $respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

            if ($respuesta == "success") {

                $url = "index.php?action=actualizo";

                header("location:" . $url);

            } else {

                echo "error";
            }
        }

    }

}
