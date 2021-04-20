<?php 

require __DIR__ . '/partials/navbar.php';

$id = $_GET['id'] ?? 0;

global $db;
$query = $db->prepare('SELECT* FROM book WHERE id = :id');
$query->bindValue(':id', $id);
$query->execute();
$book = $query->fetch();

$title = $_POST['title'] ?? $book['title'];
$kind = $_POST['kind'] ?? $book['kind'];
$date = $_POST['date'] ?? $book['publish_at'];

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
        $query = $db->prepare('UPDATE book SET title = :title, kind = :kind, publish_at = :date WHERE id=:id');
        $query->bindvalue(':title', $title);
        $query->bindvalue(':kind', $kind);
        $query->bindvalue(':date', $date);
        $query->bindValue(':id', $id);
        $query->execute();

        header('location: index.php?modif_success_book');
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
            <input class="border border-gray-700 rounded" type="text" name="title" id="title" value="<?= $title ?>">
            <?php if (isset($errors['title'])) { ?>
                <div>
                    <span class="text-red-800"><?= $errors['title'] ?></span>
                </div>
            <?php } ?>
        </div>
        <div>
            <label for="kind">Categorie</label>
            <input class="border border-gray-700 rounded" type="text" name="kind" id="kind" value="<?= $kind ?>">
            <?php if (isset($errors['kind'])) { ?>
                <div>
                    <span class="text-red-800"><?= $errors['kind'] ?></span>
                </div>
            <?php } ?>
        </div>
        <div>
            <label for="date">Date</label>
            <input class="border border-gray-700 rounded" type="date" name="date" id="date" value="<?= $date ?>">
            <?php if (isset($errors['date'])) { ?>
                <div>
                    <span class="text-red-800"><?= $errors['date'] ?></span>
                </div>
            <?php } ?>
        </div>
        <button>Modifier</button>
    </form>
</section>

<?php require __DIR__ . '/partials/footer.php' ?>