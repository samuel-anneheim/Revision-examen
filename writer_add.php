<?php require __DIR__ . '/partials/navbar.php';

$nom = $_POST['lastname'] ?? '';
$prenom = $_POST['firstname'] ?? '';
$date = $_POST['birthday'] ?? '';

$errors = [];

if (!empty($_POST)) {
    if ($nom === '') {
        $errors['nom'] = "Veuillez indiquer un nom";
    }
    if ($prenom === '') {
        $errors['prenom'] = "Veuillez indiquer une prenom";
    }
    if (valideDate($date, 'Y-m-d') === false) {
        $errors['date'] = "entre une date valide";
    }

    if (empty($errors)) {
        $query = $db->prepare('INSERT INTO writer (lastname, firstname, birthday) VALUES (:nom, :prenom, :date)');
        $query->bindvalue(':nom', $nom);
        $query->bindvalue(':prenom', $prenom);
        $query->bindvalue(':date', $date);
        $query->execute();

        header('location: writer_add.php?success');
    }
}

?>

<section class="w-50 m-auto">

    <?php
    if (isset($_GET['success'])) { ?>
    <div class="bg-green-400 text-gray-800 h12 w-90 text-center">
        <span>succes</span>
    </div>
    <?php } ?>
    <h1>Ajouter un ecrivain</h1>
    <form action="" method="POST">
        <div>
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname" value="<?= $nom ?>">
            <?php if (isset($errors['nom'])) { ?>
                <div>
                    <span class="text-red-800"><?= $errors['nom'] ?></span>
                </div>
            <?php } ?>
        </div>
        <div>
            <label for="firstname">Prenom</label>
            <input type="text" name="firstname" id="firstname" value="<?= $prenom ?>">
            <?php if (isset($errors['prenom'])) { ?>
                <div>
                    <span class="text-red-800"><?= $errors['prenom'] ?></span>
                </div>
            <?php } ?>
        </div>
        <div>
            <label for="birthday">Birthday</label>
            <input type="date" name="birthday" id="birthday" value="<?= $date ?>">
            <?php if (isset($errors['date'])) { ?>
                <div>
                    <span class="text-red-800"><?= $errors['date'] ?></span>
                </div>
            <?php } ?>
        </div>
        <button>Envoyer</button>
    </form>
</section>

<?php require __DIR__ . '/partials/footer.php' ?>