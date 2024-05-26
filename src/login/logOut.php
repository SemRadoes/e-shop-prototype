<?php
session_start();
// Unset all session variables
$_SESSION = [];
// Destroy the session
session_destroy();
include '../modules/head.php';
echo "<body class='flex justify-center items-center'><div class='bg-green-100 border-l-4 border-green-500 text-green-700 p-2 flex gap-3 items-center' id='loggedinnotifiction' role='alert'>
<img src='../../icons/icons8-box-important-50.png' alt='warning-icon'>
<p>Succesfully logged out. You wil be redirected to the homepage in 3 seconds. If you aren't please click this link: <a href='../main/index.php'>HOME</a></p>
</div><body>";
echo "<script>setTimeout(() => {window.location.href = '../main/index.php'}, 3000)</script>";

