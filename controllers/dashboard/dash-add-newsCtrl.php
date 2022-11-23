<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/./sidebar-Ctrl.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

        //nettoyage des données
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        //validation des données title
        if (empty($title)) {
            $errors['title'] = 'Le titre est obligatoire';
        }
        $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
        //validation des données content
        if (empty($content)) {
            $errors['content'] = 'Le contenu est obligatoire';
        }
        //validation des données news_img
        if (empty($news_img)) {
            $errors['news_img'] = 'L\'image est obligatoire';
        }

        //-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

        //nettoyage des images
        $news_img = (filter_input(INPUT_POST, 'news_img', FILTER_SANITIZE_NUMBER_INT));
        //validation des données news_img
        if (empty($news_img)) {
            $errors['news_img'] = 'L\'image est obligatoire';
        }
        //si pas d'erreurs
        if (empty($errors)) {
            $dbh = Database::getInstance();
            //création d'un nouvel objet
            $news = new News();
            //hydratation de l'objet
            $news->setTitle($title);
            $news->setContent($content);
            $news->setNews_img($news_img);
            //insertion en base de données
            $isAddednews = $news->insert();

            $lastInsertId = $dbh->lastInsertId('id_news');
            if(!empty ($lastInsertId)){
                $news->setId($lastInsertId);
                $news_img = $_FILES['$lastInsertId'][$news_img];
            }
            //Destination du fichier
            $folder = '/public/assets/img';
            
        }
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}


//-------------------------------- APPEL DES VUES ----------------------------------------//
include(__DIR__ . '/../../views/admin/dash-templates/dash-header.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-navbar.php');
include(__DIR__ . '/../../views/admin/dash-write-news.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-footer.php');
