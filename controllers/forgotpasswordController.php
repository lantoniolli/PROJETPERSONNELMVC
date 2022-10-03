<?php

require_once(__DIR__.'/../config/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    //validation
    if (empty($email)) {
        $errorEmail = 'Veuillez renseigner une adresse mail';
    } else {
        $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$isOk) {
            $errorEmail = 'Adresse mail invalide';
        }
    }
}

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/forms/connexion.php');
include(__DIR__.'/../views/templates/footer.php');