<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__dashboard">Listing des Réservations</h2>
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
        <div class="container text-white d-flex justify-content-center">Réservations</div>
        <thead>
            <tr>
                <th class="text-center title__dashboard" scope="col">Date</th>
                <th class="text-center title__dashboard" scope="col">Nom</th>
                <th class="text-center title__dashboard" scope="col">Lieu</th>
                <th class="text-center title__dashboard" scope="col">Réservations</th>
                <th class="text-center title__dashboard" scope="col">Gestion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($allBookings as $booking) {
            ?>
                <tr>
                    <td class="text-center"><?= date("d/m/Y", strtotime($booking->dateEvent)) ?></td>
                    <td class="text-center"><?= $booking->nameEvent ?></td>
                    <td class="text-center"><?= $booking->locationEvent ?></td>
                    <td class="text-center"><?= $booking->places ?></td>
                    <td class="text-center">
                        <!-- Bouton pour supprimer le commentaire -->
                        <a href="/controllers/dashboard/dash-delete"><i class="uil uil-trash button__icon"></i></a>
                        <a href="/controllers/dashboard/dash-delete"><i class="uil uil-trash button__icon"></i></a>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
</div>