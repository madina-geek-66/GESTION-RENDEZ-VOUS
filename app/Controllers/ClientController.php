<?php

namespace app\Controllers;
use app\Models\Client;
use PDO;

class ClientController{

    private $model;

    public function __construct(){
        $this->model = new Client();
    }
function indexClient(){
    //$clientModel = new ModelClient();
    $clients = $this->model->getAllClients();
    require_once __DIR__. '/../../app/Views/clients/index.php';
}

function pageAddOrEdit(){
    $id = isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) ? $_GET['id'] : null;
    $client = null;

    if ($id) {
        $client = $this->model->getClientById($id);
        $client = $client ? $client->fetch(PDO::FETCH_ASSOC) : null;
    }
    require_once __DIR__. '/../../app/Views/clients/CreateAndEdit.php';
}

function createOrUpdate(){
    // $id = isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ? $_GET['id'] : null;
    // $client = $id ? $this->model->getClientById($id) : null;
    extract($_POST);
        if ($id) {
            $this->model->updateClient($id,$nom,$prenom,$email,$telephone);
                $message = "Le client a été mis à jour avec succès !";
            } else {
                $this->model->addClient($nom,$prenom,$email,$telephone);
                $message = "Le client a été ajouté avec succès !";
            }
            header("Location: ?page=client&&message=". urlencode($message));
                 
}

function deleteClt(){
    //$clientModel = new ModelClient();
    $id = $_GET['id'];
    $this->model->deleteClient($id);
    $message = "Le client a été supprimé avec succès !";
    header("Location: ?page=client&&message=". urlencode($message));
}

}