<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Comment.php');

try {
    $id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $user = User::getOne($id_user);
    $comments = Comment::getAllComments();
    $nbComments = count($comments);

} catch (Exception $e) {
    echo $e->getMessage();
    exit;  
}









include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/user/view-profile-user.php');
include(__DIR__.'/../views/templates/footer.php');