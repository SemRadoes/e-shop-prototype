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
        $userID = $userInfo['id'];
        $userRole = $userInfo['role'];
        $userFirstName = $userInfo['firstname'];
        $userLastName = $userInfo['lastname'];
        $userEmail = $userInfo['email'];
        $dbPassword = $userInfo['password'];
        if(password_verify($verifyPassword, $dbPassword)){
            echo "<script>$('#loggedin').removeClass('hidden');$('#errorpassword').addClass('hidden');$('#erroremail').addClass('hidden');$('#passwordverifyerror').addClass('hidden');$('#nopasswordoremailgiven').addClass('hidden');</script>";
            session_regenerate_id();
            $_SESSION['user_ID'] = $userID;
            $_SESSION['user_firstname'] = $userFirstName;
            $_SESSION['user_lastname'] = $userLastName;
            $_SESSION['user_email'] = $userEmail;
            $_SESSION['user_role'] = $userRole;
        } else {
            echo "<script>$('#loggedin').addClass('hidden');$('#errorpassword').removeClass('hidden');$('#erroremail').addClass('hidden');$('#passwordverifyerror').addClass('hidden');$('#nopasswordoremailgiven').addClass('hidden');</script>";
        }
    } else {
        echo "<script>$('#loggedin').addClass('hidden');$('#errorpassword').addClass('hidden');$('#erroremail').removeClass('hidden');$('#passwordverifyerror').addClass('hidden');$('#nopasswordoremailgiven').addClass('hidden');</script>";
    }
}
