<?php require __DIR__ . '/partials/navbar.php' ?>

<section class="list flex-1">
    <table class="m-8 w-50 text-center border-collapse  border border-grey-800">
        <thead>
            <tr>
                <th class="border border-grey-800 p-2">ID</th>
                <th class="border border-grey-800 p-2">Titre</th>
                <th class="border border-grey-800 p-2">Genre</th>
                <th class="border border-grey-800 p-2">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $db;
            $books = $db->query('SELECT * FROM book')->fetchAll();
            foreach ($books as $book) { ?>
                <tr>
                    <td class="border border-grey-800 p-2"><?= $book['id'] ?></td>
                    <td class="border border-grey-800 p-2"><?= $book['title'] ?></td>
                    <td class="border border-grey-800 p-2"><?= $book['kind'] ?></td>
                    <td class="border border-grey-800 p-2"><?= $book['publish_at'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<?php require __DIR__ . '/partials/footer.php' ?>