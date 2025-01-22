<?php
include_once '../app/Views/pageNavigation/header.php';
include_once '../app/Views/pageNavigation/navbar.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="text-center"><?= $id ? "Modifier les infos du client" : "Ajouter un client" ?></h1>

        <!-- Affichage des messages d'erreur ou de succès -->
        <?php if (isset($errorMessage)) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($errorMessage); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <?php if (isset($message)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <!-- Formulaire -->
        <form class="row g-3" method="POST" action="?action=addOrEditC">
        <input value="<?= ($client ? $client['id'] : '') ?>" type="text" class="form-control" id="id"
                name="id" hidden>
            <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" 
                       value="<?= isset($client['nom']) ? htmlspecialchars($client['nom']) : '' ?>" 
                       >
            </div>
            <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" 
                       value="<?= isset($client['prenom']) ? htmlspecialchars($client['prenom']) : '' ?>" 
                       >
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" 
                       value="<?= isset($client['email']) ? htmlspecialchars($client['email']) : '' ?>" 
                       >
            </div>
            <div class="col-md-6">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" name="telephone" id="telephone" 
                       value="<?= isset($client['telephone']) ? htmlspecialchars($client['telephone']) : '' ?>" 
                       >
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">
                    <?= $id ? "Modifier" : "Ajouter" ?>
                </button>
            </div>
        </form>
    </div>
</main>
<?php
    include_once '../app/Views/pageNavigation/footer.php'
?>