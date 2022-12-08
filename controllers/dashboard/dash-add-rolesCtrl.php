<?php

//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/./sidebar-Ctrl.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');


//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//
// Si une personne non connectée cherche à accéder au dashboard.
if (!isset($_SESSION['user'])) {
    header('Location: /controllers/homeController.php');
    exit();
}
// Récupération de l'id de l'utilisateur connecté
if (isset($_SESSION['user'])) {
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
$admins = User::getAllAdmins();
$writers = User::getAllWriters();
$users = User::getAllUsers();

try{
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $role =  intval(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT));
        $id = intval(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
        
        if(empty($role)){
            $errors['role'] = 'Le rôle est obligatoire';
        }
        if (empty($errors)) {
            $isRoleUpdated = User::changeRole($id, $role);
            $users = User::getAllUsers();
            SessionFlash::set('Le rôle a bien été modifié');
            header('Location: /controllers/dashboard/dash-add-rolesCtrl.php');
            exit();
        }
    }

} catch (Exception $e) {
    $errors['error'] = $e->getMessage();
}

//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//
// Récupération de tous les utilisateurs
//-------------------------------- APPEL DES VUES ----------------------------------------//

include(__DIR__ . '/../../views/admin/dash-templates/dash-header.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-navbar.php');
include(__DIR__ . '/../../views/admin/dash-add-roles.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-footer.php');
