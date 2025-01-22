<?php

namespace app\Controllers;

use app\Models\Client;
use app\Models\RendezVous;
use PDO;

class RendezVousController{
    private $model;
    private $clientModel;

    public function __construct(){
        $this->model = new RendezVous();
        $this->clientModel = new Client();
    }

function indexRv(){
    $rvs = $this->model->getAllRv();
    require_once __DIR__. '/../../app/Views/rendezvous/index.php';
}

function pageAddOrEditRv(){
    $id = isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) ? $_GET['id'] : null;
    $rdv = null;

    if ($id) {
        $rdv = $this->model->getRvById($id);
        $rdv = $rdv ? $rdv->fetch(PDO::FETCH_ASSOC) : null;
    }
    
    $clients = $this->clientModel->getAllClients();
    require_once __DIR__. '/../../app/Views/rendezvous/CreateAndEdit.php';
}

function createOrUpdateRv(){
    extract($_POST);
    
        if ($id) {
                $this->model->updateRv($id, $date, $heure, $description, $client);
                $message = "Le rendez vous a été mis à jour avec succès !";
            } else {
                $this->model->addRv($date, $heure, $description, $client);
                $message = "Le rendez vous a été ajouté avec succès !";
            }
            header("Location: ?page=rendezvous&&message=" . urlencode($message));
    exit();
                 
}

function deleteRv(){
    $id = $_GET['id'];
    $this->model->deleteRv($id);
    $message = "Le cours a été supprimé avec succès !";
    header("Location: ?page=rendezvous&&message=". urlencode($message));
}

}