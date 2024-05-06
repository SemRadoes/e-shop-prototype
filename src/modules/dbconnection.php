<?php
$servername = "localhost";
$database = "aws3m";
$username = "Aws3m";
$password = "*Q(UcS(96U.h6fd6";
 
// Create connection
 
$conn = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
 
}
