<nav class="navbar navbar-expand-lg navbar-light shadow-sm background__nav fixed-top">
    <div class="container"> <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="/public/assets/img/iconsnav.png" alt="logo" width="40" height="40" class="d-inline-block align-text-top">
            <span class="ml-3 title_nav"></apan>
        </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar4">
            <ul class="navbar-nav mr-auto pl-lg-4">
                <li class="nav-item px-lg-2 active"> <a class="nav-link item_link" href="#">Accueil</a> </li>
                <li class="nav-item px-lg-2"> <a class="nav-link item_link" href="#"><span class="d-inline-block d-lg-none icon-width"><i class="fas fa-spa"></i></span>Actualités</a> </li>
                <li class="nav-item px-lg-2"> <a class="nav-link item_link" href="#"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-user"></i></i></span>Conventions</a> </li>
                <li class="nav-item px-lg-2"> <a class="nav-link item_link" href="#"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-user"></i></i></span>A propos</a> </li>
                <li class="nav-item px-lg-2"> <a class="nav-link item_link" href="#"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-user"></i></i></span>Contact</a> </li>
            </ul>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown item_link">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown <svg  id="arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
<polyline points="6 9 12 15 18 9"></polyline>
</svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu">
                        <?php 
                if(!isset($_SESSION['user'])){
                ?>
                            <li><a class="dropdown-item" href="/controllers/loginCtrl.php">Inscription</a></li>
                            <li><a class="dropdown-item" href="/controllers/loginCtrl.php">Connexion</a></li> 
                            <?php } else {?>
                            <li><a class="dropdown-item" href="/controllers/view-profile-userCtrl.php?id=<?= $id ?>">Mon Profil</a></li>
                            <li><a class="dropdown-item" href="/controllers/logOutCtrl.php">Déconnexion</a></li>
                            <?php }?>
                            <li><a class="dropdown-item" href="/controllers/dashboard/dash-homeCtrl.php">Panneau Administration</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>