<?php require __DIR__ . '/partials/navbar.php';

$title = $_POST['title'] ?? '';
$kind = $_POST['kind'] ?? '';
$date = $_POST['date'] ?? '';

$errors = [];

if (!empty($_POST)) {
    if ($title == '') {
        $errors['titre'] = "Veuillez indiquer un titre";
    }
    if ($kind == '') {
        $errors['kind'] = "Veuillez indiquer une categorie";
    }
}



?>

<section class="flex-1">
    <form action="" method="POST">
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="kind">Categorie</label>
            <input type="text" name="kind" id="kind">
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date">
        </div>
        <button>Envoyer</button>
    </form>
</section>

<?php require __DIR__ . '/partials/footer.php' ?>