<?php


//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//
try {
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id = $user->id_users;
    }

    $id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id = $user->id_users;
    }

    if (!isset($_SESSION['user'])) {
        // Personne non connectée cherchant à accéder à la modification d'un profil
        header('Location: /controllers/loginCtrl.php');
        exit;
    } else if ($user->id_users != $id_user) {
        // Personne connectée cherchant à accéder à la modification d'un profil qui ne lui appartient pas
        header('Location: /controllers/view-profile-userCtrl.php?id=' . $id_user);
        // Personne autorisée à accéder à la modification de son profil
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//
        // TRAITEMENT PASSWORD
        $oldPassword = filter_input(INPUT_POST, 'oldPassword');
        if(empty($oldPassword)){
            $errors['oldPassword'] = 'Ce champ est obligatoire';
        }
        $newPassword = filter_input(INPUT_POST, 'newPassword');
        if(empty($newPassword)){
            $errors['newPassword'] = 'Ce champ est obligatoire';
        }
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
        if(empty($confirmPassword)){
            $errors['confirmPassword'] = 'Ce champ est obligatoire';
        }

        // Vérifier que le mot de passe actuel est celui enregistré dans la base de données
        $password_bdd = $user->user_password;
        $result = password_verify($oldPassword, $password_bdd);
        if (!$result) {
            $errors['oldPassword'] = 'Le mot de passe actuel est incorrect.';
        }
        // Vérifier nouveau mot de passe et confirmation
        if ($newPassword != $confirmPassword) {
            $errors['confirmPassword'] = 'Les mots de passe ne correspondent pas.';
        }
        // Vérifier que le nouveau mot de passe est différent de l'ancien
        if ($newPassword == $oldPassword) {
            $errors['newPassword'] = 'Le nouveau mot de passe doit être différent de l\'ancien.';
        }
        // Hasher le nouveau mot de passe
        $password = password_hash($newPassword, PASSWORD_DEFAULT);
        
        // Si pas d'erreurs, modifier le mot de passe dans la base de données
        if (empty($errors)) {
            $user = new User();
            $user->modifyPassword($id_user, $password);
            SessionFlash::set('Votre mot de passe a bien été modifié.');
            header('Location: /controllers/modify-profile-userCtrl.php?id=' . $id_user);
            exit();
        }
    }
} catch (Exception $e) {
    $errors['Exception'] = $e->getMessage();
}
//-------------------------------- APPEL DES VUES ----------------------------------------//


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/user/forgotpassword.php');
include(__DIR__ . '/../views/templates/footer.php');
