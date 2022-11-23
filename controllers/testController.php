<?php 
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');
// require_once(__DIR__ . '/./sidebar-Ctrl.php');

session_start();

try {
    $news = News::getAllNews();
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}


include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/hometest.php');
include(__DIR__.'/../views/templates/footer.php');