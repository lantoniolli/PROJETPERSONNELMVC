<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Comment.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}
try {
    $id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $user = User::getOne($id_user);
    $comments = Comment::getAllComments();
    $nbComments = count($comments);

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $fileType = strtolower(pathinfo($_FILES["news_img"]["name"], PATHINFO_EXTENSION));
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
            $errors['news_img'] = 'Seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.';
        }
        $fileSize = $_FILES["news_img"]["size"];
        if ($fileSize > 5000000) {
            $errors['news_img'] = 'Désolé, votre fichier est trop volumineux.';
        }
        if (empty($errors)) {

            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/";
            $pdo = Database::getInstance();
            $target_file = $news->id_news . '.' . pathinfo($_FILES["news_img"]["name"], PATHINFO_EXTENSION);
            $target_path = $target_dir . $target_file;

            
        }
    }


} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}









include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/user/modify-profile-user.php');
include(__DIR__ . '/../views/templates/footer.php');
