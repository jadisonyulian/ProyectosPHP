<?php

class Conexion
{

    public static function conectar()
    {
        $dsn         = 'mysql:dbname=cms;host=127.0.0.1';
        $usuario     = 'root';
        $contraseña = '';

        try {
            $mbd = new PDO($dsn, $usuario, $contraseña);
            $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $mbd;

        } catch (PDOException $e) {

            return 'Falló la conexión: ' . $e->getMessage();
        }

    }

}
