<?php

require "conn.php";
session_start();
$id =$_POST['id'];
$email=$_SESSION['email'];


$sql = "DELETE FROM cart WHERE id='$id'";
$conn->query($sql);

$sql1 = "SELECT sum(qty) as nop, sum(total) as total FROM cart WHERE useremail='$email'";
$result1 = $conn->query($sql1); 
$row1 = $result1->fetch_assoc();



$data['nop'] = $row1['nop'];
$data['total'] = $row1['total'];

echo json_encode($data);

?>