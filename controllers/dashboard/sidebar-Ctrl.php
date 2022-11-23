<?php
session_start();

require_once(__DIR__ . '/../../helpers/database.php');
require_once(__DIR__ . '/../../models/User.php');


try {
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $id = $user->id_users;
    } else {
        header('Location: /controllers/homeController.php');
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}
