<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/./sidebar-Ctrl.php');

try {
    // On détermine sur quelle page on se trouve
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }     

    // Nettoyage de la rechcerche.
        $search = trim((string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
        
        $nbUsers = User::count();
        
    // On calcule le nombre de pages total.
        $pages = ceil($nbUsers / LIMIT);
        
    // Calcul du 1er article de la page.
        $offset = ($currentPage - 1) * LIMIT;
        $users = User::getAll(LIMIT, $offset, $search);


    } catch (PDOException $e) {
        die('ERREUR :' . $e->getMessage());
    }
    


include(__DIR__.'/../../views/admin/dash-templates/dash-header.php');
include(__DIR__.'/../../views/admin/dash-templates/dash-navbar.php');
include(__DIR__.'/../../views/admin/dash-user-list.php');
include(__DIR__.'/../../views/admin/dash-templates/dash-footer.php');
