<?php
            include("nav.php");
            include("logic/databaseUrls.php");
?>
<link rel="stylesheet" href="css/style.css">

<h1>Alle Blogs vom BLJ 2020/21</h1>

<div class="links">
    <ul>
        <?php
        foreach($urls as $url) {
         $link = '<li><a href="' . $url["blogUrl"] . '" target="_blank">' . $url["blogAuthor"] . 's Blog' . '</a>' . '</li><br>';

        echo $link;
        } 
        ?>
    </ul>
</div>