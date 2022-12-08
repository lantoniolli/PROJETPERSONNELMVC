<?php

//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
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

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//

include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/forgotpassword.php');
include(__DIR__ . '/../views/templates/footer.php');
