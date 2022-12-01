<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');

session_start();
try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id = $user->id_users;
    }

    session_unset();
    $delete = User::delete($id);
    if ($delete) {
        header('Location: /controllers/homeController.php');
        exit();
    } else {
        SessionFlash::set('Une erreur est survenue');
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}
