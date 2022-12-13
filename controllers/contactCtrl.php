<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}
//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Récupération des données du formulaire

    // Traitement du nom
    $name  = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($name)) {
        $errors['name'] = 'Ce champ est obligatoire';
    } else {
        $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if ($isOk == false) {
            $errors['name'] = 'La donnée n\'est pas conforme';
        }
    }
    // Traitement de l'adresse mail
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        $errors['email'] = 'Ce champ est obligatoire';
    } else {
        $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($isOk == false) {
            $errors['email'] = 'La donnée n\'est pas conforme';
        }
    }
    // Traitement du message
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($message)) {
        $errors['message'] = 'Ce champ est obligatoire';
    } else {
        $isOk = filter_var($message, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if ($isOk == false) {
            $errors['message'] = 'La donnée n\'est pas conforme';
        }
    }
    
    //-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/navigation/contact.php');
include(__DIR__ . '/../views/templates/footer.php');