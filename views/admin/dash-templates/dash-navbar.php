 <!-- Vertical navbar -->
 <div class="vertical-nav bg-dark" id="sidebar">
        <div class="py-4 px-3 mb-0 bg-dark">
            <div class="media d-flex align-items-center">
                <img loading="lazy" src="/public/assets/img/iconscomment.jpg" alt="..." width="80" height="80"
                    class="mr-3 rounded-circle shadow-sm">
                <div class="media-body">
                    <h4 class="m-0 user__name"><?= $user->user_name ;?></h4>
                    <p class="font-weight-normal text-muted mb-0">Admin</p>
                </div>
            </div>
        </div>

        <ul class="nav-title nav flex-column bg-dark mb-0">   
            <li class="nav-item">
                <a href="/controllers/dashboard/dash-homeCtrl.php" class="nav-link text-white bg-dark">
                    <i class="uil uil-estate button__icon"></i>
                    Accueil
                </a>
            </li>
        </ul>
        <p class="nav-title text-uppercase px-3 mb-0">Dashboard</p>

        <ul class="nav-title nav flex-column bg-dark mb-0">
            <li class="nav-item">
                <a href="/controllers/dashboard/dash-add-newsCtrl.php" class="nav-link text-light bg-dark">
                    <i class="uil uil-edit-alt button__icon"></i>
                    Rédiger un Article
                </a>
            </li>
            <li class="nav-item">
                <a href="/controllers/dashboard/dash-all-newsCtrl.php" class="nav-link text-white bg-dark">
                    <i class="uil uil-book-open button__icon"></i>
                    Tous les articles
                </a>
            </li>
        </ul>

        <p class="nav-title text-uppercase px-3 mb-0 mt-1">Conventions</p>

        <ul class="nav flex-column mb-0">
            <li class="nav-item">
                <a href="/controllers/dashboard/dash-add-meetingCtrl.php" class="nav-link text-light bg-dark">
                    <i class="uil uil-map-marker-plus button__icon"></i>
                    Ajouter une convention
                </a>
            </li>
            <li class="nav-item">
                <a href="/controllers/dashboard/user-listCtrl.php" class="nav-link text-light bg-dark">
                    <i class="uil uil-megaphone button__icon"></i>
                    Liste des Conventions
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-light bg-dark">
                    <i class="uil uil-bookmark-full button__icon"></i>
                    Réservations
                </a>
            </li>
        </ul>


        <p class="nav-title text-uppercase px-3 mb-0 mt-1">Utilisateurs</p>

        <ul class="nav flex-column mb-0">
            <li class="nav-item">
                <a href="/controllers/dashboard/user-listCtrl.php" class="nav-link text-light bg-dark">
                    <i class="uil uil-align-justify button__icon"></i>
                    Liste des utilisateurs
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-light bg-dark">
                    <i class="uil uil-key-skeleton-alt button__icon"></i>
                    Gérer les privilèges
                </a>
            </li>
        </ul>

        <p class="nav-title text-gray text-uppercase px-3 small mb-1">Commentaires</p>

        <ul class="nav flex-column mb-0">
            <li class="nav-item">
                <a href="#" class="nav-link text-light bg-dark">
                    <i class="uil uil-comment-lines button__icon"></i>
                    Liste des commentaires
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-light bg-dark">
                    <i class="uil uil-comment-check button__icon"></i>
                    Commentaires à valider
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-light bg-dark">
                    <i class="uil uil-exclamation-triangle button__icon"></i>
                    Commentaires signalés
                </a>
            </li>
            <li class="nav-item text-center mt-3">
                <a href="/controllers/homeController.php" class="nav-link text-light bg-dark">
                    <i class="uil uil-users-alt button__icon mr-3"></i><i class="uil uil-setting mr-3 button__icon"></i><i class="uil uil-times-circle button__icon"></i>
                </a>
            </li>
        </ul>
        

    </div>
