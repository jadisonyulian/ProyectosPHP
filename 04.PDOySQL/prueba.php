<?php


        $dsn = 'mysql:dbname=cursophp;host=127.0.0.1';
        $usuario = 'root';
        $contraseña = '';
        
        try {
            $mbd = new PDO($dsn, $usuario, $contraseña);
            $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
               

?>