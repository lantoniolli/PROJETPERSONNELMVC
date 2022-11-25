<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/News.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $delete = News::delete($id);
    if($delete){
        SessionFlash::set('Le rendez-vous a bien été supprimé');
        header('Location: /controllers/dashboard/dash-all-newsCtrl.php');
        exit();  
    }else{
        SessionFlash::set('Une erreur est survenue');
    }

} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

