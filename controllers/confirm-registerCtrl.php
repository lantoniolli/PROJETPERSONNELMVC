<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Comment.php');

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;}

try {



} catch (Exception $e) {
    echo $e->getMessage();
    exit;  
}









include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/user/confirm-register.php');
include(__DIR__.'/../views/templates/footer.php');


