<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstName = htmlspecialchars($_POST['firstname']) ;
    $lastName = htmlspecialchars($_POST['lastname']);
    $street = htmlspecialchars($_POST['street']);
    $houseNumber = htmlspecialchars($_POST['housenumber']);
    $stad = htmlspecialchars($_POST['city']);
    $postcode = htmlspecialchars($_POST['postalcode']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $verifyPassword = htmlspecialchars($_POST['confirm-password']);
    if($firstName == "" and $lastName == "" and $street == "" and $houseNumber == "" and $stad == "" and $postcode == "" and $email == "" and $password == "" and $verifyPassword == ""){
        echo "<div class='bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 flex gap-3 items-center' role='alert'>
                    <img src='../../icons/icons8-box-important-50.png' alt='warning-icon'>
                    <p>All fields are mandatory</p>
                </div>";
        exit();
    } else if($password != $verifyPassword){
        echo '<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 flex gap-3 items-center" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>passwords don\'t match</p>
            </div>';
            exit();
    } else {
    include '../modules/dbconnection.php';
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'"); 
    $userInfo = $result->fetch_assoc();
    if($userInfo > 0){
        echo '<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 flex gap-3 items-center" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>Email already in use</p>
            </div>';
    } else {
        $hashed = password_hash($verifyPassword, PASSWORD_DEFAULT);
        $registered = $conn->prepare("INSERT INTO users (firstname, lastname, street, streetnumber, postal_code, city, email, pass) VALUES(?,?,?,?,?,?,?,?)"); 
        $registered->bind_param("sssiisss", $firstName, $lastName, $street, $houseNumber, $postcode, $stad, $email, $hashed);
        $registered->execute();
        
        if (!$registered) {
            echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center"  role="alert">
                    <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                    <p>Something went wrong, please try again</p>
                </div>';
        } else {
            session_regenerate_id();
            $_SESSION['user_ID'] = $userID;
            $_SESSION['user_firstname'] = $userFirstName;
            $_SESSION['user_lastname'] = $userLastName;
            $_SESSION['user_email'] = $userEmail;
            $_SESSION['user_role'] = $userRole;
            echo '<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 flex gap-3 items-center" role="alert">
                    <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                    <p>Registered succesfully</p>
                </div>';
            echo "<script>setTimeout(() => {window.location.href = '../main/index.php'}, 1500)</script>";
            $registered = $conn->prepare("SELECT id, firstname, lastname, email FROM users (firstname, lastname, street, streetnumber, postal_code, city, email, pass) VALUES(?,?,?,?,?,?,?,?)"); 
            $registered->bind_param("sssiisss", $firstName, $lastName, $street, $houseNumber, $postcode, $stad, $email, $hashed);
            $registered->execute();
        }
    }
    }
}