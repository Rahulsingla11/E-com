<?php
require "conn.php";
session_start();

if(isset($_SESSION['email'])){

      $email=$_SESSION['email'];
      
      $sql = "SELECT sum(qty) as nop, sum(total) as total FROM cart WHERE useremail='$email'";
      
      $result = $conn->query($sql); 
      $row = $result->fetch_assoc();
      
      echo $row['nop'];
}

?>