<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar2.php');
include(__DIR__.'/../views/navigation/all-meeting.php');

include(__DIR__.'/../views/templates/footer.php');