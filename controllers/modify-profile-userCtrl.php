<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../models/Meeting.php');
require_once(__DIR__ . '/../models/Bookings.php');
try {
    session_start();

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

    $users = User::getOne($id_user);
    $comments = Comment::getAllCommentsByUser($id_user);
    $nbComments = count($comments);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // TRAITEMENT PSEUDO
        //Nettoyer
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (User::exist_Pseudo($username) == true && $username != $user->user_name) {
            $errors['Pseudo'] = 'Ce pseudo est déjà utilisé.';
        } else {
            // Valider
            if (empty($username)) {
                $errors['Pseudo'] = 'Ce champ est obligatoire';
            } else {
                $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
                if ($isOk == false) {
                    $errors['Pseudo'] = 'La donnée n\'est pas conforme';
                }
            }
        }
        // TRAITEMENT DE L'EMAIL
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        if (User::exist_Email($email) == true && $email != $user->user_mail) {
            $errors['Mail'] = 'Cette adresse e-mail est déjà utilisée.';
        } else {
            // Valider
            if (empty($email)) {
                $errors['Mail'] = 'Ce champ est obligatoire';
            } else {
                $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
                if (!$isOk) {
                    $error['Email'] = 'Adresse mail invalide';
                }
            }
        }

        // TRAITEMENT DU SELECT
        $houses = filter_input(INPUT_POST, 'houses', FILTER_SANITIZE_NUMBER_INT);
        // if (empty($houses)) {
        //     $errors['houses'] = 'Ce champ est obligatoire';
        // } else {
        //     $isOk = filter_var($houses, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        //     if ($isOk == false) {
        //         $errors['houses'] = 'La donnée n\'est pas conforme';
        //     }
        // }
        // var_dump($_FILES);
        // die;
        // TRAITEMENT DE L'IMAGE

        if ($_FILES['profile']['name'] != '') {

            if (!isset($_FILES['profile'])) {
                throw new Exception('Erreur !');
            }

            if ($_FILES['profile']['error'] != 0) {
                throw new Exception('Erreur :' . $_FILES['profile']['error']);
            }

            if (!in_array($_FILES['profile']['type'], SUPPORTED_FORMATS)) {
                throw new Exception('Format non autorisé');
            }

            if ($_FILES['profile']['size'] > MAX_SIZE) {
                throw new Exception('Poids supérieur à la limite (5Mo)');
            }

            $from = $_FILES['profile']['tmp_name'];
            $filename = $id_user; //$user->id.'.jpg';
            $extension = $extension = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
            $to = UPLOAD_USER_PROFILE . $filename . '.' . $extension;

            if (!move_uploaded_file($from, $to)) {
                throw new Exception('problème lors du transfert');
            }

            $dst_x = 0;
            $dst_y = 0;
            $src_x = 0;
            $src_y = 0;
            $dst_width = 500;
            $src_width = getimagesize($to)[0];
            $src_height = getimagesize($to)[1];
            $dst_height = round(($dst_width * $src_height) / $src_width);
            $dst_image = imagecreatetruecolor($dst_width, $dst_height);
            $src_image = imagecreatefromjpeg($to);

            // Redimensionne
            imagecopyresampled(
                $dst_image,
                $src_image,
                $dst_x,
                $dst_y,
                $src_x,
                $src_y,
                $dst_width,
                $dst_height,
                $src_width,
                $src_height
            );

            // redimensionne l'image
            $resampledDestination = UPLOAD_USER_PROFILE . $filename . '.' . 'jpg';
            imagejpeg($dst_image, $resampledDestination, 75);


            // Recadre
            $cropped_width = 200;
            $ressourceResampled = imagecreatefromjpeg($resampledDestination);
            if (!$ressourceResampled) {
                throw new Exception('Problème lors du recadrage');
            }
            $ressourceCropped = imagecrop($ressourceResampled, ['x' => ($dst_width - $cropped_width) / 2, 'y' => 0, 'width' => $cropped_width, 'height' => 200]);

            // Sauvegarde l'image recadrée
            $croppedDestination = UPLOAD_USER_PROFILE . $filename . '.' . 'jpg';
            imagejpeg($ressourceCropped, $croppedDestination, 75);
        }

        if (empty($errors)) {
            $isUpdatedUser = User::modify($id_user, $username, $email, $houses);
            $user = User::getOne($id_user);
        }
    }

    $filename = __DIR__ . '/../public/uploads/users/' . $id_user . '.jpg';
    if (file_exists($filename)) {
        $filename = '/public/uploads/users/' . $id . '.jpg';
    } else {
        $filename = '/public/assets/img/useravatar/' . $users->user_house . '.jpg';
    }
    $allBookings = Meeting::getMeetingsByUser($id_user);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}









include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/user/modify-profile-user.php');
include(__DIR__ . '/../views/templates/footer.php');
