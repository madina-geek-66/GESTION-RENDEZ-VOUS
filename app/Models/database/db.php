<?php

namespace app\Models\database;
use PDO;
use PDOException;

class DB{

    private static $instance = null;
    private $connexion;
    private $hote = "localhost" ;
    private $port = "5432";
    private $user = "postgres" ;
    private $password = "madina" ;
    private $dbName = "gestion_rendez_vous_db";

    function __construct(){
        try {
            $dsn = "pgsql:host=$this->hote port=$this->port dbname=$this->dbName ";
            $this->connexion = new PDO($dsn, $this->user, $this->password);
            //$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'connexion réussi avec succés';
        }catch(PDOException $e){
            die("Erreur de connexion: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance->connexion;
    }
}



