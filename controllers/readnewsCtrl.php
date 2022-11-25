
<?php 
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');

// session_start();

try {
    // Récupère l'id de l'article
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    // Récupérer la dernière news publiée
    $getNews = News::getNews($id);
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/readnews.php');
include(__DIR__.'/../views/templates/footer.php');