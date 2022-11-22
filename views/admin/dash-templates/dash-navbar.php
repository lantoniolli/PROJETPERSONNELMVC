 <!-- Vertical navbar -->
 <div class="vertical-nav bg-dark" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-dark">
            <div class="media d-flex align-items-center">
                <img loading="lazy" src="/public/assets/img/iconscomment.jpg" alt="..." width="80" height="80"
                    class="mr-3 rounded-circle shadow-sm">
                <div class="media-body">
                    <h4 class="m-0 user__name"><?= $user->user_name ;?></h4>
                    <p class="font-weight-normal text-muted mb-0">Admin</p>
                </div>
            </div>
        </div>

        <p class="nav-title text-uppercase px-3 pb-4 mb-0">Dashboard</p>

        <ul class="nav-title nav flex-column bg-dark mb-0">
            <li class="nav-item">
                <a href="/controllers/dashboard/dash-homeCtrl.php" class="nav-link text-white bg-dark">
                    <i class="uil uil-estate button__icon"></i>
                    Accueil
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-light bg-dark">
                    <i class="uil uil-clock button__icon"></i>
                    Activité
                </a>
            </li>
        </ul>

        <p class="nav-title text-uppercase px-3 pb-4 mb-0 mt-4">Utilisateurs</p>

        <ul class="nav flex-column bg-white mb-0">
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

        <p class="nav-title text-gray text-uppercase px-3 small py-4 mb-0">Commentaires</p>

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