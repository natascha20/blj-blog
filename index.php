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
        <title>Natascha's Blog</title>
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
                foreach($rows as $row):
                ?>
                <li>   
                    <div class="post">
                        <?php 
                            echo (htmlspecialchars($row["created_at"]).' '.htmlspecialchars($row ["created_by"]). ', '.htmlspecialchars($row ["post_title"]). '<br>');
                            echo (htmlspecialchars($row["post_text"]) . ' <br>');
                            echo '<img class="imageurl" src="' .htmlspecialchars($row["imageurl"]) . '" alt=""><br><br>';
                        ?>
                    </div>
                </li>     
                <?php endforeach; ?>
            </ul>
            
            
            <div class="form" id="new-post">
            <h2>Dein Post:</h2>
                <form action="index.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?=$username?>"><br>
                    <label for="postTitle">Post Titel:</label>
                    <input type="text" name="postTitle" value="<?=$postTitle?>"><br><br>
                    <label for="postText">Post-Text:<br></label>
                    <textarea name="postText" id="postText" cols="30" rows="5" value="<?=$postText?>"></textarea><br><br>
                    <label for="imageurl">Bildadresse:</label>
                    <input type="text" name="imageurl" id="imageurl" value="<?=$imageurl?>"><br><br>
                    <input type="Submit" value="Absenden"> <br>
                </form>
            </div>
            
        </main>
	</body>
</html>


