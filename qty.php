<?php
require 'conn.php';
session_start();
$proid =$_POST['pro'];
$qty= $_POST['qty'];
$price =$_POST['price'];

$email=$_SESSION['email'];

$total = $price*$qty;

$sql = "UPDATE cart SET qty='$qty', total='$total' WHERE id='$proid'";
    
$conn->query($sql);


$sql1 = "SELECT sum(qty) as nop, sum(total) as total FROM cart WHERE useremail='$email'";
$result1 = $conn->query($sql1); 
$row1 = $result1->fetch_assoc();



$data['nop'] = $row1['nop'];
$data['total'] = $row1['total'];


echo json_encode($data);



?>