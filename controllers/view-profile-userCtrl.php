<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../models/Bookings.php');

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;}

try {
    $id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $users = User::getOne($id_user);
    $filename = __DIR__ . '/../public/uploads/users/' . $id_user . '.jpg';
    if (file_exists($filename)) {
        $filename = '/public/uploads/users/' . $id . '.jpg';
    } else {
        $filename = '/public/assets/img/useravatar/' . $users->user_house . '.jpg';
    }
    $comments = Comment::getAllCommentsByUser($id_user);
    $nbComments = count($comments);
    

    

} catch (Exception $e) {
    echo $e->getMessage();
    exit;  
}









include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/user/view-profile-user.php');
include(__DIR__.'/../views/templates/footer.php');