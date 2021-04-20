<?php require __DIR__ . '/partials/navbar.php';

$title = $_POST['title'] ?? '';
$kind = $_POST['kind'] ?? '';
$date = $_POST['date'] ?? '';

$errors = [];

if (!empty($_POST)) {
    if ($title === '') {
        $errors['title'] = "Veuillez indiquer un titre";
    }
    if ($kind === '') {
        $errors['kind'] = "Veuillez indiquer une categorie";
    }
    if (valideDate($date, 'Y-m-d') === false) {
        $errors['date'] = "entre une date valide";
    }

    if (empty($errors)) {
        $query = $db->prepare('INSERT INTO book (title, kind, publish_at) VALUES (:title, :kind, :date)');
        $query->bindvalue(':title', $title);
        $query->bindvalue(':kind', $kind);
        $query->bindvalue(':date', $date);
        $query->execute();

        header('location: book_add.php?success');
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
    <h1>Ajouter un livre</h1>
    <form action="" method="POST">
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="<?= $title ?>">
            <?php if (isset($errors['title'])) { ?>
                <div>
                    <span class="text-red-800"><?= $errors['title'] ?></span>
                </div>
            <?php } ?>
        </div>
        <div>
            <label for="kind">Categorie</label>
            <input type="text" name="kind" id="kind" value="<?= $kind ?>">
            <?php if (isset($errors['kind'])) { ?>
                <div>
                    <span class="text-red-800"><?= $errors['kind'] ?></span>
                </div>
            <?php } ?>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="<?= $date ?>">
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