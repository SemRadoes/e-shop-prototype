<?php
include '../modules/dbconnection.php';
include '../modules/sessionVariables.php';

if(!isset($user_id)){
    header('location: ../login/loginPage.php');
} else{
    $productID = $_GET['id'];
    $quantity = $_GET['quantity'];
    
    $registered = $conn->prepare("INSERT INTO usercartproducts (product_id,user_id,quantity) VALUES(?,?,?)"); 
    $registered->bind_param("iii", $productID, $user_id, $quantity);
    
    if(!$registered->execute()){
        echo '<script>alert(something went wrong, try again)</script>';
    } else {
        echo '<script>alert(succesfully added to cart)</script>';
    }
}



