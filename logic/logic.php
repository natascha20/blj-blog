<?php
    $errors = [];
    $date    = date ('d.m.y H:i:s');
    $username = '';
    $postTitle = '';
    $postText = '';
    $imageurl = '';
    $space = ' ';

    // Datenbank 041er
    $dbuser = "d041e_namueller";
    $dbpassword = "12345_Db!!!";

    $pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_namueller',$dbuser , $dbpassword, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);


    // $dbuser = "root";
    // $dbpassword = "";

    // $pdo = new PDO('mysql:host=localhost;dbname=bljblog',$dbuser , $dbpassword, [
    //     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    // ]);

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

    // if($postText === ''|| $imageurl === ''){
    //     $errors[] = 'Bitte geben Sie einen Text oder ein Bild ein.';
    // }

    if(count($errors) === 0){
        $stmt = $pdo->prepare("INSERT INTO posts (created_at, created_by, post_title, post_text, imageurl) VALUES(:post_date, :creator, :title, :post, :imageurl)");
        $stmt->execute([':post_date' => $date, ':creator' => $username, ':title' => $postTitle, ':post' => $postText, ':imageurl' => $imageurl]);    

        $date = '';
        $username = '';
        $postTitle = '';
        $postText = '';
        $imageurl = '';
    }
}

$query= 'select * from posts order by created_at desc';

$stmt = $pdo -> query($query);
$rows = $stmt -> fetchAll();

function HasEmptySpace($rows){
    if(strpos($rows, " ")=== false){
        return false;
    }
    return true;
};
