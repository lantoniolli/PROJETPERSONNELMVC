<?php

require_once(__DIR__.'/../config/config.php');
require_once(__DIR__.'/../helpers/sessionflash.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // TRAITEMENT DE L'EMAIL
    $email = trim((string) filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    //validation
    if (empty($email)) {
        $errorEmail = 'Ce champ est obligatoire.';
    } else {
        $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$isOk) {
            $errorEmail = 'Adresse mail invalide';
        }
    }

    // TRAITEMENT PASSWORD
    $password = filter_input(INPUT_POST, 'password');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
    if (empty($password)) {
        $errorPassword = 'Ce champ est obligatoire.';
    }
}

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/user/login.php');
include(__DIR__.'/../views/templates/footer.php');