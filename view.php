<?php 
    require("logic/logic.php");
    require("nav.php"); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Blog</title>
    </head>
    <body>
        <main>
            <?php if(count($errors) > 0){
                    foreach($errors as $error){
                        echo $error . '<br>';
                    }
            }?>
            <h1>Blog</h1>
            
            <ul>
                <?php 
                foreach($rows as $rows) {  ?>
                <li>   
                    <div class="post">
                        <?= $rows ["created_by"]. ', '.$rows ["post_title"] . '<br>' . $rows["post_text"] .''. $rows;
                        }
                        ?>
                    </div>
                </li>         
            </ul>
            
            
            <div class="form">
                <form action="view.php" method="post">
                    <label for="form">Your Post:<br></label>
                    <label for="username">Ihr Name:</label>
                    <input type="text" name="username" value="<?=$username?>"><br>
                    <label for="postTitle">Post Titel:</label>
                    <input type="text" name="postTitle" value="<?=$postTitle?>"><br>
                    <textarea name="postText" id="postText" cols="30" rows="5" value="<?=$postText?>"></textarea><br/>
                    <input type="file" value="<?=$image?>"><br>
                    <input type="Submit" value="Absenden"> <br>
                </form>
            </div>
        </main>
    </body>
</html>