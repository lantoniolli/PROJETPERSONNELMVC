<?php

//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../models/Meeting.php');
require_once(__DIR__ . '/../models/Bookings.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

try {
    $id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $users = User::getOne($id_user);
    $filename = __DIR__ . '/../public/uploads/users/' . $id_user . '.jpg';
    if (file_exists($filename)) {
        $filename = '/public/uploads/users/' . $id . '.jpg';
    } else {
        $filename = '/public/assets/img/useravatar/' . $users->user_house . '.jpg';
    }

//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

    $comments = Comment::getAllCommentsByUser($id_user);
    $nbComments = count($comments);
    $allBookings = Meeting::getMeetingsByUser($id_user);

} catch (Exception $e) {
    echo $e->getMessage();
    exit;  
}

//-------------------------------- APPEL DES VUES ----------------------------------------//

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar2.php');
include(__DIR__.'/../views/user/view-profile-user.php');
include(__DIR__.'/../views/templates/footer.php');