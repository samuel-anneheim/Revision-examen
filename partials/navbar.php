<?php
require __DIR__ . '/../config/database.php';
require __DIR__.'/../config/function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="w-screen min-h-screen bg-gray-100 flex flex-col justify-between">
        <nav class="w-screen bg-blue-300 flex shadow-lg flex-1 max-h-12">
            <div class="xl:container flex justify-between m-auto">
                <div class="p-4 flex-1 flex justify-start">
                    <a href="./index.php" class="px-4">Home</a>
                    <a href="./book_add.php" class="px-4">Ajout livre</a>
                    <a href="./writer_add.php" class="px-4">Ajout ecrivain</a>
                    <a href="./writer_write_book_add.php" class="px-4">Relier livre ecrivain</a>
                </div>
                <div class="p-4  flex justify-end">
                    <a href="" class="block w-1">Dashboard</a>
                </div>
            </div>
        </nav>