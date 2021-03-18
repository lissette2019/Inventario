<?php
        //Variables para la conexion de base de datos.
        $server ='localhost';
        $username = 'root';
        $password = '';
        $database = 'repo-login';

        //conexion
        try {
            $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
        } catch   (PDOException $e){
            die ('Connected failed: '.$e->getMessage());
        }


?>