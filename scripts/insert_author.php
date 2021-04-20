<?php 


require __DIR__.'/../config/database.php';

$authors = [
    ["Camus", "Albert", "1913-11-07"],
    ["Rowling", "J.K.", "1965-07-31"],
    ["Christie", "Agatha", "1890-09-15"],
    ["Hugo", "Victor", "1802-02-26"],
    ["De Balzac", "Honoré", "1799-05-20"]
];

global $db;

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE writer');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($authors as $author) {
    $db->query("INSERT INTO writer (lastname, firstname, birthday) VALUES (\"$author[0]\", \"$author[1]\", \"$author[2]\")");

    echo "$author[0], authork[1], $author[2] insert ";
};
?>

