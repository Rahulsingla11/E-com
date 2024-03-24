<?php
    $page="shop";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <?php
    require "link.php";
    ?>
</head>
<body>

<?php
     require "components/header.php";
     require "components/products.php";
     require "components/footer.php";
?>


    
</body>
</html>