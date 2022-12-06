

<?php

//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

session_start();


//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

try {
    
//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

$search = trim((string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));

//Récupérer toutes les news
$offset = 0;
$allNews = News::getAll(LIMIT, $offset,$search);


//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//


} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}
//-------------------------------- APPEL DES VUES ----------------------------------------//


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/navigation/all-news.php');
include(__DIR__ . '/../views/templates/footer.php');
