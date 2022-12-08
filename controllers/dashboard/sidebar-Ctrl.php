<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../helpers/sessionFlash.php');
require_once(__DIR__ . '/../../helpers/database.php');
require_once(__DIR__ . '/../../models/User.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /controllers/homeController.php');
    exit();
}

// Récupération de l'id de l'utilisateur connecté
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//


$filename = __DIR__ . '/../../public/uploads/users/' . $id . '.jpg';
if (file_exists($filename)) {
    $filename = '/public/uploads/users/' . $id . '.jpg';
} else {
    $filename = '/public/assets/img/useravatar/' . $id . '.jpg';
}

try {

} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}
