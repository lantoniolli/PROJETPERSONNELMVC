<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__dashboard">Accès Refusé </h2>
    <div class="separator"></div>

    <div class="container text-white d-flex flex-column justify-content-center ">
        <?php
        if (SessionFlash::exist()) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-12 text-center">
            <i class="uil uil-exclamation-triangle button__icon"></i>
                <p>Vous n'avez pas les droits pour accéder à cette page.</p>
            </div>
            <div class="col-12 text-center mt-5">
                <a href="/controllers/dashboard/dash-homeCtrl.php" class="btn btn__color">Retour à l'accueil</a>
            </div>
        </div>