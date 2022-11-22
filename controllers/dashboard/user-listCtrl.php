<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/User.php');

session_start();
try {
    $users = User::getAll();
} catch (PDOException $e) {
    die('ERREUR :' . $e->getMessage());
}

include(__DIR__.'/../../views/admin/dash-templates/dash-header.php');
include(__DIR__.'/../../views/admin/dash-templates/dash-navbar.php');
include(__DIR__.'/../../views/admin/dash-user-list.php');
include(__DIR__.'/../../views/admin/dash-templates/dash-footer.php');
