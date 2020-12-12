<?php
/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "root", "");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " 
         . mysqli_connect_error());
}
// Attempt create database query execution
$sql = "CREATE DATABASE trackhs";
if(mysqli_query($link, $sql)){
    echo "Database created successfully";
} else{
    echo "ERROR: Could not execute $sql. " 
          . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>
