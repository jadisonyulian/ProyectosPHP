<?php
require_once "models/conexion.php";

class Datos extends Conexion
{

    #REGISTRO DE USUARIOS
    #-------------------------------------

    public function registroUsuarioModel($datosModel, $tabla)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password ,email) VALUES
            (:usuario,:password,:email)");

        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "success";

        } else {

            return "error";

        }

        $stmt->close();
    }

    #INGRESO DE USUARIOS
    #-------------------------------------

    public function IngresoUsuarioModel($datosModel, $tabla)
    {

        $stmt = Conexion::conectar()->prepare("select usuario,password from $tabla where usuario=:usuario");

        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }

    #VISTA DE USUARIOS
    #-------------------------------------

    public function vistaUsuarioModel($tabla)
    {

        $stmt = Conexion::conectar()->prepare("select id, usuario,password,email from $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

    }

    #EDITAR DE USUARIOS
    #-------------------------------------

    public function editarUsuarioModel($datosModel, $tabla)
    {

        $stmt = Conexion::conectar()->prepare("select id, usuario,password,email from $tabla where id=:id");

        $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }

    #ACTUALIZAR DE USUARIOS
    #-------------------------------------

    public function actualizarUsuarioModel($datosModel, $tabla)
    {

        $stmt = Conexion::conectar()->prepare("update $tabla set usuario=:usuario,password=:password,email=:email where id=:id");

        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "success";

        } else {

            return "error";

        }

        $stmt->close();

    }

}
