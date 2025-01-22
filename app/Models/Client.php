<?php

namespace app\Models;
use app\Models\database\DB;



class Client{
    private $connexion;
    //private $table = "clients";

    public function __construct()
    {
        $this->connexion = DB::getInstance();
        // $con = new DB();
        // $this->connexion = $con->getConnexion();
    }

function addClient($nom, $prenom, $email, $telephone){
    //global $connexion;
    $query = "INSERT INTO clients (nom, prenom, email, telephone) VALUES(?,?,?,?)";
    $stmt = $this->connexion->prepare($query);
    $stmt->execute([$nom, $prenom, $email, $telephone]);
    $stmt->closeCursor();
}

function updateClient($id, $nom, $prenom, $email, $telephone){
    //global $connexion;
    $query = "UPDATE clients SET nom =?, prenom = ?, email = ?, telephone = ? WHERE id = ?";
    $stmt = $this->connexion->prepare($query);
    $stmt->execute(array($nom, $prenom, $email, $telephone, $id));
    $stmt->closeCursor();
}

function deleteClient($id){
    //global $connexion;
    $query = "DELETE FROM clients WHERE id =?";
    $stmt = $this->connexion->prepare($query);
    $stmt->execute(array($id));
    $stmt->closeCursor();
}

function getAllClients(){
    //global $connexion;
    $query = "SELECT * FROM clients";
    $stmt = $this->connexion->query($query);
    return $stmt;
}

function getClientById($id){
    //global $connexion;
    $query = "SELECT * FROM clients WHERE id = $id";
    $stmt = $this->connexion->query($query);
    return $stmt;
}

}