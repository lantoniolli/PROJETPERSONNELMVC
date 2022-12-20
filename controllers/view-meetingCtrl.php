
<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/Meeting.php');
require_once(__DIR__ . '/../models/Bookings.php');
require_once(__DIR__ . '/../models/Comment.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
    $id_user = $user->id_users;
}
//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//
try {
    $id_meeting = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    // Récupérer la convention
    $meeting = Meeting::getMeeting($id_meeting);
    $reservations = Booking::getBookingsByMeetings($id_meeting);
    

    // Récupérer les données du formulaire de réservation.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $form = filter_input(INPUT_POST, 'form', FILTER_SANITIZE_NUMBER_INT);
        if ($form == 1) {
            $places = filter_input(INPUT_POST, 'places', FILTER_SANITIZE_NUMBER_INT);
            if (empty($places)) {
                $$errors['Places'] = 'Veuillez indiquer le nombre de places';
            }
            if (empty($errors)) {
                $booking = new Booking();
                $booking->setId_meetings($id_meeting);
                $booking->setId_users($id);
                $booking->setBooking_places($places);
                $isBookingAdded = $booking->add();
                if ($isBookingAdded) {
                    SessionFlash::set('Votre réservation a bien été prise en compte');
                    header('Location: /controllers/view-meetingCtrl.php?id=' . $id_meeting);
                    exit();
                } else {
                    SessionFlash::set('Une erreur est survenue lors de la réservation');
                    header('Location: /controllers/view-meetingCtrl.php?id=' . $id_meeting);
                    exit();
                }
            }
        } else if ($form == 2) {
    // traitement des commentaires
            $content = trim((string)filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
            $comment = new Comment();
            $comment->setComment_description($content);
            $comment->setId_users($id);
            $comment->setId_meeting($id_meeting);
            $comment->addCommentMeeting();
        }
    }
    $posts = Comment::getCommentsByMeeting($id_meeting);
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/view-meeting.php');
include(__DIR__ . '/../views/templates/footer.php');
