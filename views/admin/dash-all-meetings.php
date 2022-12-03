<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__dashboard">Listing des Conventions</h2>
    <div class="separator"></div>
    <?php
    if (SessionFlash::exist()) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
        </div>
    <?php } ?>
    <table class="table table-dark table-striped mt-3">
        <div class="container text-white d-flex justify-content-center">
            <div class="col-4">
                <form method="get">
                    <div class="input-group mb-4">
                        <input type="search" class="form-control" placeholder="Chercher un article" name="search" aria-describedby="button-addon2">
                        <button class="btn btn__color" type="submit" id="button-addon2">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container text-white d-flex justify-content-center">? Conventions</div>
        <thead>
            <tr>
                <th class="text-center title__dashboard" scope="col">Date</th>
                <th class="text-center title__dashboard" scope="col">Lieu</th>
                <th class="text-center title__dashboard" scope="col">Nom</th>
                <th class="text-center title__dashboard" scope="col">Contenu</th>
                <th class="text-center title__dashboard" scope="col">Gestion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($meetings as $meeting) {
            ?>
                <tr>
                    <td class="text-center"><?= date("d/m/Y", strtotime($meeting->event_date)) ?></td>
                    <td class="text-center"><?= $meeting->event_location ?></td>
                    <td class="text-center"><?= $meeting->event_name ?></td>
                    <td class="text-truncate"><?= $meeting->event_description ?></td>
                    <td class="text-center">
                        <!-- Bouton pour visualiser l'article de la convention -->
                        <a href="/controllers/readnewsCtrl.php?id=<?= $meeting->id_meetings ?>"><i class="uil uil-eye button__icon__alt"></i></a>
                        <!-- Bouton pour supprimer le commentaire -->
                        <a href="/controllers/dashboard/dash-delete-commentsCtrl.php?id=<?= $meeting->id_meeting; ?>"><i class="uil uil-trash button__icon"></i></a>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
</div>