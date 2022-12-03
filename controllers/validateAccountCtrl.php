<?php
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/JWT.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

session_start();

$token = filter_input(INPUT_GET, 'token');

$element = JWT::get($token);

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

