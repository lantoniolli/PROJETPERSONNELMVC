<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/News.php');
require_once(__DIR__ . '/./sidebar-Ctrl.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');

try {
    $search = trim((string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));

    //Récupérer toutes les news
    $offset = 0;
    $allNews = News::getAll(LIMIT, $offset,$search);
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}




//-------------------------------- APPEL DES VUES ----------------------------------------//
include(__DIR__ . '/../../views/admin/dash-templates/dash-header.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-navbar.php');
include(__DIR__ . '/../../views/admin/dash-all-news.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-footer.php');
