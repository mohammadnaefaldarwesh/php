<?php 
 // connect to database mySQLi or PDO
 $connect = mysqli_connect('localhost','phpapp','055643','phpapp');

 //check the connection
 if(!$connect){
  echo 'Connection error: ' . mysqli_connect_error();
 }
?>