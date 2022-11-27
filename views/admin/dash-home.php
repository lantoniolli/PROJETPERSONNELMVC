<!-- Page content holder -->
<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>

    <!-- content -->
    <h2 class="display-4 title__hospital">Accès Rapide</h2>
    <div class="separator"></div>
    <div class="container d-flex flex-column">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-5 text-white block__test rounded shadow-lg">
                <a href="/controllers/dashboard/user-listCtrl.php"><i class="uil uil-user icons__home"></i></a>
                <div class="nav-item">Utilisateurs</div>
            </div>
            <div class="col-lg-5 block__test rounded shadow-lg">
                <a href="/controllers/dashboard/dash-all-newsCtrl.php"><i class="uil uil-list-ul icons__home"></i></a>
                <div class="nav-item" id="text__dash">Articles</div>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-lg-5 text-white block__test rounded shadow-lg">
                <a href="#"><i class="uil uil-pen icons__home"></i></a>
                <div class="nav-item">Commentaires</div>
            </div>
            <div class="col-lg-5 block__test rounded shadow-lg">
                <a href="#"><i class="uil uil-keyhole-circle icons__home"></i></a>
                <div class="nav-item" id="text__dash">Gestion des Privilèges</div>
            </div>
        </div>
    </div>
</div>