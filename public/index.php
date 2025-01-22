<?php
require '../app/Models/database/db.php';
require '../app/Models/Client.php';
require '../app/Models/RendezVous.php';
require '../app/Controllers/ClientController.php';
require '../app/Controllers/RendezVousController.php';
require '../app/Controllers/accueilController.php';

use app\Controllers\ClientController;
use app\Controllers\RendezVousController;
use app\Controllers\AccueilController;


$clientController = new ClientController();
$rendezvousController = new RendezVousController();


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'addClient':
        case 'editClt':
            $clientController->pageAddOrEdit();
            break;

        case 'addOrEditC':
            $clientController->createOrUpdate();
            break;

        case 'deleteClient':
            $clientController->deleteClt();
            break;

        case 'addRv':
        case 'editRv':
            $rendezvousController->pageAddOrEditRv();
            break;

        case 'addOrEditRv':
            $rendezvousController->createOrUpdateRv();
            break;

        case 'deleteRv':
            $rendezvousController->deleteRv();
            break;
    }
}


if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'accueil':
            AccueilController::accueil();
            break;

        case 'client':
            $clientController->indexClient();
            break;

        case 'rendezvous':
            $rendezvousController->indexRv();
            break;

        default:
            AccueilController::accueil();
            break;
    }
}
