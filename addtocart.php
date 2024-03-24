<?php
require "conn.php";
session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $price = $_POST['price'];
    $proname = $_POST['proname'];
    $img =$_POST['img'];

    $total = $price*1;

    $email = $_SESSION['email'];
    
    $sql = "INSERT INTO cart (proid, price, total, useremail,proname,img) VALUES ('$id', '$price',$total, '$email','$proname','$img')";

if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    header('location:cart.php');
} 

}

?>