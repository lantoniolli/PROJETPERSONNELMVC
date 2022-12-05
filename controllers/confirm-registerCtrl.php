<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Comment.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//
try {



} catch (Exception $e) {
    echo $e->getMessage();
    exit;  
}

//-------------------------------- APPEL DES VUES ----------------------------------------//
include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/user/confirm-register.php');
include(__DIR__.'/../views/templates/footer.php');


