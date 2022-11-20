<?php

require_once(__DIR__ . '/../config/config.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        // Nettoyage et validation de l'e-mail.
        // Nettoyage 
        $email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

        // Validation
        if (empty($email)) {
            $error['Email'] = '<script>alert("Le mail est obligatoire.")</script>';
        } else {
            $isOkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($isOkEmail == false) {
                $error['Email'] = 'Le mail n\'est pas conforme.';
            }
        }
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

include(__DIR__.'/../views/templates/navbar.php');
include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/user/forgotpassword.php');
include(__DIR__.'/../views/templates/footer.php');
