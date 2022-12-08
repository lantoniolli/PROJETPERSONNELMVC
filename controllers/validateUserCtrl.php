<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//


//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

$id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

User::validateAccount($id);

//-------------------------------- APPEL DES VUES ----------------------------------------//

