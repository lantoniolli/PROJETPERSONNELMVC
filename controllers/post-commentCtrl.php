
<?php 
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/Comment.php');

session_start();

try {

} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

?>