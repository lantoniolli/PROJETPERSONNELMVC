<?php

define('DSN', 'mysql:host=localhost;dbname=projet_got;charset=utf8mb4');
define('USER', 'staffgot');
define('PWD', 'km]Nkdm]UtQ528hg');

// Définition des REGEX
define('REGEX_NO_NUMBER', "^[a-zA-ZÀ-ÿ '-]+$");
define('REGEX_FOR_PSEUDO', "^[a-zA-ZÀ-ÿ_-]{1,20}[0-9]{0,5}$");
define('REGEX_FOR_PASSWORD', "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}");

// Définition des constantes
define('LIMIT', 20);
define('SUPPORTED_FORMATS', array('image/jpeg'));
define('MAX_SIZE', 5*1024*1024);
define('UPLOAD_USER_PROFILE', __DIR__ . '/../public/uploads/users/');
define('SECRET_KEY', 'DRACARYS');
