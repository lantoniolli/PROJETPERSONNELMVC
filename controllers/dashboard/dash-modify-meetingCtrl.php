<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/Meeting.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');
require_once(__DIR__ . '/./sidebar-Ctrl.php');

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $meeting = Meeting::getMeeting($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

         //-------------------------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------------------------------//

        //nettoyage des données
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        // validation des données title
        if (empty($title)) {
            $errors['title'] = 'Le titre est obligatoire';
        }
        //validation des données content
        $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($content)) {
            $errors['content'] = 'Le contenu est obligatoire';
        }
        // validation de la date
        $date = trim((string)filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($date)) {
            $errors['date'] = 'La date est obligatoire';
        }
        //validation de la localisation
        $location = trim(filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($location)) {
            $errors['location'] = 'La localisation est obligatoire';
        }
        //-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

        // validation des données news_img
        if (empty($_FILES["news_img"]["name"])) {
            $errors['news_img'] = 'L\'image est obligatoire';
        }
        $fileType = strtolower(pathinfo($_FILES["news_img"]["name"], PATHINFO_EXTENSION));
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
            $errors['news_img'] = 'Seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.';
        }
        $fileSize = $_FILES["news_img"]["size"];
        if ($fileSize > 5000000) {
            $errors['news_img'] = 'Désolé, votre fichier est trop volumineux.';
        }
        if (empty($errors)) {

            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/meetings/";
            $pdo = Database::getInstance();
            $target_file = $meeting->id_meetings . '.' . pathinfo($_FILES["news_img"]["name"], PATHINFO_EXTENSION);
            $target_path = $target_dir . $target_file;

            $meeting = new Meeting();
            $meeting->setEvent_name($title);
            $meeting->setEvent_date($date);
            $meeting->setEvent_location($location);
            $meeting->setEvent_description($content);
            
            if ($meeting->updateMeetings($id)) {
                move_uploaded_file($_FILES["news_img"]["tmp_name"], $target_path);
                SessionFlash::set('La convention a bien été modifiée');
                header('Location: /controllers/dashboard/dash-all-meetingsCtrl.php');
                exit();
            } else {
                SessionFlash::set('Une erreur est survenue lors de l\'upload de l\'image');
                header('Location: /controllers/dashboard/dash-add-meetingCtrl.php');
                exit();
            }
        } else {
            SessionFlash::set('Une erreur est survenue lors de la modification de la convention');
            header('Location: /controllers/dashboard/dash-add-meetingCtrl.php');
            exit();
        }
    }
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}


//-------------------------------- APPEL DES VUES ----------------------------------------//
include(__DIR__ . '/../../views/admin/dash-templates/dash-header.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-navbar.php');
include(__DIR__ . '/../../views/admin/dash-modify-meeting.php');
include(__DIR__ . '/../../views/admin/dash-templates/dash-footer.php');
