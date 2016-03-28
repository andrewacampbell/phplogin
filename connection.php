<?php

$server      = "localhost";
$username    = "root";
$password    = "";
$db          = "addressdb";

// creating a connection the database. 
$conn        = mysqli_connect($server, $username, $password, $db);

if(!$conn) {
    die("Connection failde" . mysqli_connect_error() );
}

echo "Connection successfully!";