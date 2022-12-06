<?php

//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Meeting.php');
require_once(__DIR__ . '/../models/Bookings.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

// if (isset($_SESSION['user'])) {
//     $user = $_SESSION['user'];
//     $id = $user->id_users;
// }

//-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

$id = $_SESSION['user']->id_users;
$id_meeting = intval(filter_input(INPUT_GET, 'id_meeting', FILTER_SANITIZE_NUMBER_INT));


//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//
try {
    $delete = Booking::delete($id, $id_meeting);
    if ($delete) {
        // SessionFlash::set('Votre réservation a bien été supprimée');
        header('Location: /controllers/modify-profile-userCtrl?id=' . $id);
        exit();
    } else {
        // SessionFlash::set('Une erreur est survenue');
        header('Location: /controllers/modify-profile-userCtrl?id=' . $id);
        exit();
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//