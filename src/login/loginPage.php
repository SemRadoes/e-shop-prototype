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
<body class="flex justify-center items-center h-screen md:h-fit w-screen loginpage poppins-regular text-white p-5">
    <div class="flex flex-col justify-center login lg:w-2/5 w-4/5">
        <img src="../../logo/logo.JPG" alt="logo">
        <form action="login.php" class="flex flex-col loginform text-black">
            <h1 class="lg:text-6xl text-3xl text-center">Login</h1>
            <input type="email" name="email" placeholder="email" class="p-2 rounded">
            <input type="password" placeholder="password" class="p-2 rounded">
            <input type="password" name="password" placeholder="confirm password" class="p-2 rounded">
            <button id="login" class="p-2 rounded button text-white">Log in</button>
            <h3 class="poppins-italic hover:cursor-pointer hover:text-red-500 gotoregister w-fit">No account? register here</h3>
        </form>
    </div>
    <div class="flex flex-col justify-center register lg:w-2/5 w-4/5 hidden">
        <img src="../../logo/logo.JPG" alt="logo">
        <form action="register.php" class="flex flex-col registerform text-black gap-3">
            <h1 class="lg:text-6xl md:text-3xl text-xl text-center">Register</h1>
            <div class="flex gap-3 lg:flex-row md:flex-col flex-col">
                <input type="text" placeholder="first name" class="p-2 rounded w-full">
                <input type="text" placeholder="last name" class="p-2 rounded w-full">
            </div>
            <div class="flex gap-3 lg:flex-row md:flex-col flex-col">
                <input type="text" placeholder="street" class="p-2 rounded w-full">
                <input type="text" placeholder="housenumber" class="p-2 rounded w-full">
            </div>
            <div class="flex gap-3 lg:flex-row md:flex-col flex-col">
                <input type="text" placeholder="city" class="p-2 rounded w-full">
                <input type="text" placeholder="postal code" class="p-2 rounded w-full">
            </div>
            <input type="email" placeholder="email" class="p-2 rounded">
            <input type="password" placeholder="password" class="p-2 rounded">
            <input type="password" placeholder="confirm password" class="p-2 rounded">
            <button id="register" class="p-2 rounded button text-white">Register</button>
            <h3 class="poppins-italic hover:cursor-pointer hover:text-red-500 gotologin w-fit">Aready have an account? log in here</h3>
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