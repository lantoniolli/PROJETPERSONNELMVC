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
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id_user = $user->id_users;
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}
//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

//-------------------------------- APPEL DES VUES ----------------------------------------//


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/user/confirm-register.php');
include(__DIR__ . '/../views/templates/footer.php');
