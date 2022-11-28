
<?php 
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/Comment.php');

session_start();

try {
    $id_news = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id_user = $user->id_users;
    }
    $content = trim(filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS));
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    $posts = Comment::getCommentsByNews($id_news);    
    $comment = new Comment();
    $comment->setComment_description($content);
    $comment->add();
    header('Location : /controllers/readnewsCtrl.php?id=' . $id_news);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit;  
}


?>