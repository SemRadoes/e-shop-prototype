<?php

include '../modules/dbconnection.php';

if($_POST){
    $email = $_POST('email');
    $password = $_POST('password');
}