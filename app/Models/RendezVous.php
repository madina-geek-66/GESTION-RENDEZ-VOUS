<?php

namespace app\Models;
use app\Models\database\DB;

class RendezVous{

    private $connexion;

    public function __construct()
    {
        $this->connexion = DB::getInstance();
    }

function addRv($date, $heure, $description, $client){
    $sql = "INSERT INTO rendezvous (date, heure, description, client) VALUES (?,?,?,?)";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute(array($date, $heure, $description, $client));
    $stmt->closeCursor();
    
}


function getAllRv(){
    $sql = "SELECT r.id, r.date, r.heure, r.description, CONCAT(c.nom, ' ', c.prenom) AS client 
                FROM rendezvous r 
                JOIN clients c ON r.client = c.id";
    $stmt = $this->connexion->query($sql);
    return $stmt;
}

function getRvById($id){
    $sql = "SELECT r.id, r.date, r.heure, r.description, CONCAT(c.nom, ' ', c.prenom) AS client 
                FROM rendezvous r 
                JOIN clients c ON r.client = c.id 
                WHERE r.id = $id";
    $stmt = $this->connexion->query($sql);
    return $stmt;
}

function updateRv($id, $date, $heure, $description, $client) {
    $sql = "UPDATE rendezvous SET date = ?, heure = ?, description = ?, client = ?  
    WHERE id = ?";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute(array($date, $heure, $description, $client, $id));
    $stmt->closeCursor();
}

function deleteRv($id){
    $sql = "DELETE FROM rendezvous WHERE id = ?";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute(array($id));
    $stmt->closeCursor();
}

}