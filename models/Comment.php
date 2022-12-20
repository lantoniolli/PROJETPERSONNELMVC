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
// Ajouter un commentaire sur une news
        public function addCommentNews():bool {
            $sql = 'INSERT INTO `comments` (`comment_description`, `id_users`, `id_news`) VALUES (:comment_description, :id_users, :id_news)';
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':comment_description', $this->_comment_description, PDO::PARAM_STR);
            $stmt->bindValue(':id_users', $this->_id_users, PDO::PARAM_INT);
            $stmt->bindValue(':id_news', $this->_id_news, PDO::PARAM_INT);
            return $stmt->execute();
        }
// Ajouter un commentaire sur un meeting
        public function addCommentMeeting():bool {
            $sql = 'INSERT INTO `comments` (`comment_description`, `id_users`, `id_meetings`) VALUES (:comment_description, :id_users, :id_meeting)';
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':comment_description', $this->_comment_description, PDO::PARAM_STR);
            $stmt->bindValue(':id_users', $this->_id_users, PDO::PARAM_INT);
            $stmt->bindValue(':id_meeting', $this->_id_meeting, PDO::PARAM_INT);
            return $stmt->execute();
        }

// Afficher les commentaires d'un article
        public static function getCommentsbyNews(int $id_news): array {
            $pdo = Database::getInstance();
            $query = "SELECT * FROM `comments` INNER JOIN `users` ON `comments`.`id_users` = `users`.`id_users` WHERE `id_news` = :id_news";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id_news', $id_news, PDO::PARAM_INT);
            $stmt->execute();
            $comments = $stmt->fetchAll();
            return $comments;
        }
// Afficher les commentaires d'un meeting
        public static function getCommentsbyMeeting(int $id_meeting): array {
            $pdo = Database::getInstance();
            $query = "SELECT * FROM `comments` INNER JOIN `users` ON `comments`.`id_users` = `users`.`id_users` WHERE `id_meetings` = :id_meetings";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id_meetings', $id_meeting, PDO::PARAM_INT);
            $stmt->execute();
            $comments = $stmt->fetchAll();
            return $comments;
        }

//Récupérer tous les commentaires
        public static function getAllComments(): array {
            $sth = Database::getInstance();
            $query = $sth->query('SELECT * FROM `comments` INNER JOIN `users` ON `comments`.`id_users` = `users`.`id_users` ORDER BY `posted_at` DESC');
            $comments = $query->fetchAll();
            return $comments;
        }
//Récupérer un commentaire par son id
        public static function getCommentById(int $id){
            $sth = Database::getInstance();
            $query = "SELECT * FROM `comments` INNER JOIN `users` ON `comments`.`id_users` = `users`.`id_users` WHERE `id_comments` = :id";
            $stmt = $sth->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $comment = $stmt->fetch();
            return $comment;
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

// Supprimer un commentaire
        public static function deleteComment(int $id): bool {
            $pdo = Database::getInstance();
            $query = "DELETE FROM `comments` WHERE `id_comments` = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

// Modifier un commentaire
        public function updateComment(): bool {
            $pdo = Database::getInstance();
            $query = "UPDATE `comments` SET `comment_description` = :comment_description WHERE `id_comments` = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':comment_description', $this->_comment_description, PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->_id, PDO::PARAM_INT);
            return $stmt->execute();
        }
// Modifier un commentaire d'un meeting

    }

