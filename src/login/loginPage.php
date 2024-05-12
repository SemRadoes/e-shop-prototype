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
<?php include '../fonts/fonts.php';?>
    <link href="login.css" rel="stylesheet" stylesheet="text/css">
    <link href="../fonts/fonts.css" rel="stylesheet" stylesheet="text/css">
    <title>Log into Awsem webshop</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 loginpage poppins-regular text-white p-5">
    <div class="d-flex flex-column justify-content-center login">
        <h1>LOGIN</h1>
        <form action="login.php" class="d-flex flex-column loginform w-100">
            <input type="email" placeholder="email" class="form-control-lg">
            <input type="password" placeholder="password" class="form-control-lg">
            <input type="password" placeholder="confirm password" class="form-control-lg">
            <button class="btn btn-dark">Log in</button>
        </form>
    </div>
    <h1>- OR -</h1>
    <div class="d-flex flex-column justify-content-center register">
        <h1>Register</h1>
        <form action="register.php" class="d-flex flex-column registerform w-100">
            <input type="text" placeholder="first name" class="form-control-lg">
            <input type="text" placeholder="last name" class="form-control-lg">
            <input type="email" placeholder="email" class="form-control-lg">
            <input type="text" placeholder="street" class="form-control-lg">
            <input type="text" placeholder="housenumber" class="form-control-lg">
            <input type="text" placeholder="postal code" class="form-control-lg">
            <input type="text" placeholder="city" class="form-control-lg">
            <input type="password" placeholder="password" class="form-control-lg">
            <input type="password" placeholder="confirm password" class="form-control-lg">
            <button class="btn btn-dark">Register</button>
        </form>
    </div>
</body>
</html>