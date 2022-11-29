<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/Comment.php');
require_once(__DIR__ . '/./sidebar-Ctrl.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $delete = Comment::deleteComment($id);
    if($delete){
        SessionFlash::set('Le commentaire a bien été supprimé');
        header('Location: /controllers/dashboard/dash-all-commentsCtrl.php');
        exit();  
    }else{
        SessionFlash::set('Une erreur est survenue');
    }

} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

