<?php require __DIR__ . '/partials/navbar.php' ?>

    <?php if (isset($_GET['delete_book'])) { ?>
        <div class="bg-green-400 text-gray-800 h12 w-90 text-center">
            <span>supprimer livre</span>
        </div>
    <?php } ?>
    <?php if (isset($_GET['delete_writer'])) { ?>
        <div class="bg-green-400 text-gray-800 h12 w-90 text-center">
            <span>supprimer auteur</span>
        </div>
    <?php } ?>
    <?php if (isset($_GET['modif_success_book'])) { ?>
        <div class="bg-green-400 text-gray-800 h12 w-90 text-center">
            <span>Modification success book</span>
        </div>
    <?php } ?>
    <?php if (isset($_GET['modif_success_writer'])) { ?>
        <div class="bg-green-400 text-gray-800 h12 w-90 text-center">
            <span>Modification success book</span>
        </div>
    <?php } ?>
    <?php if (isset($_GET['success_affiliation'])) { ?>
        <div class="bg-green-400 text-gray-800 h12 w-90 text-center">
            <span>affiliation success</span>
        </div>
    <?php } ?>

<section class="list flex justify-around ">


    <table class="m-8 w-50 text-center border-collapse  border border-gray-700 ">
        <thead>
            <tr>
                <th class="border border-gray-700  p-2">ID</th>
                <th class="border border-gray-700  p-2">Titre</th>
                <th class="border border-gray-700  p-2">Genre</th>
                <th class="border border-gray-700  p-2">Date</th>
                <th class="border border-gray-700  p-2" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $db;
            $books = $db->query('SELECT * FROM book')->fetchAll();
            foreach ($books as $book) { ?>
                <tr>
                    <td class="border border-gray-700  p-2"><?= $book['id'] ?></td>
                    <td class="border border-gray-700  p-2"><?= $book['title'] ?></td>
                    <td class="border border-gray-700  p-2"><?= $book['kind'] ?></td>
                    <td class="border border-gray-700  p-2"><?= $book['publish_at'] ?></td>
                    <td class="border border-gray-700  p-2"><button class="bg-green-400 p-2 text-white rounded hover:bg-green-700"><a href="./modif_book.php?id=<?= $book['id'] ?>">modifier</a></button></td>
                    <td class="border border-gray-700  p-2"><button class="bg-red-600 p-2 text-white rounded hover:bg-red-800"><a href="./delete_book.php?id=<?= $book['id'] ?>">supprimer</a></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="border border-gray-700  p-2">ID</th>
                <th class="border border-gray-700  p-2">Prenom</th>
                <th class="border border-gray-700  p-2">Nom</th>
                <th class="border border-gray-700  p-2">Anniv</th>
                <th class="border border-gray-700  p-2" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $db;
            $auteurs = $db->query('SELECT * FROM writer')->fetchAll();
            foreach ($auteurs as $auteur) { ?>
                <tr>
                    <td class="border border-gray-700  p-2"><?= $auteur['id'] ?></td>
                    <td class="border border-gray-700  p-2"><?= $auteur['firstname'] ?></td>
                    <td class="border border-gray-700  p-2"><?= $auteur['lastname'] ?></td>
                    <td class="border border-gray-700  p-2"><?= $auteur['birthday'] ?></td>
                    <td class="border border-gray-700  p-2"><button class="bg-green-400 p-2 text-white rounded hover:bg-green-700"><a href="./modif_writer.php?id=<?= $auteur['id'] ?>">modifier</a></button></td>
                    <td class="border border-gray-700  p-2"><button class="bg-red-600 p-2 text-white rounded hover:bg-red-900"><a href="./delete_writer.php?id=<?= $auteur['id'] ?>">supprimer</a></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<?php require __DIR__ . '/partials/footer.php' ?>