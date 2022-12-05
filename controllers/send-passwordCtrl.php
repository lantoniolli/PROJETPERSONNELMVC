<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/JWT.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        
        $email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/user/forgotpassword.php');
include(__DIR__.'/../views/templates/footer.php');
