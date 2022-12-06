<?php
require_once(__DIR__ . '/../helpers/database.php');

class Booking
{
    private int $_id;
    private int $_booking_places;
    private int $_id_meetings;
    private int $_id_users;


    // Getters
    public function getId(): int
    {
        return $this->_id;
    }
    public function getBooking_places(): int
    {
        return $this->_booking_places;
    }
    public function getId_meetings(): int
    {
        return $this->_id_meetings;
    }
    public function getId_users(): int
    {
        return $this->_id_users;
    }
    // Setters
    // id
    public function setId(int $id)
    {
        $this->_id = $id;
    }
    // booking_places
    public function setBooking_places(int $booking_places)
    {
        $this->_booking_places = $booking_places;
    }
    // id_meetings
    public function setId_meetings(int $id_meetings)
    {
        $this->_id_meetings = $id_meetings;
    }
    // id_users
    public function setId_users(int $id_users)
    {
        $this->_id_users = $id_users;
    }
    // Méthodes

    // Fonction permettant de réserver un nombre de places pour une réunion
    public function add()
    {
        $pdo = Database::getInstance();
        $sql = "INSERT INTO bookings (booking_places, id_meetings, id_users) VALUES (:booking_places, :id_meetings, :id_users)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':booking_places', $this->_booking_places, PDO::PARAM_INT);
        $stmt->bindValue(':id_meetings', $this->_id_meetings, PDO::PARAM_INT);
        $stmt->bindValue(':id_users', $this->_id_users, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return ($stmt->rowCount() >= 1) ? true : false;
        }
    }

    // Fonction permettant de récupérer le nombre de réservation par meetings
    public static function getBookingsByMeetings($id)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT 
        SUM(`bookings`.`booking_places`) AS `places`
        FROM `bookings`
        WHERE `bookings`.`id_meetings` = :id;';
        $stmt = $pdo->prepare($sql);
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetch();
        }
    }

    // Fonction permettant à un utilisateur de supprimer une réservation
    public static function delete($id, $id_meeting)
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `bookings`
        WHERE `id_meetings` = :id_meetings AND `id_users` = :id ;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':id_meetings', $id_meeting, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return ($stmt->rowCount() >= 1) ? true : false;
        }
    }

}
