<?php 

include("logic.php");

// senden des Formulars

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
        
            <!-- <?php
                foreach($statement->fetchAll() as $task){
                    echo'<li>' .$task["title"] . '<li>';
                }
            ?> -->

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
                <input type="text" name="username" id="username" value="<?=$username?>"><br />
                <input type="text" name="postTitle" value="<?=$postTitle?>"><br />
                <textarea name="postText" id="postText" cols="30" rows="5" value="<?=$postText?>"></textarea><br />
                <input type="Submit" value="Absenden" />
            </form>
            <?php 
                $username = $_POST['username'];
                $postTitle = $_POST["postTitle"];
                $postText = $_POST["postText"];
                $pdo->query("INSERT INTO `posts`(created_by, created_at, post_title, post_text) VALUES ($username,time,$postTitle,$postText)");
            ?>
        </div>
        
    </main>
</body>
</html>