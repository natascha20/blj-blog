<?php

$pdo = new PDO('mysql:host=localhost;dbname=blogblj', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$stmt = $pdo->prepare('SELECT * FROM `posts` WHERE id = :id');
$stmt->execute([':id' => 1]);

foreach($stmt->fetchAll() as $pdo) {
    var_dump($pdo);
}
$cols = 3;
$rows = 5;