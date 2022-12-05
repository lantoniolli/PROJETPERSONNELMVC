
<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');
require_once(__DIR__ . '/../models/Meeting.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}
//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//
try {
    // Récupérer la dernière news publiée
    $lastNews = News::getLastNews();
    $lastMeetings = Meeting::getLastMeetings();    

} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//
include(__DIR__.'/../views/templates/navbar2.php');
include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/home.php');
include(__DIR__.'/../views/templates/footer.php');