<?php
$servername = "localhost";
$database = "aws3m";
$username = "Aws3m";
$passwordForDatabase = "*Q(UcS(96U.h6fd6";
 
// Create connection
 
$conn = mysqli_connect($servername, $username, $passwordForDatabase, $database);
 
// Check connection
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
 
}
