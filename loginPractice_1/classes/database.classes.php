<?php

class Database {

    private $servername;
    private $dbname;

    protected function connect() {
        
        $this->servername = 'localhost';
        $this->dbname = 'ooplogin';

        try{

        $pdo = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, "root", "123456");
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo; 

        }catch(PDOException $e) {
            echo "Connection Error To The Database!" . $e->getMessage();
            die();
        }
    }
}