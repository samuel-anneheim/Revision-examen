<?php
require __DIR__ . '/../config/database.php';
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
    <div class="w-screen min-h-screen bg-gray-300 flex flex-col">
        <nav class="w-screen bg-blue-300 flex shadow-lg flex-1 max-h-12">
            <div class="xl:container flex justify-between m-auto">
                <div class="p-4 flex-1 flex justify-start">
                    <a href="./index.php" class="flex-1">Home</a>
                    <a href="./book_add.php" class="flex-1">Ajout</a>
                </div>
                <div class="p-4 flex-1 flex justify-end">
                    <a href="" class="flex-1 block w-1">Dashboard</a>
                </div>
            </div>
        </nav>