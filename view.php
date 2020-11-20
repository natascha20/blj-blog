<?php 
$errors = [];
$formSent = false;

include("logic.php");

$username = $_POST['username'] ?? '';
$postTitle = $_POST['postTitle'] ?? '';
$postText = $_POST['postText'] ?? '';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($username === ''){
        $errors[] = 'Bitte geben Sie einen Namen ein.';
    }

    if($postTitle === ''){
        $errors[] = 'Bitte geben Sie einen Titel für Ihren Post ein.';
    }

    if($postText === ''){
        $errors[] = 'Bitte geben Sie einen Text ein.';
    }

    if (count($errors)=== 0){
        $formSent = true;

        $stmt = $pdo->prepare("INSERT INTO posts (created_at, created_by, post_title, post_text) VALUES(now(), :creator, :title, :post)");
        $stmt->execute([':creator' => $username, ':title' => $postTitle, ':post' => $postText]);
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <title>Blog</title>
    </head>
    <body>
        <?php 
            include "nav.php";
            ?>
        <main>
            <h1>Blog</h1>
            <ul>
                <li>Beispielbeitrag</li>
                <li><img src="img/sunset.jpg" alt="sunset"></li>
                <li>Beispielbeitrag1 mit mehr Text</li>
                <li>Beispielbeitrag2 Was habe ich heute gemacht: xxxxx</li>
                <li>Beispielbeitrag3 xxxxxxxxxxxxxxxxxxxx <br> yyyyyyyyyyyy</li>
                <li><img src="img/travel.jpg" alt="travel"></li>
                <li>Beispielbeitrag4</li>
                <li><img src="img/ocan.jpg" alt="ocan"></li>
            </ul>
            <div class="form">
                <form action="view.php" method="post">
                    <label for="form">Your Post:<br></label>
                    <label for="username">Ihr Name:</label>
                    <input type="text" name="username" value="<?=$username?>"><br>
                    <label for="postTitle">Post Titel:</label>
                    <input type="text" name="postTitle" value="<?=$postTitle?>"><br>
                    <textarea name="postText" id="postText" cols="30" rows="5" value="<?=$postText?>"></textarea><br/>
                    <input type="Submit" value="Absenden"> <br>
                </form>
              
            </div>
        </main>
    </body>
</html>