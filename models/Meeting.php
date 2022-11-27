<?php
require_once(__DIR__ . '/../helpers/database.php');

class Meeting {
    private int $_id;
    private datetime $_date;
    private string $_description;
    private string $_title;
    private string $_location;
    private string $_image;
    private int $_nb_participants;
    private int $_nb_comments;
    private int $_nb_likes;

// Getters
    public function getId(): int {
        return $this->_id;
    }
    public function getDate(): datetime {
        return $this->_date;
    }
    public function getDescription(): string {
        return $this->_description;
    }
    public function getTitle(): string {
        return $this->_title;
    }
    public function getLocation(): string {
        return $this->_location;
    }
    public function getImage(): string {
        return $this->_image;
    }
    public function getNb_participants(): int {
        return $this->_nb_participants;
    }
    public function getNb_comments(): int {
        return $this->_nb_comments;
    }
    public function getNb_likes(): int {
        return $this->_nb_likes;
    }

// Setters
    // id
        public function setId(int $id): void {
            $this->_id = $id;
        }
    // date
        public function setDate(datetime $date): void {
            $this->_date = $date;
        }
    // description
        public function setDescription(string $description): void {
            $this->_description = $description;
        }
    // title
        public function setTitle(string $title): void {
            $this->_title = $title;
        }
    // location
        public function setLocation(string $location): void {
            $this->_location = $location;
        }
    // image
        public function setImage(string $image): void {
            $this->_image = $image;
        }
    // nb_participants
        public function setNb_participants(int $nb_participants): void {
            $this->_nb_participants = $nb_participants;
        }
    // nb_comments
        public function setNb_comments(int $nb_comments): void {
            $this->_nb_comments = $nb_comments;
        }
    // nb_likes
        public function setNb_likes(int $nb_likes): void {
            $this->_nb_likes = $nb_likes;
        }

// Methods
//Récupérer tous les meetings
    public static function getAllMeetings(): array {
        $sth = Database::getInstance();
        $query = $sth->query('SELECT * FROM `meetings`');
        $meetings = $query->fetchAll();
        return $meetings;
    }

//Récupérer le nombre de meetings
    public static function getNbMeetings(): int {
        $sth = Database::getInstance();
        $query = $sth->query('SELECT COUNT(*) FROM `meetings`');
        $nbMeetings = $query->fetch();
        return $nbMeetings;
    }

// Récupérer un meeting
    public static function getMeeting(int $id): Meeting {
        $sth = Database::getInstance();
        $query = $sth->prepare('SELECT * FROM `meetings` WHERE `id` = :id');
        $query->execute(['id' => $id]);
        $meeting = $query->fetch();
        return $meeting;
    }

}