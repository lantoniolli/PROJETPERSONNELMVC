<?php
require_once(__DIR__ . '/../helpers/database.php');

class User {
    private int $_id;
    private string $_pseudo;
    private string $_usermail;
    private ?string $_userpassword;
    private datetime $_created_at;
    private datetime $_validated_at;
    private int $_useravatar;
    private string $_userrole;
    private string $_id_house;

// Getters
    public function getId(): int {
        return $this->_id;
    }
    public function getPseudo(): string {
        return $this->_pseudo;
    }
    public function getUsermail(): string {
        return $this->_usermail;
    }
    public function getUserpassword(): string {
        return $this->_userpassword;
    }
    public function getCreated_at(): datetime {
        return $this->_created_at;
    }
    public function getValidated_at(): datetime {
        return $this->_validated_at;
    }
    public function getUseravatar(): int {
        return $this->_useravatar;
    }
    public function getUserrole(): string {
        return $this->_userrole;
    }
    public function getId_house(): string {
        return $this->_id_house;
    }
// Setters
    // id
        public function setId(int $id): void {
            $this->_id = $id;
        }
    // pseudo
        public function setPseudo(string $pseudo): void {
            $this->_pseudo = $pseudo;
        }

        public function setUsermail(string $usermail): void {
            $this->_usermail = $usermail;
        }
    // userpassword
        public function setUserpassword(string $userpassword): void {
            $this->_userpassword = $userpassword;
        }
    // created_at
        public function setCreated_at(datetime $created_at): void {
            $this->_created_at = $created_at;
        }
    // validated_at
        public function setValidated_at(datetime $validated_at): void {
            $this->_validated_at = $validated_at;
        }
    // useravatar
        public function setUseravatar(int $useravatar): void {
            $this->_useavatar = $useravatar;
        }
    // userrole
        public function setUserrole(string $userrole): void {
            $this->_userrole = $userrole;
        }
    // id_house
        public function setId_house(string $id_house): void {
            $this->_id_house = $id_house;
        }

// Fonction permettant d'ajouter un utilisateur à la base de donnée.
    public function add()
    {
        $adduser = 'INSERT INTO users (`user_name`, `user_mail`, `user_password`) VALUES (:pseudo, :usermail, :userpassword)';
            
        $sth = Database::getInstance()->prepare($adduser);

        $sth->bindValue(':pseudo', $this->getpseudo(), PDO::PARAM_STR);
        $sth->bindValue(':usermail', $this->getUsermail(), PDO::PARAM_STR);
        $sth->bindValue(':userpassword', $this->getUserpassword(), PDO::PARAM_STR);

        return $sth->execute();
    }
// Fonction permettant de vérifier que l'adresse mail est déjà existante dans la base de donnée.
public static function exist_Email(string $usermail): bool
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT *FROM `users` WHERE `user_mail`= :mail;");
        $stmt->bindValue(':mail', $usermail);
        $success = $stmt->execute();
        if ($success) {
            if (empty($stmt->fetch())) {
                return false;
            } else {
                return true;
            }
        };
    }
// Fonction permettant de vérifier que le pseudo est déjà existant dans la base de donnée.
public static function exist_Pseudo(string $pseudo): bool
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT *FROM `users` WHERE `user_name`= :pseudo;");
        $stmt->bindValue(':pseudo', $pseudo);
        $success = $stmt->execute();
        if ($success) {
            if (empty($stmt->fetch())) {
                return false;
            } else {
                return true;
            }
        };
    }

    public static function getByEmail(string $email):object|bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users` WHERE `user_mail`= :email;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email',$email);
        if($sth->execute()){
            $result = $sth->fetch();
            if($result){
                return $result;
            }
        }
        return false;
    }
// Fonction permettant de récupérer tous les utilisateurs de la base de donnée.
    public static function getAll(): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users`';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

// Fonction permettant de récupérer un seul utilisateur
    public static function getOne(int $id): object|bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users` WHERE `id_users`= :id;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id);
        if ($sth->execute()) {
            $result = $sth->fetch();
            if ($result) {
                return $result;
            }
        }
        return false;
    }

}