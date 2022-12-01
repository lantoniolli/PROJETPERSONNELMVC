<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__dashboard">Listing Utilisateurs</h2>
    <div class="separator"></div>
    <div class="container text-white d-flex justify-content-center">
        <div class="col-4">
            <form method="get">
                <div class="input-group mb-4">
                    <input type="search" class="form-control" placeholder="Écrire un nom" name="search" aria-describedby="button-addon2">
                    <button class="btn btn__color" type="submit" id="button-addon2">Rechercher</button>
                </div>
            </form>
            <?php
            if (SessionFlash::exist()) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
                <th class="text-center title__dashboard" scope="col">Nom</th>
                <th class="text-center title__dashboard" scope="col">Mail</th>
                <th class="text-center title__dashboard" scope="col">Date de création</th>
                <th class="text-center title__dashboard" scope="col">Profil</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
            ?>
                <tr>
                    <td class="text-center"><?= $user->user_name ?></td>
                    <td class="text-center"><?= $user->user_mail ?></td>
                    <td class="text-center"><?= date("d/m/Y", strtotime($user->created_at)) ?></td>
                    <td class="text-center"><a href="/controllers/profileUserController.php?id=<?= $user->id; ?>"><i class="uil uil-user-exclamation button__icon__alt"></i></a>
                        <a href="/controllers/dashboard/dash-delete-userCtrl.php?id=<?= $user->id_users; ?>"><i class="uil uil-trash-alt button__icon"></i></a>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
</div>