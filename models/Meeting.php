<?php
require_once(__DIR__ . '/../helpers/database.php');

class Meeting {
    private int $_id;
    private datetime $_event_date;
    private string $_event_location;
    private string $_event_name;
    private string $_event_description;

// Getters
    public function getId(): int {
        return $this->_id;
    }
    public function getEvent_date(): datetime {
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
        public function setEvent_date(datetime $event_date): void {
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
    public function add(): void {
        $sth = Database::getInstance();
        $query = $sth->prepare('INSERT INTO meeting (event_date, event_location, event_name, event_description) VALUES (:event_date, :event_location, :event_name, :event_description)');
        $query->execute([
            'event_date' => $this->getEvent_date(),
            'event_location' => $this->getEvent_location(),
            'event_name' => $this->getEvent_name(),
            'event_description' => $this->getEvent_description()
        ]);
    }
// Récupérer tous les meetings
    public static function getAllMeetings(): array {
        $sth = Database::getInstance();
        $query = $sth->prepare('SELECT * FROM meeting');
        $query->execute();
        $meetings = $query->fetchAll(PDO::FETCH_ASSOC);
        return $meetings;
    }
// Récupérer un meeting
    public static function getMeeting(int $id): array {
        $sth = Database::getInstance();
        $query = $sth->prepare('SELECT * FROM `meetings` WHERE `id` = :id');
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
    public function update(): void {
        $sth = Database::getInstance();
        $query = $sth->prepare('UPDATE `meetings` SET `event_date` = :event_date, `event_location` = :event_location, `event_name` = :event_name, `event_description` = :event_description WHERE `id` = :id');
        $query->execute([
            'id' => $this->getId(),
            'event_date' => $this->getEvent_date(),
            'event_location' => $this->getEvent_location(),
            'event_name' => $this->getEvent_name(),
            'event_description' => $this->getEvent_description()
        ]);
    }
// Supprimer un meeting
    public function delete(): void {
        $sth = Database::getInstance();
        $query = $sth->prepare('DELETE FROM `meetings` WHERE `id` = :id');
        $query->execute([
            'id' => $this->getId()
        ]);
    }
}
