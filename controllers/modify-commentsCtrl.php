<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/Comment.php');;
require_once(__DIR__ . '/../helpers/sessionflash.php');

session_start();

try {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id_user = $user->id_users;
    }

    
    $id_comment = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $comment = Comment::getCommentById($id_comment);
    
    // var_dump($comment);
    // die;


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
        //validation des données content
        if (empty($content)) {
            $errors['content'] = 'Le contenu est obligatoire';
        }
        if (empty($errors)) {
            $commentUpdated = new Comment();
            $commentUpdated->setId($id_comment);
            $commentUpdated->setComment_description($content);
            $commentUpdated->setId_users($id_user);
            if ($commentUpdated->updateComment($id_comment)) {
                SessionFlash::set('Le commentaire a bien été modifié');
                header('Location: /controllers/readnewsCtrl.php?id='.$comment->id_news);
                exit();
            } else {
                SessionFlash::set('Une erreur est survenue lors de la modification du commentaire');
                header('Location: /controllers/readnewsCtrl.php?id='.$comment->id_news);
                exit();
            }
        }
    }

} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/user/modify-comment.php');
include(__DIR__ . '/../views/templates/footer.php');
