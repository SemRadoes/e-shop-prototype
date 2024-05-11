<?php include '../modules/dbconnection.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="login.css" rel="stylesheet" stylesheet="text/css">
    <title>Log into Awsem webshop</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <form action="login.php" class="d-flex flex-column">
        <input type="email" placeholder="email" class="form-control">
        <input type="password" placeholder="password" class="form-control">
        <input type="password" placeholder="confirm password" class="form-control">
    </form>
    <h1>- OR -</h1>
    <form action="register.php">
    <input type="text" placeholder="first name" class="form-control">
        <input type="text" placeholder="last name name" class="form-control">
        <input type="email" placeholder="email" class="form-control">
        <input type="text" placeholder="street" class="form-control">
        <input type="text" placeholder="housenumber" class="form-control">
        <input type="text" placeholder="postal code" class="form-control">
        <input type="text" placeholder="city" class="form-control">
    </form>
</body>
</html>