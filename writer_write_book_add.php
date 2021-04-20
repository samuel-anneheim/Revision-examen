<?php require __DIR__ . '/partials/navbar.php';

global $db;

$books = $db->query('SELECT * FROM book')->fetchAll();
$authors = $db->query('SELECT * FROM writer')->fetchAll();

$id_book = $_POST['id_book'] ?? '';
$id_author = $_POST['id_author'] ?? '';

$errors=[];

if (!empty($_POST)) {
    var_dump('hello');
    foreach ($books as $book ) {
        var_dump($book['id'], $id_book);
        if ($book['id'] == $id_book) {
            var_dump($id_book);
            foreach ($authors as $author ) {
                if ($author['id'] == $id_author) {
                    var_dump($id_author);
                    $query = $db->prepare('INSERT INTO writer_write_book (book_id, writer_id) VALUES (:book, :writer)');
                    $query->bindvalue(':book', $id_book);
                    $query->bindvalue(':writer', $id_author);
                    $query->execute();

                    break 2;
                }
            }
        }
    }
}

?>

<section>
    <form action="" method="post">
        <div class="flex justify-center ">
            <select name="id_book" id="id_book" class="m-10 p-2 border border-gray-700">
                <?php foreach ($books as $book) { ?>
                    <option value="<?= $book['id'] ?>"><?= $book['title'] ?></option>
                <?php } ?>
            </select>

            <select name="id_author" id="id_author" class="m-10 p-2 border border-gray-700">
                <?php foreach ($authors as $author) { ?>
                    <option value="<?= $author['id'] ?>"><?= $author['lastname'] . " " . $author['firstname'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="flex justify-center ">
            <button class="border border-gray-700 rounded p-2">Affilier</button>
        </div>
    </form>
</section>

<?php require __DIR__ . '/partials/footer.php' ?>