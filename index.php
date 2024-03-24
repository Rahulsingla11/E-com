<?php
    $page="index";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require "link.php";
    ?>
</head>
<body>

    <?php
    
    require "components/header.php";

    require "components/main.php";


    require "components/footer.php";

?>
</body>
</html>