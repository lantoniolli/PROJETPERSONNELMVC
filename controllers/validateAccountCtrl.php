<?php

//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/JWT.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

$token = filter_input(INPUT_GET, 'token');

$element = JWT::get($token);

//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

if($element){
    $isValidated = User::validateAccount($element->id);
    if($isValidated){
        SessionFlash::set('Votre compte a bien été validé !');
        header('Location: /controllers/loginCtrl.php');
        exit();
    } else {
        $error = 'Problème!';
    }
} else {
    $error = 'Problème!';
}

//-------------------------------- APPEL DES VUES ----------------------------------------//