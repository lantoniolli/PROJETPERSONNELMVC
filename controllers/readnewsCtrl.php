<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

session_start();


try {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id_user = $user->id_users;
    }
    // var_dump($_SESSION['user']);
    // die;

    $id_news = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $news = News::getNews($id_news);



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = trim((string)filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));

        $comment = new Comment();
        $comment->setComment_description($content);
        $comment->setId_users($id_user);
        $comment->setId_news($id_news);
        $comment->addCommentNews();

        // header('Location : /controllers/homeController.php');
        // exit();
    }
    $posts = Comment::getAllComments($id_news);

} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/navigation/readnews.php');
include(__DIR__ . '/../views/user/comments.php');
include(__DIR__ . '/../views/templates/footer.php');
