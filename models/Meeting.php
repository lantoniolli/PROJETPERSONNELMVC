<?php
require_once(__DIR__ . '/../helpers/database.php');

class Meeting {
    private int $_id;
    private string $_event_date;
    private string $_event_location;
    private string $_event_name;
    private string $_event_description;

// Getters
    public function getId(): int {
        return $this->_id;
    }
    public function getEvent_date(): string {
        return $this->_event_date;
    }
    public function getEvent_location(): string {
        return $this->_event_location;
    }
    public function getEvent_name(): string {
        return $this->_event_name;
    }
    public function getEvent_description(): string {
        return $this->_event_description;
    }
// Setters
    // id
        public function setId(int $id): void {
            $this->_id = $id;
        }
    // event_date
        public function setEvent_date(string $event_date): void {
            $this->_event_date = $event_date;
        }
    // event_location
        public function setEvent_location(string $event_location): void {
            $this->_event_location = $event_location;
        }
    // event_name
        public function setEvent_name(string $event_name): void {
            $this->_event_name = $event_name;
        }
    // event_description
        public function setEvent_description(string $event_description): void {
            $this->_event_description = $event_description;
        }
// Methods
// Ajouter un meeting
    public function add() {
        $sql = 'INSERT INTO `meetings` (`event_date`, `event_location`, `event_name`, `event_description`) VALUES (:event_date, :event_location, :event_name, :event_description)';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':event_date', $this->getEvent_date(), PDO::PARAM_STR);
        $sth->bindValue(':event_location', $this->getEvent_location(), PDO::PARAM_STR);
        $sth->bindValue(':event_name', $this->getEvent_name(), PDO::PARAM_STR);
        $sth->bindValue(':event_description', $this->getEvent_description(), PDO::PARAM_STR);
        if ($sth->execute()) {
            return ($sth->rowCount() >= 1) ? true : false;
        }
    }
// Récupérer tous les meetings
    public static function getAllMeetings(): array {
        $sth = Database::getInstance();
        $query = $sth->prepare('SELECT * FROM `meetings`');
        $query->execute();
        $meetings = $query->fetchAll();
        return $meetings;
    }

// Récupérer un certain nombre de meetings
    public static function getLastMeetings(): array{
        $sth = Database::getInstance();
        $query = $sth->prepare('SELECT * FROM `meetings` ORDER BY `event_date` DESC LIMIT 3');
        $query->execute();
        $meetings = $query->fetchAll();
        return $meetings;
    }

// Récupérer un meeting
    public static function getMeeting(int $id){
        $sth = Database::getInstance();
        $query = $sth->prepare('SELECT * FROM `meetings` WHERE `id_meetings` = :id');
        $query->execute([
            'id' => $id
        ]);
        $meeting = $query->fetch();
        return $meeting;
    }
// Récupérer le nombre de meetings
    public static function getNbMeetings(): int {
        $sth = Database::getInstance();
        $query = $sth->query('SELECT COUNT(*) FROM `meetings`');
        $nbMeetings = $query->fetch();
        return $nbMeetings;
    }
// Modifier un meeting
    public function updateMeetings($id) {
        $sql = 'UPDATE `meetings` SET `event_date` = :event_date, `event_location` = :event_location, `event_name` = :event_name, `event_description` = :event_description WHERE `id_meetings` = :id';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':event_date', $this->getEvent_date(), PDO::PARAM_STR);
        $sth->bindValue(':event_location', $this->getEvent_location(), PDO::PARAM_STR);
        $sth->bindValue(':event_name', $this->getEvent_name(), PDO::PARAM_STR);
        $sth->bindValue(':event_description', $this->getEvent_description(), PDO::PARAM_STR);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return ($sth->rowCount() >= 1) ? true : false;
        }
    }
// Supprimer un meeting
    public static function delete($id) {
    $sql = 'DELETE FROM `meetings` WHERE `id_meetings` = :id';
    $sth = Database::getInstance()->prepare($sql);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    if ($sth->execute()) {
        return true;
        if ($sth->rowCount() >= 1) {
        } else {
            return false;
        }
    }
}
// Fonction permettant de récupérer les conventions reservées par l'utilisateur
    public static function getMeetingsByUser($id) {
        $sth = Database::getInstance();
        $query = $sth->prepare('SELECT * FROM `meetings` INNER JOIN `bookings`');
        $query->execute([
            'id' => $id
        ]);
        $meetings = $query->fetchAll();
        return $meetings;
    }
}
