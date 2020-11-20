<?php
//user & password standartgemäss:
$user = 'root'; 
$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=blogblj', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$statement = $pdo->query('SELECT * FROM `posts`');
foreach($statement->fetchAll() as $task) {
    var_dump($task);
}
var_dump($pdo);

$cols = 3;
$rows = 5;