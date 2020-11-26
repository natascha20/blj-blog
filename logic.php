<?php
    $errors = [];
    $username = '';
    $postTitle = '';
    $postText = '';
    
    $pdo = new PDO('mysql:host=localhost;dbname=blogblj', 'root', '', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'] ?? '';
    $postTitle = $_POST['postTitle'] ?? '';
    $postText = $_POST['postText'] ?? '';

    if($username === ''){
        $errors[] = 'Bitte geben Sie einen Namen ein.';
    }

    if($postTitle === ''){
        $errors[] = 'Bitte geben Sie einen Titel für Ihren Post ein.';
    }

    if($postText === ''){
        $errors[] = 'Bitte geben Sie einen Text ein.';
    }

    if(count($errors) === 0){
        $stmt = $pdo->prepare("INSERT INTO posts (created_at, created_by, post_title, post_text) VALUES(now(), :creator, :title, :post)");
        $stmt->execute([':creator' => $username, ':title' => $postTitle, ':post' => $postText]);    

        $username = '';
        $postTitle = '';
        $postText = '';
    }
}

$query= 'select * from posts order by created_at desc';

$stmt = $pdo -> query($query);
$rows = $stmt -> fetchAll();

