<?php 

require __DIR__ . '/partials/navbar.php';

$id = $_GET['id'] ?? 0;

global $db;

$query = $db->prepare('DELETE FROM book WHERE id =:id');
$query->bindValue(':id', $id);
$query->execute();

header('Location: index.php?delete_book')
?>

