
    <nav class="navbar navbar-expand-lg navbar-light background__nav" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/controllers/homeController.php">Fire Will Reign</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto nav__links">
                <li class="nav-item dropdown nav__title">
                        <a class="nav-link dropdown-toggle nav__title" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Navigation
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Accueil</a></li>
                            <li><a class="dropdown-item" href="/controllers/testController.php">PAGE TEST</a></li>
                            <?php 
                                if(isset($_SESSION['user'])){
                                    ?><li>
                                        <hr class="dropdown-divider">
                                    
                            </li>
                            <li><a href="/controllers/dashboard/dash-homeCtrl.php" class="dropdown-item text-danger">Panneau Admin</a></li><?php } ?>
                        </ul>
                    </li>
                <?php 
                if(!isset($_SESSION['user'])){
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/controllers/registerCtrl.php">Inscription</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/controllers/loginCtrl.php">Connexion</a>
                    </li>
                <?php } else {?>
                    <li class="nav-item">
                        <a class="nav-link" href="/controllers/profileController.php">Mon Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/controllers/logOutCtrl.php">Déconnexion</a>
                    </li>
                <?php }?>
                </ul>
            </div>
        </div>
    </nav>
<main>