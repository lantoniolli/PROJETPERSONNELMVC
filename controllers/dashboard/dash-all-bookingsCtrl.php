<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../../models/Bookings.php');
require_once(__DIR__ . '/./sidebar-Ctrl.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

// Si une personne non connectée cherche à accéder à cette page
if(!isset($_SESSION['user'])){
    header('Location: /controllers/homeController.php');
    exit();
}
// Récupération de l'id de l'utilisateur connecté
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $id = $user->id_users;
}
// Refuse les personnes ayant le rôle "Utilisateur".
if($user->user_role == 3){
    header('Location: /controllers/homeController.php');
    SessionFlash::set('Vous n\'avez pas accès à cette page', 'danger');
    exit();
}
if($user->user_role == 2){
    header('Location: /controllers/dashboard/notAllowedCtrl.php');
    SessionFlash::set('Vous n\'avez pas accès à cette page', 'danger');
    exit();
}

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

try {

$allBookings = Booking::getAll();


} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}


//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

//-------------------------------- APPEL DES VUES ----------------------------------------//

include(__DIR__ . '/../../views/admin/dash-templates/dash-header.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-navbar.php');
include(__DIR__ . '/../../views/admin/dash-all-bookings.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-footer.php');
