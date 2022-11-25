<?php

require_once(__DIR__ . '/../../helpers/database.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/./sidebar-Ctrl.php');

// session_start();

// try {
//     $user = $_SESSION['user'] = User::getOne($_SESSION['user']->id_users); 
// } catch (PDOException $e) {
//     die('ERREUR :' . $e->getMessage());
// }


include(__DIR__.'/../../views/admin/dash-templates/dash-header.php');
include(__DIR__.'/../../views/admin/dash-templates/dash-navbar.php');
include(__DIR__.'/../../views/admin/dash-home.php');
include(__DIR__.'/../../views/admin/dash-templates/dash-footer.php');
