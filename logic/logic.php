<?php
    $errors = [];
    $postTime = '';
    $username = '';
    $postTitle = '';
    $postText = '';
    $imageurl = '';
    
    $pdo = new PDO('mysql:host=localhost;dbname=blogblj', 'd041e_namueller', '12345_Db!!!', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'] ?? '';
    $postTitle = $_POST['postTitle'] ?? '';
    $postText = $_POST['postText'] ?? '';
    $imageurl = $_POST['imageurl'] ?? '';

    if($username === ''){
        $errors[] = 'Bitte geben Sie einen Namen ein.';
    }

    if($postTitle === ''){
        $errors[] = 'Bitte geben Sie einen Titel für Ihren Post ein.';
    }

    if($postText === ''|| $imageurl === ''){
        $errors[] = 'Bitte geben Sie einen Text oder ein Bild ein.';
    }

    if(count($errors) === 0){
        $stmt = $pdo->prepare("INSERT INTO posts (created_at, created_by, post_title, post_text, imageurl) VALUES(now(), :creator, :title, :post, :imageurl)");
        $stmt->execute([':creator' => $username, ':title' => $postTitle, ':post' => $postText, ':imageurl' => $imageurl]);    

        $username = '';
        $postTitle = '';
        $postText = '';
        $imageurl = '';
    }
}

$query= 'select * from posts order by created_at desc';

$stmt = $pdo -> query($query);
$rows = $stmt -> fetchAll();

