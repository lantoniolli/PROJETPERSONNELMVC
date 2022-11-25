
<?php 
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');

session_start();

try {
    // Récupérer la dernière news publiée
    $lastNews = News::getLastNews();
    
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/home.php');
include(__DIR__.'/../views/templates/footer.php');