<?php include '../modules/dbconnection.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../modules/head.php';?>
    <?php include '../fonts/fonts.php';?>
    <link href="login.css" rel="stylesheet" stylesheet="text/css">
    <link href="../fonts/fonts.css" rel="stylesheet" stylesheet="text/css">
    <title>Log into Awsem webshop</title>
</head>
<body class="flex justify-center items-center h-screen loginpage poppins-regular text-white p-5">
    <div class="flex flex-col justify-center login gap-3">
        <h1>LOGIN</h1>
        <form action="login.php" class="flex flex-col loginform w-full">
            <input type="email" placeholder="email" class="p-2 rounded">
            <input type="password" placeholder="password" class="p-2 rounded">
            <input type="password" placeholder="confirm password" class="p-2 rounded">
            <button class="p-2 rounded button hover:border-white">Log in</button>
            <h3 class="poppins-italic hover:cursor-pointer hover:text-red-500 gotoregister">No account? register here</h3>
        </form>
    </div>
    <div class="flex flex-col justify-center register gap-3 hidden">
        <h1>Register</h1>
        <form action="register.php" class="flex flex-col registerform w-full">
            <input type="text" placeholder="first name" class="p-2 rounded">
            <input type="text" placeholder="last name" class="p-2 rounded">
            <input type="email" placeholder="email" class="p-2 rounded">
            <input type="text" placeholder="street" class="p-2 rounded">
            <input type="text" placeholder="housenumber" class="p-2 rounded">
            <input type="text" placeholder="postal code" class="p-2 rounded">
            <input type="text" placeholder="city" class="p-2 rounded">
            <input type="password" placeholder="password" class="p-2 rounded">
            <input type="password" placeholder="confirm password" class="p-2 rounded">
            <button class="p-2 rounded button hover:border-white hover:border-2">Register</button>
            <h3 class="poppins-italic hover:cursor-pointer hover:text-red-500 gotologin">Aready have an account? log in here</h3>
        </form>
    </div>
</body>
<script>
    $('.gotoregister').on('click', function(){
        $('.login').fadeOut(500);
        setTimeout(() => {
            $('.register').fadeIn(500);
        }, 500);
    });
    $('.gotologin').on('click', function(){
        $('.register').fadeOut(500);
        setTimeout(() => {
            $('.login').fadeIn(500);
        }, 500);
    });
</script>
</html>