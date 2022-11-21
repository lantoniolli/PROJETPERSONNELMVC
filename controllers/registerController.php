<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
    // Valider
    if (empty($pseudo)) {
        $errorPseudo = 'Ce champ est obligatoire';
    } else {
        $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if ($isOk == false) {
            $errorPseudo = 'La donnée n\'est pas conforme';
        }
    }

    // TRAITEMENT DE L'EMAIL
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
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

    if (empty($error)) {
        try {
            $user = new User();
            $user->setPseudo($pseudo);
            $user->setUserMail($email);
            $user->setUserPassword($passwordh);

            $isUserAdded = $user->add();
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/user/register.php');
include(__DIR__ . '/../views/templates/footer.php');
