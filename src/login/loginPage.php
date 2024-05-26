<?php include '../modules/dbconnection.php';
include '../modules/sessionVariables.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../modules/head.php';?>
    <?php include '../fonts/fonts.php';?>
    <link href="../main/common.css" rel="stylesheet" stylesheet="text/css">
    <link href="login.css" rel="stylesheet" stylesheet="text/css">
    <link href="../fonts/fonts.css" rel="stylesheet" stylesheet="text/css">
    <title>Login/register</title>
</head>
<body class="flex justify-center items-center h-screen md:h-fit w-screen loginpage poppins-regular text-white p-5">
    <div class="flex flex-col justify-center login lg:w-2/5 w-4/5">
        <img src="../../logo/logo.JPG" alt="logo" class="rounded-xl">
        <form id="loginform" class="flex flex-col loginform text-black rounded-xl">
            <h1 class="lg:text-6xl text-3xl text-center">Login</h1>
            <input type="email" name="email" id="loginemail" placeholder="email" class="p-2 rounded">
            <input placeholder="password" id="loginpassword" name="password" class="p-2 rounded">
            <input name="confirm-password" id="verifyloginpassword" placeholder="confirm password" class="p-2 rounded">
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 flex gap-3 items-center hidden" id="passwordverifyerror" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>passwords don't match</p>
            </div>
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2 flex gap-3 items-center hidden" id="nopasswordoremailgiven" role="alert">
                <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                <p>Please enter email and password</p>
            </div>
            <div id="erroremail" class="hidden">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center" id="wrongemail" role="alert">
                    <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                    <p>No user with this email registered</p>
                </div>
            </div>
            <div id="errorpassword" class="hidden">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 flex gap-3 items-center" id="wrongpassword" role="alert">
                    <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                    <p>Wrong email or Password</p>
                </div>
            </div>
            <div id="loggedin" class="hidden">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 flex gap-3 items-center" id="loggedinnotifiction" role="alert">
                    <img src="../../icons/icons8-box-important-50.png" alt="warning-icon">
                    <p>Succesfully logged in</p>
                </div>
            </div>
            <button type="submit" id="login" class="p-2 rounded button text-white">Log in</button>
            <h3 class="poppins-italic hover:cursor-pointer hover:text-red-500 gotoregister w-fit">No account? register here</h3>
        </form>
    </div>
    <div class="flex flex-col justify-center register lg:w-2/5 w-4/5 hidden">
        <img src="../../logo/logo.JPG" alt="logo" class="rounded-xl">
        <form action="./register.php" method="POST" class="flex flex-col registerform text-black gap-3 rounded-xl">
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
            <p id="passwordverifyerror" class="hidden"></p>
            <button  type="submit" id="register" class="p-2 rounded button text-white">Register</button>
            <h3 class="poppins-italic hover:cursor-pointer hover:text-red-500 gotologin w-fit">Aready have an account? log in here</h3>
        </form>
    </div>
</body>
<script id="ajax"></script>
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
    $('#loginform').on('submit', function (e) {
        e.preventDefault();
        if($('#loginemail').val() === "" || $('#loginpassword').val() === "" && $('#verifyloginpassword').val() === ""){
            $('#nopasswordoremailgiven').css('display', 'flex');
            $('#passwordverifyerror').hide();
            $('#erroremail').hide();
            $('#errorpassword').hide();
            $('#loggedin').hide();
        } else if($('#loginpassword').val() !== $('#verifyloginpassword').val()){
            $('#nopasswordoremailgiven').hide();
            $('#passwordverifyerror').css('display', 'flex');
            $('#erroremail').hide();
            $('#errorpassword').hide();
            $('#loggedin').hide();
        } else {
            $.ajax({
                type: 'post',
                url: 'login.php',
                data: $('#loginform').serialize(),
                success: function (result) {
                    $('#ajax').empty();
                    $('#ajax').html(result);
            }
        })
        }
    });


</script>
</html>