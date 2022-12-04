
<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/Meeting.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}
//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//
try {
    $id_meeting = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    // Récupérer la dernière news publiée
    $meeting = Meeting::getMeeting($id_meeting);


} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//
include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/view-meeting.php');
include(__DIR__.'/../views/templates/footer.php');