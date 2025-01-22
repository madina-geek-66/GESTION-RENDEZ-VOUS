<?php
include_once '../app/Views/pageNavigation/header.php';
include_once '../app/Views/pageNavigation/navbar.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="text-center"><?= $id ? "Modifier le rendez Vous" : "Ajouter un rendez vous" ?></h1>

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
        <form class="row g-3" method="POST" action="?action=addOrEditRv">
            <input value="<?= ($rdv ? $rdv['id'] : '') ?>" type="text" class="form-control" id="id"
                name="id" hidden>
            <div class="col-md-6">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" id="date"
                    value="<?= isset($rdv['date']) ? htmlspecialchars($rdv['date']) : '' ?>">
            </div>
            <div class="col-md-6">
                <label for="heure" class="form-label">Heure</label>
                <input type="time" class="form-control" name="heure" id="heure"
                    value="<?= isset($rdv['heure']) ? htmlspecialchars($rdv['heure']) : '' ?>">
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="<?= isset($rdv['description']) ? htmlspecialchars($rdv['description']) : '' ?>">
            </div>
            <div class="col-md-6">
                <label for="client" class="form-label">Client</label>
                <select id="client" class="form-select" name="client">
                    <option selected value="0">Séléctionner...</option>
                    <?php while ($c = $clients->fetch(PDO::FETCH_ASSOC)) : ?>
                        <option value="<?= $c["id"] ?>" <?= (isset($rdv['client']) && $rdv['client'] == $c["id"]) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($c["nom"] . " " . $c["prenom"]) ?>
                        </option>
                        <!-- <option value="<?= $c["id"] ?>"> <?= $c["nom"] . " " . $c["prenom"] ?> </option> -->
                    <?php endwhile; ?>
                </select>
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