

<?php

//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/News.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');


//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}

try {
    
//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

$search = trim((string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));

//Récupérer toutes les news
$offset = 0;
$allNews = News::getAllNews();


//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//


} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}
//-------------------------------- APPEL DES VUES ----------------------------------------//


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/navigation/all-news.php');
include(__DIR__ . '/../views/templates/footer.php');
