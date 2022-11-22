<?php
session_start();

unset($_SESSION['user']);

header('Location: /controllers/homeController.php');
die;

