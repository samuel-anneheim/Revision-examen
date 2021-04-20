<?php 


require __DIR__.'/../config/database.php';

$ids = [
    [1,1],
    [2,2],
    [3,2],
    [4,3],
    [5,4],
    [6,5],
];

global $db;

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE writer_write_book');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($ids as $id) {
    $db->query("INSERT INTO writer_write_book (book_id, writer_id) VALUES ($id[0], $id[1])");
};
?>