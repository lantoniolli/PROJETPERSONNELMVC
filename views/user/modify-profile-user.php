<div class="py-5 justify-content-center align-items-center">
    <div class="container py-5">
        <h2 class="display-3 divider">Modifier son profil</h2>
        <?php
        if (SessionFlash::exist()) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
            </div>
        <?php } ?>
        <div class="container d-flex justify-content-center align-items-center mt-5 test2__container">
            <div class="col-12">
                <div class="row ">
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="<?= $filename ?>" .jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3 username__profile"><?= $users->user_name ?></h5>
                                <p class="mb-1 label__profile">Administratrice</p>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="col-12 d-flex justify-content-center align-items-center mb-2 mt-2">
                                        <select class="form-select text-center" aria-label="Choisir son emblème" name="houses" id="houses">
                                            <?php
                                            if ($user->user_house == 1) {
                                                $house = 'Arryn';
                                            } else if ($user->user_house == 2) {
                                                $house = 'Baratheon';
                                            } else if ($user->user_house == 3) {
                                                $house = 'Greyjoy';
                                            } else if ($user->user_house == 4) {
                                                $house = 'Lannister';
                                            } else if ($user->user_house == 5) {
                                                $house = 'Martell';
                                            } else if ($user->user_house == 6) {
                                                $house = 'Stark';
                                            } else if ($user->user_house == 7) {
                                                $house = 'Targaryen';
                                            } else if ($user->user_house == 8) {
                                                $house = 'Tully';
                                            } else if ($user->user_house == 9) {
                                                $house = 'Tyrell';
                                            }
                                            ?>
                                            <option selected value="<?= $user->user_house ?>"> <?= $house ?> </option>
                                            <option value="1">Arryn</option>
                                            <option value="2">Baratheon</option>
                                            <option value="3">Greyjoy</option>
                                            <option value="4">Lannister</option>
                                            <option value="5">Martell</option>
                                            <option value="6">Stark</option>
                                            <option value="7">Targaryen</option>
                                            <option value="8">Tully</option>
                                            <option value="9">Tyrell</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0 label__profile">Pseudo</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="username" value="<?= $user->user_name ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0 label__profile">Email</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="email" value="<?= $user->user_mail ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0 label__profile">Mot de Passe</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn btn__color" data-bs-toggle="modal" data-bs-target="#modalmodify">Modifier</button>
                                        <!-- MODAL -->
                                        <div class="modal fade" id="modalmodify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body label__profile text-center">
                                                        Pour modifier votre mot de passe, cliquez sur le bouton <span class="bbbb">"Modifier mon mot de passe"</span>.

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn__color__alt" data-bs-dismiss="modal">Annuler</button>
                                                        <a href="/controllers/modify-passwordCtrl.php?id=<?= $user->id_users ?>"><button type="button" class="btn  btn__color">Modifier son Mot de Passe</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN MODAL -->
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0 label__profile">Avatar</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="profile">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0 label__profile">Commentaires</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-muted mb-0"><?= $nbComments ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0 label__profile">Gestion</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn btn__color__alt" data-bs-toggle="modal" data-bs-target="#modaldelete">Supprimer son
                                            compte</button>
                                        <!-- MODAL -->
                                        <div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body label__profile">
                                                        <p class="text-center">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn__color__alt" data-bs-dismiss="modal">Annuler</button>
                                                        <a href="/controllers/delete-userCtrl.php?id=<?= $user->id_users ?>"><button type="button" class="btn  btn__color">Confirmer la suppression</button></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN MODAL -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn__color">Modifier mes informations</button>
                        </div>
                    </div>
                    </form>
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="mb-0 label__profile">Réservations</p>
                                        </div>
                                        <hr>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="label__profile">Date</th>
                                                    <th scope="col" class="label__profile">Nom</th>
                                                    <th scope="col" class="label__profile">Lieu</th>
                                                    <th scope="col" class="label__profile">Gestion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($allBookings as $booking) {
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?= date("d/m/Y", strtotime($booking->dateEvent)) ?></td>
                                                        <td><?= $booking->nameEvent ?></td>
                                                        <td><?= $booking->locationEvent ?></td>
                                                        <td><a href="/controllers/delete-bookingCtrl.php?id_meeting=<?= $booking->idEvent ?>"><i class="uil uil-trash button__icon"></i></a></td>
                                                    </tr>
                                                <?php
                                                };
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="col-sm-12">
                                            <a href="">Plus de Conventions ?</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>