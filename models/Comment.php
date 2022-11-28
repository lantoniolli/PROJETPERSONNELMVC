<?php
require_once(__DIR__ . '/../helpers/database.php');

class Comment {
        private int $_id;
        private datetime $_validated_at;
        private datetime $_posted_at;
        private string $_comment_description;
        private int $_id_meeting;
        private int $_id_users;
        private int $_id_news;

// Getters
        public function getId(): int {
            return $this->_id;
        }
        public function getValidated_at(): datetime {
            return $this->_validated_at;
        }
        public function getPosted_at(): datetime {
            return $this->_posted_at;
        }
        public function getComment_description(): string {
            return $this->_comment_description;
        }
        public function getId_meeting(): int {
            return $this->_id_meeting;
        }
        public function getId_users(): int {
            return $this->_id_users;
        }
        public function getId_news(): int {
            return $this->_id_news;
        }
// Setters
        // id
            public function setId(int $id): void {
                $this->_id = $id;
            }
        // validated_at
            public function setValidated_at(datetime $validated_at): void {
                $this->_validated_at = $validated_at;
            }
        // posted_at
            public function setPosted_at(datetime $posted_at): void {
                $this->_posted_at = $posted_at;
            }
        // comment_description
            public function setComment_description(string $comment_description): void {
                $this->_comment_description = $comment_description;
            }
        // id_meeting
            public function setId_meeting(int $id_meeting): void {
                $this->_id_meeting = $id_meeting;
            }
        // id_users
            public function setId_users(int $id_users): void {
                $this->_id_users = $id_users;
            }
        // id_news
            public function setId_news(int $id_news): void {
                $this->_id_news = $id_news;
            }
// Methods
// Ajouter un commentaire
        public function addCommentNews():bool {
            $sql = 'INSERT INTO `comments` (`comment_description`, `Id_users`, `id_news`) VALUES (:comment_description, :id_users, :id_news)';
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':comment_description', $this->_comment_description, PDO::PARAM_STR);
            $stmt->bindValue(':id_users', $this->_id_users, PDO::PARAM_INT);
            $stmt->bindValue(':id_news', $this->_id_news, PDO::PARAM_INT);
            return $stmt->execute();
        }
        

// Afficher les commentaires d'un article
        public static function getCommentsbyNews(int $id_news): array {
            $pdo = Database::getInstance();
            $query = "SELECT * FROM comments WHERE id_news = :id_news";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id_news', $id_news, PDO::PARAM_INT);
            $stmt->execute();
            $comments = $stmt->fetchAll();
            return $comments;
        }

//Récupérer tous les commentaires
        public static function getAllComments(): array {
            $sth = Database::getInstance();
            $query = $sth->query('SELECT * FROM `comments`');
            $comments = $query->fetchAll();
            return $comments;
        }

//Récupérer le nombre de commentaires
        public static function getNbComments(): int {
            $sth = Database::getInstance();
            $query = $sth->query('SELECT COUNT(*) FROM `comments`');
            $nbComments = $query->fetch();
            return $nbComments;
        }
// Récupérer le nombre de commentaire par utilisateur
        public static function getNbCommentsByUser(int $id): int {
            $sth = Database::getInstance();
            $query = $sth->prepare('SELECT COUNT(*) FROM `comments` WHERE `id_users` = :id');
            $query->execute(['id' => $id]);
            $nbComments = $query->fetch();
            return $nbComments;
        }
// Récupérer tous les commentaires d'un utilisateur
        public static function getAllCommentsByUser(int $id): array {
            $sth = Database::getInstance();
            $query = $sth->prepare('SELECT * FROM `comments` WHERE `id_users` = :id');
            $query->execute(['id' => $id]);
            $comments = $query->fetchAll();
            return $comments;
        }

    }