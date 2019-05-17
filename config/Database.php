<?php

class Database {

//db params

private $host = 'localhost';
private $db_name = 'php_api';
private $username = 'root';
private $password = '';


//db connect
public function connect(){
    $this->conn = null;


    try{

        $this->conn = new PDO('mysql:host=' .$this->host. ';dbname=' .$this->db_name,
        $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOeception $e) {

        echo 'Connect error'. $e->getMessage();

    }
    return $this->conn;
}

}