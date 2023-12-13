<?php

    function conexion_db(){
        try {
            $dsn = "mysql:host=localhost; dbname=zoologico";
            $db = new PDO ("mysql:host=localhost; dbname=zoologico", "zoologico", "root");
            $db->setAttribute (PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $db->setAttribute (PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
            return ($db) ;
        } catch (PDOException $e) {
            echo "Error de conexión";
            exit();
        }
    }

    function clear_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

?>