<?php

require_once(__DIR__.'/../config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // Valider
    if (empty($lastname)){
        $error = 'Ce champ est obligatoire';
    } else {
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" =>array("regexp"=> '/'.REGEX_NO_NUMBER.'/')));
        if ($isOk == false){
            $error = 'La donnée n\'est pas conforme';
        }
    }

    // TRAITEMENT DE L'EMAIL
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

    // TRAITEMENT PASSWORD
    $password = filter_input(INPUT_POST, 'password');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
    if (empty($password)) {
        $errorPassword = 'Ce champ est obligatoire.';
    } else {
        if ($confirmPassword != $password) {
            $errorConfirmPassword = 'Le mot de passe n\'est pas identique.';
        } else {
            $isOkPassword = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_FOR_PASSWORD . '/')));
            if ($isOkPassword == false) {
                $errorPassword = 'Ce champ n\'est pas conforme.';
            } else {
                $passwordh = password_hash($password, PASSWORD_BCRYPT);
            }
        }
    }
}

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/forms/register.php');
include(__DIR__.'/../views/templates/footer.php');