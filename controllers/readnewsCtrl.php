<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id_user = $user->id_users;
}

try {
//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

    $id_news = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $news = News::getNews($id_news);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = trim((string)filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));

        //-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

        $comment = new Comment();
        $comment->setComment_description($content);
        $comment->setId_users($id_user);
        $comment->setId_news($id_news);
        $comment->addCommentNews();

    }
    $posts = Comment::getCommentsbyNews($id_news);


    
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/navigation/readnews.php');
include(__DIR__ . '/../views/templates/footer.php');
