<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__hospital">Listing Utilisateurs</h2>
    <div class="separator"></div>
    <table class="table table-dark table-striped mt-3">
        <div class="container text-white d-flex justify-content-center">
            <div class="col-4">
                <form method="get">
                    <div class="input-group mb-4">
                        <input type="search" class="form-control" placeholder="Écrire un nom" name="search" aria-describedby="button-addon2">
                        <button class="btn btn__color" type="submit" id="button-addon2">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
        <thead>
            <tr>
                <th class="text-center title__hospital" scope="col">Nom</th>
                <th class="text-center title__hospital" scope="col">Mail</th>
                <th class="text-center title__hospital" scope="col">Date de création</th>
                <th class="text-center title__hospital" scope="col">Profil</th>
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
                        <a href="/controllers/deleteUserAppointmentController.php?id=<?= $user->id; ?>"><i class="uil uil-trash-alt button__icon"></i></a>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
    <div class="container text-white d-flex justify-content-center">
        <div class="col-4">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <span class="page-link">Précédent</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <span class="page-link">
                            2
                            <span class="sr-only">(current)</span>
                        </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>