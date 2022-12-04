<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/Meeting.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');

session_start();

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $delete = Meeting::delete($id);
    if($delete){
        SessionFlash::set('La convention a bien été supprimée');
        header('Location: /controllers/dashboard/dash-all-meetingsCtrl.php');
        exit();  
    }else{
        SessionFlash::set('Une erreur est survenue');
    }

} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

