<?php
//-------------------------------- APPEL DES PAGES NÉCESSAIRES ----------------------------------------//

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/sessionflash.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/JWT.php');

//--------------------------------- VÉRIFICATION DE LA SESSION ----------------------------------------//

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->id_users;
}

//-------------- NETTOYAGE ET VALIDATION DES DONNÉES----------------//

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // TRAITEMENT DU PSEUDO
        $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
        if (User::exist_Pseudo($pseudo)) {
            $errors['Pseudo'] = 'Ce pseudo est déjà utilisé.';
        } else {
            // Valider
            if (empty($pseudo)) {
                $errors['Pseudo'] = 'Ce champ est obligatoire';
            } else {
                $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
                if ($isOk == false) {
                    $errors['Pseudo'] = 'La donnée n\'est pas conforme';
                }
            }
        }

        // TRAITEMENT DE L'EMAIL
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        if (User::exist_Email($email) == true) {
            $errors['Email'] = 'Cette adresse mail est déjà utilisée';
        } else {

            //validation
            if (empty($email)) {
                $error['Email'] = 'Ce champ est obligatoire.';
            } else {
                $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
                if (!$isOk) {
                    $error['Email'] = 'Adresse mail invalide';
                }
            }
        }

        // TRAITEMENT PASSWORD
        $password = filter_input(INPUT_POST, 'password');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
        if (empty($password)) {
            $errors['Password'] = 'Ce champ est obligatoire.';
        } else {
            if ($confirmPassword != $password) {
                $errors['ConfirmPassword'] = 'Le mot de passe n\'est pas identique.';
            } else {
                $isOkPassword = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_FOR_PASSWORD . '/')));
                if ($isOkPassword == false) {
                    $errors['Password'] = 'Ce champ n\'est pas conforme.';
                } else {
                    $passwordh = password_hash($password, PASSWORD_DEFAULT);
                }
            }
        }
        // TRAITEMENT DU CHECKBOX
        $conditions = filter_input(INPUT_POST, 'conditions');
        if (empty($conditions)) {
            $errors['Conditions'] = 'Vous devez accepter les conditions d\'utilisation.';
        }
        $cgu = filter_input(INPUT_POST, 'cgu');
        if (empty($cgu)) {
            $errors['Cgu'] = 'Vous devez accepter les conditions d\'utilisation.';
        }

//-------------------------------- APPLICATION DES DIFFÉRENTES MÉTHODES ----------------------------------------//

        if (empty($errors)) {

            $result = rand(1,9);
            $user = new User();
            $user->setPseudo($pseudo);
            $user->setUserMail($email);
            $user->setUserPassword($passwordh);
            $user->setId_house($result);
            $user->setUseravatar($result);
            $user->setUserrole(3);

            $isUserAdded = $user->add();
            
            $id_user = $user->getId();
            $element = ['id'=> $id_user, 'email'=> $email];
            // $element['valid'] = time() + 60*15;
            $token = JWT::set($element);
            if($user){
                $to = 'laura.antoniolli@gmail.com';
                $subject = 'Inscription à notre super site!';
                $message = 'Veuillez cliquer : <a href="'.$_SERVER['HTTP_ORIGIN'].'/controllers/validateAccountCtrl.php?token='.$token.'">Cliquez-ici</a>';
                mail($to,$subject,$message);
                header('Location: /controllers/mail-sendedCtrl.php');
                exit;
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

//-------------------------------- APPEL DES VUES ----------------------------------------//

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar2.php');
include(__DIR__ . '/../views/user/register.php');
include(__DIR__ . '/../views/templates/footer.php');
