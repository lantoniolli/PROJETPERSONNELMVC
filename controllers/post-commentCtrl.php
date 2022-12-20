<?php 
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/Comment.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

try {

    $id_news = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $posts = Comment::getAllComments();
    $content = trim(filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS));
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

    $comments = new Comment();
    
    
    header('Location : /controllers/readnewsCtrl.php?id=' . $id_news);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit;  
}
//-------------------------------- APPEL DES VUES ----------------------------------------//


