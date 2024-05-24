<?php
session_start();
include '../modules/head.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = htmlspecialchars($_POST['email']) ;
    $password = htmlspecialchars($_POST['password']);
    $verifyPassword = htmlspecialchars($_POST['confirm-password']);
    include '../modules/dbconnection.php';
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'"); 
    $userInfo = $result->fetch_assoc();
    if($userInfo > 0){
        if(password_verify($verifyPassword, $dbPassword)){
            echo "<script>$('#loggedin').removeClass('hidden');$('#errorpassword').addClass('hidden');$('#erroremail').addClass('hidden');</script>";
            session_regenerate_id();
            echo $_SESSION['user_ID'] = $userID;
            echo $_SESSION['user_firstname'] = $userFirstName;
            echo $_SESSION['user_lastname'] = $userLastName;
        } else {
            echo "<script>$('#loggedin').addClass('hidden');$('#errorpassword').removeClass('hidden');$('#erroremail').addClass('hidden');</script>";
        }
    } else {
        echo "<script>$('#loggedin').addClass('hidden');$('#errorpassword').addClass('hidden');$('#erroremail').removeClass('hidden');</script>";
    }
}
