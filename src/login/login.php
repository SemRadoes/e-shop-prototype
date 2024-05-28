<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = htmlspecialchars($_POST['email']) ;
    $password = htmlspecialchars($_POST['password']);
    $verifyPassword = htmlspecialchars($_POST['confirm-password']);
    if($email == "" and $password == "" and $verifyPassword == ""){
        echo "<div class='bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 flex gap-3 items-center' role='alert'>
                    <img src='../../icons/icons8-box-important-50.png' alt='warning-icon'>
                    <p>Please enter email and password</p>
                </div>";
    } else if($password != $verifyPassword){
        echo '<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 flex gap-3 items-center" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>passwords don\'t match</p>
            </div>';
    } else {
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
            echo '<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 flex gap-3 items-center" id="loggedinnotifiction" role="alert">
                        <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                        <p>Succesfully logged in</p>
                     </div>';
            session_regenerate_id();
            $_SESSION['user_ID'] = $userID;
            $_SESSION['user_firstname'] = $userFirstName;
            $_SESSION['user_lastname'] = $userLastName;
            $_SESSION['user_email'] = $userEmail;
            $_SESSION['user_role'] = $userRole;
            echo "<script>setTimeout(() => {window.location.href = '../main/index.php'}, 1500)</script>";
        } else {
            echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center" id="wrongpassword" role="alert">
            <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
            <p>Wrong email or Password</p>
        </div>';
        }
    } else {
        echo'<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center" id="wrongemail" role="alert">
        <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
        <p>No user with this email registered</p>
    </div>';
    }
}
}
