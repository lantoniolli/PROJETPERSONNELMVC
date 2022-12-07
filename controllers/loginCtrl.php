<?php
session_start();

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // TRAITEMENT DE L'EMAIL
    $email = trim((string) filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    //validation
    if (empty($email)) {
        $errors['Email'] = 'Ce champ est obligatoire.';
    } else {
        $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$isOk) {
            $errors['Email'] = 'Adresse mail invalide';
        }
    }
    $user = User::getByEmail($email);

    if ($user != false) {

        // TRAITEMENT PASSWORD

        $password = filter_input(INPUT_POST, 'password');
        $user = User::getByEmail($email);
        //$password_hash = $user->getPassword();
        $password_hash = $user->user_password;
        $result = password_verify($password, $password_hash);
        if (!$result) {
            $errors['password'] = 'Les informations des connexion ne sont pas bonnes !';
        }

        if (empty($errors)) {
            //$user->setPassword(null);
            $user->password = null;
            $_SESSION['user'] = $user;
            header('Location: /controllers/homeController.php');
            exit;
        }
    } else {
        $errors['email'] = 'Votre compte n\'a pas été validé !';
    }
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/user/login.php');
include(__DIR__ . '/../views/templates/footer.php');