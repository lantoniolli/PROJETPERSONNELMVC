<?php 

//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//


//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

try {
    $news = News::getAllNews();
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar2.php');
include(__DIR__.'/../views/hometest.php');
include(__DIR__.'/../views/templates/footer.php');