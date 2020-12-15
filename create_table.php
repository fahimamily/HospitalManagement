<?php

$link = mysqli_connect("localhost", "root", "", "trackhs");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "CREATE TABLE employees(
    employeeid INT NOT NULL PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    street VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,    
    state VARCHAR(30) NOT NULL,    
    zipcode INT NOT NULL,
    position VARCHAR(30) NOT NULL,   
    email VARCHAR(30) NOT NULL 
     
   
)";



if (mysqli_query($link, $sql)) {
    echo "Table employees created successfully.";
} else {
    echo "ERROR: Could not execute $sql. "
    . mysqli_error($link);
}
// Close connection
mysqli_close($link);


$link = mysqli_connect("localhost", "root", "", "trackhs");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "CREATE TABLE patients(
    patientid INT NOT NULL PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    street VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,    
    state VARCHAR(30) NOT NULL,    
    zipcode INT NOT NULL,
    phone INT NOT NULL,   
    email VARCHAR(30) NOT NULL,
    employeeid INT NOT NULL,
    foreign key(employeeid) references employees(employeeid) 
     
)";


if (mysqli_query($link, $sql)) {
    echo "Table patients created successfully.";
} else {
    echo "ERROR: Could not execute $sql. "
    . mysqli_error($link);
}
// Close connection
mysqli_close($link);


$link = mysqli_connect("localhost", "root", "", "trackhs");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "CREATE TABLE users(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
     
   
)";
if (mysqli_query($link, $sql)) {
    echo "Table patients created successfully.";
} else {
    echo "ERROR: Could not execute $sql. "
    . mysqli_error($link);
}
// Close connection
mysqli_close($link);


?>

