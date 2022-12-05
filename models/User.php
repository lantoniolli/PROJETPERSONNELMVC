<?php
require_once(__DIR__ . '/../helpers/database.php');

class User
{
    private int $_id;
    private string $_pseudo;
    private string $_usermail;
    private ?string $_userpassword;
    private datetime $_created_at;
    private datetime $_validated_at;
    private int $_user_avatar;
    private string $_user_role;
    private int $_user_house;

    private PDO $pdo;

    public function __construct(){
        $this->pdo = Database::getInstance();
    }

    // Getters
    public function getId(): int
    {
        return $this->_id;
    }
    public function getPseudo(): string
    {
        return $this->_pseudo;
    }
    public function getUsermail(): string
    {
        return $this->_usermail;
    }
    public function getUserpassword(): string
    {
        return $this->_userpassword;
    }
    public function getCreated_at(): datetime
    {
        return $this->_created_at;
    }
    public function getValidated_at(): datetime
    {
        return $this->_validated_at;
    }
    public function getUseravatar(): int
    {
        return $this->_user_avatar;
    }
    public function getUserrole(): string
    {
        return $this->_user_role;
    }
    public function getId_house(): int
    {
        return $this->_user_house;
    }
    // Setters
    // id
    public function setId(int $id): void
    {
        $this->_id = $id;
    }
    // pseudo
    public function setPseudo(string $pseudo): void
    {
        $this->_pseudo = $pseudo;
    }

    public function setUsermail(string $usermail): void
    {
        $this->_usermail = $usermail;
    }
    // userpassword
    public function setUserpassword(string $userpassword): void
    {
        $this->_userpassword = $userpassword;
    }
    // created_at
    public function setCreated_at(datetime $created_at): void
    {
        $this->_created_at = $created_at;
    }
    // validated_at
    public function setValidated_at(datetime $validated_at): void
    {
        $this->_validated_at = $validated_at;
    }
    // useravatar
    public function setUseravatar(int $useravatar): void
    {
        $this->_user_avatar = $useravatar;
    }
    // userrole
    public function setUserrole(string $userrole): void
    {
        $this->_user_role = $userrole;
    }
    // id_house
    public function setId_house(int $id_house): void
    {
        $this->_user_house = $id_house;
    }

    // Fonction permettant d'ajouter un utilisateur à la base de donnée.
    public function add(int $id = null): User|bool
    {
        if (is_null($id)) {
            $adduser = 'INSERT INTO users (`user_name`, `user_mail`, `user_password`, `user_house`, `user_avatar`, `user_role`) VALUES (:pseudo, :usermail, :userpassword, :user_house, :user_avatar, :user_role)';
        } else {
            $sql = 'UPDATE';
        }
        $sth = Database::getInstance()->prepare($adduser);

        $sth->bindValue(':pseudo', $this->getpseudo(), PDO::PARAM_STR);
        $sth->bindValue(':usermail', $this->getUsermail(), PDO::PARAM_STR);
        $sth->bindValue(':userpassword', $this->getUserpassword(), PDO::PARAM_STR);
        $sth->bindValue(':user_house', $this->getId_house(), PDO::PARAM_INT);
        $sth->bindValue(':user_avatar', $this->getUseravatar(), PDO::PARAM_INT);
        $sth->bindValue(':user_role', $this->getUserrole(), PDO::PARAM_STR);

        if ($sth->execute()) {
            if (is_null($id)) {
                $this->setId($this->pdo->lastInsertId());
            }
            if ($sth->rowCount() == 1 || !is_null($id)) {
                return $this;
            }
    }
    }

    // Fonction permettant de supprimer un utilisateur de la base de donnée.
    public static function delete($id)
    {

        $pdo = Database::getInstance();
        $deleteUser = 'DELETE FROM users WHERE id_users = :id';
        $sth = $pdo->prepare($deleteUser);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        return $sth->execute();
    }
    // Fonction permettant de modifier un utilisateur
    public static function modify($id, $username, $email, $houses)
    {
        $pdo = Database::getInstance();
        $modifyUser = 'UPDATE users SET `user_name` = :pseudo, `user_mail` = :usermail, `user_house` = :user_house WHERE id_users = :id';
        $sth = $pdo->prepare($modifyUser);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':pseudo', $username, PDO::PARAM_STR);
        $sth->bindValue(':usermail', $email, PDO::PARAM_STR);
        $sth->bindValue(':user_house', $houses, PDO::PARAM_INT);
        // $sth->bindValue(':user_avatar', $user_avatar, PDO::PARAM_INT);
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

    public static function getByEmail(string $email): object|bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users` WHERE `user_mail`= :email and `validated_at` IS NOT NULL';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email', $email);
        if ($sth->execute()) {
            $result = $sth->fetch();
            if ($result) {
                return $result;
            }
        }
        return false;
    }
    // Fonction permettant de récupérer tous les utilisateurs de la base de donnée.
    public static function getAll($limit, $offset, $search = ''): array
    {
        if (empty($search)) {
            $sql = 'SELECT * FROM `users` LIMIT :limit OFFSET :offset;';
            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->execute();
            // On récupère les valeurs dans un tableau associatif.
            $users = $sth->fetchAll(PDO::FETCH_OBJ);
            return $users;
        } else {
            $sql = 'SELECT * FROM `users` 
            WHERE `user_name` LIKE :search 
            OR `user_mail` LIKE :search 
            OR `created_at` = :search
            OR `user_role` = :search';
            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':search', '%' . $search . '%');
            if ($sth->execute()) {
                $users = $sth->fetchAll(PDO::FETCH_OBJ);
                return $users;
            }
        }
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
    // Méthode pour calculer le nombre total d'utilisateurs.
    public static function count()
    {
        $sql = 'SELECT COUNT(`id_users`) AS `nbUsers` FROM `users`;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->execute();
        $count = $sth->fetch();
        return $count->nbUsers;
    }

    public static function validateAccount(int $id): bool
    {

        $pdo = Database::getInstance();
        $sql = "UPDATE users SET `validated_at` = NOW() WHERE `id_users` = :id;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            if ($sth->rowCount() == 1) {
                return true;
            }
        }
        return false;
    }

    // }
}
