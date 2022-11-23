<?php
require_once(__DIR__ . '/../helpers/database.php');

class Comment {
        private int $_id;
        private datetime $_validated_at;
        private datetime $_posted_at;
        private string $_comment_description;

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
// Methods
//Récupérer tous les commentaires
        public static function getAllComments(): array {
            $sth = Database::getInstance();
            $query = $sth->query('SELECT * FROM `comments`');
            $comments = $query->fetchAll();
            return $comments;
        }
}