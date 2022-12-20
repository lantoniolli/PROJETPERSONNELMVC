<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/Comment.php');;
require_once(__DIR__ . '/../helpers/sessionflash.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id_user = $user->id_users;
}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

try {
    $id_comment = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $comment = Comment::getCommentById($id_comment);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
        //validation des données content
        if (empty($content)) {
            $errors['content'] = 'Le contenu est obligatoire';
        }
//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//
        if (empty($errors)) {
            $commentUpdated = new Comment();
            $commentUpdated->setId($id_comment);
            $commentUpdated->setComment_description($content);
            $commentUpdated->setId_users($id_user);
            if ($commentUpdated->updateComment($id_comment)) {
                SessionFlash::set('Le commentaire a bien été modifié');
                header('Location: /controllers/readnewsCtrl.php?id=' . $comment->id_news);
                // header("location:".  $_SERVER['HTTP_REFERER']); 
                exit();
            } else {
                SessionFlash::set('Une erreur est survenue lors de la modification du commentaire');
                header('Location: /controllers/readnewsCtrl.php?id=' . $comment->id_news);
                exit();
            }
        }
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/user/modify-comment.php');
include(__DIR__ . '/../views/templates/footer.php');
