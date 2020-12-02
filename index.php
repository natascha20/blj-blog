<?php 
    require("logic/logic.php");
    require("nav.php"); 
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Blog</title>
    </head>
    <body>
        <main>
            <?php if(count($errors) > 0){
                    foreach($errors as $error):
                        echo $error . '<br>';
                    endforeach;
                }
                    ?>
            <h1>Blog</h1>
            
            <ul>
                <?php 
                foreach($rows as $rows):
                ?>
                <li>   
                    <div class="post">
                        <?php 
                        echo (htmlspecialchars($rows["created_at"]).' '.htmlspecialchars($rows ["created_by"]). ', '.htmlspecialchars($rows ["post_title"]). '<br>');
                        echo (htmlspecialchars($rows["post_text"]) . ' <br>');
                        echo '<img src="' .htmlspecialchars($rows["imageurl"]) . '" alt="">';
                            ?>
                    </div>
                </li>     
                <?php endforeach; ?>
            </ul>
            
            
            <div class="form">
                <form action="index.php" method="post">
                    <label for="form">Your Post:<br></label>
                    <label for="username">Ihr Name:</label>
                    <input type="text" name="username" value="<?=$username?>"><br>
                    <label for="postTitle">Post Titel:</label>
                    <input type="text" name="postTitle" value="<?=$postTitle?>"><br>
                    <textarea name="postText" id="postText" cols="30" rows="5" value="<?=$postText?>"></textarea><br/>
                    <label for="imageurl">Bild:</label>
                    <textarea name="imageurl" id="imageurl" value="<?=$imageurl?>"></textarea><br/>
                    <input type="Submit" value="Absenden"> <br>
                </form>
            </div>
        </main>
	</body>
</html>