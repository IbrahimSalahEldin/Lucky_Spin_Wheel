<?php

const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_DATABASE = "spinWheen";

// function connect_to_DB(){
//     $table = "users";
//     try {
//         // $dsn = 'mysql:dbname=CRUDphp;host=127.0.0.1;port=3306;';
//         // $db =new PDO($dsn, DB_USER, DB_PASSWORD);
//         // return $db;

//        $db = new PDO("mysql:dbname=CRUDphp;host=127.0.0.1", "root", "3306" );
//        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//        $sql ="CREATE table if not exists $table  (
//         ID INT(11) AUTO_INCREMENT PRIMARY KEY,
//         Name VARCHAR(250) NOT NULL,
//         email VARCHAR(50) NOT NULL UNIQUE,
//         phone VARCHAR(50) NOT NULL UNIQUE,
//         gift VARCHAR(255)  NULL ,
//           );" ;
//        $db->exec($sql);
   


//     }catch (Exception $e){
//         echo $e->getMessage();
//     }
// }



function connect_to_DB() {
    $table = "users";
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


var_dump(connect_to_DB());
