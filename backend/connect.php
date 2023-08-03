<?php

const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_DATABASE = "spinWheen";




function connect_to_DB($table) {
   
    try {
        $dsn = 'mysql:dbname=spinWheen;host=127.0.0.1;port=3306;';
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            ID INT(11) AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(250) NOT NULL,
            email VARCHAR(50) NOT NULL UNIQUE,
            phone VARCHAR(50) NOT NULL UNIQUE,
            gift VARCHAR(255)  NULL
        );";
        
        $db->exec($sql);

        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}



