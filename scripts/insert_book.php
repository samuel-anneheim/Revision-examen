<?php

require __DIR__.'/../config/database.php';

$books = [
    ["L'êtranger", "Conte philosophique", "1942-01-01"],
    ["Harry Potter à l'école des sorciers", "Fantasy", "1997-06-26"],
    ["Harry Potter et la Chambre des secrets", "Fantasy", "1998-07-02"],
    ["Dix petits nègres", "Roman policier", "1940-01-01"],
    ["Les misérables", "Roman", "1962-01-01"],
    ["Illusions perdus", "Etude de moeurs", "1837-01-01"]
];

global $db;

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE book');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($books as $book) {
    $db->query("INSERT INTO book (title, kind, publish_at) VALUES (\"$book[0]\", \"$book[1]\", \"$book[2]\")");

    echo "$book[0], $book[1], $book[2] insert ";
};
?>