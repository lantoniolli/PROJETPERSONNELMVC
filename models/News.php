<?php
require_once(__DIR__ . '/../helpers/database.php');

class News{
    private int $_id;
    private string $_title;
    private string $_content;
    private datetime $_created_at;
    private int $_author_id;
    private int $_news_img;

// Getters
    public function getId(): int {
        return $this->_id;
    }
    public function getTitle(): string {
        return $this->_title;
    }
    public function getContent(): string {
        return $this->_content;
    }
    public function getCreated_at(): datetime {
        return $this->_created_at;
    }
    public function getAuthor_id(): int {
        return $this->_author_id;
    }
    public function getNews_img(): int {
        return $this->_news_img;
    }
// Setters
    // id
        public function setId(int $id): void {
            $this->_id = $id;
        }
    // title
        public function setTitle(string $title): void {
            $this->_title = $title;
        }
    // content
        public function setContent(string $content): void {
            $this->_content = $content;
        }
    // created_at
        public function setCreated_at(datetime $created_at): void {
            $this->_created_at = $created_at;
        }
    // author_id
        public function setAuthor_id(int $author_id): void {
            $this->_author_id = $author_id;
        }
    // news_img
        public function setNews_img(int $news_img): void {
            $this->_news_img = $news_img;
        }
// Methods
//Récupérer toutes les news
    public static function getAllNews(): array {
        $sth = Database::getInstance();
        $query = $sth->query('SELECT * FROM `news` LIMIT 2');
        $news = $query->fetchAll();
        return $news;
    }
//Récupérer une news
    public static function getNews(int $id): News {
        $sth = Database::getInstance();
        $query = $sth->prepare('SELECT * FROM `news` WHERE `id` = :id');
        $query->execute(['id' => $id]);
        $news = $query->fetch();
        return $news;
    }
//Récupérer la news la dernière news publiée
    public static function getLastNews(): object {
        $sth = Database::getInstance();
        $query = $sth->query('SELECT * FROM `news` INNER JOIN `users` ON `news`.`news_author` = `users`.`id_users` ORDER BY `news_posted_at` DESC LIMIT 1');
        $news = $query->fetch();
        return $news;
    }
//Ajout un article
    public function add()  {
        $sql = 'INSERT INTO `news` (`news_title`, `news_content`, `news_author`) VALUES (:title, :content, :author_id)';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':title', $this->getTitle());
        $sth->bindValue(':content', $this->getContent());
        $sth->bindValue(':author_id', $this->getAuthor_id());
        if ($sth->execute()) {
            return ($sth->rowCount() >= 1) ? true : false;
        }
    }
}