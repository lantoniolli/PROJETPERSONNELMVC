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

$lastMeetings = Meeting::getLastMeetings();  

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar2.php');
include(__DIR__.'/../views/navigation/all-meeting.php');

include(__DIR__.'/../views/templates/footer.php');