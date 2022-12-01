<!-- MODIFY PROFILE FORM USER -->

<section class="about__section" id="about">
    <div class="page-content test__container p-2" id="content">
        <div class="container d-flex justify-content-center align-items-center mt-5 test2__container">
            <div class="col-12">
                <h2 class="display-3 news__title text-center">Modifier mon Profil</h2>
                <div class="separator"></div>
                <div class="row ">
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="/public/assets/img/iconscomment.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3 username__profile"><?= $user->user_name ?></h5>
                                <p class="mb-1 label__profile">Administratrice</p>
                                <div class="col-12 d-flex justify-content-center align-items-center mb-2 mt-2">
                                    <select class="form-select text-center" aria-label="Choisir son emblème">
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
                        <form method="POST" name="update">
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
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="username" value="<?= $user->user_mail ?>">
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
                                                            Pour modifier votre mot de passe, cliquez sur le bouton <span class="bbbb">"Modifier mon mot de passe"</span>. <br>Un e-mail contenant toute la procédure vous sera envoyé.

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn__color__alt" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="button" class="btn  btn__color">Envoyer Mail</button>
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
                                            <input class="form-control form-control-sm" id="formFileSm" type="file">
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
                                            <button type="button" class="btn btn__color" data-bs-toggle="modal" data-bs-target="#modaldelete">Supprimer son
                                                compte</button>
                                            <!-- MODAL -->
                                            <div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <form method="POST" name="deleteAccount">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body label__profile">
                                                            <p class="text-center">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn__color__alt" data-bs-dismiss="modal">Annuler</button>
                                                            <a href="/controllers/delete-userCtrl.php?id=<?= $user->id_users ?>"><button type="button" class="btn  btn__color">Confirmer la suppression</button></a>
                        </form>
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
                        <div class="col-sm-8">
                            <?= $nbComments ?>
                        </div>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="label__profile">Date</th>
                                    <th scope="col" class="label__profile">Lieu</th>
                                    <th scope="col" class="label__profile">Gestion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>18/02/2022</td>
                                    <td>Paris</td>
                                    <td>Icone</td>
                                </tr>
                                <tr>
                                    <td>20/07/2022</td>
                                    <td>Marseille</td>
                                    <td>Icone</td>
                                </tr>
                                <tr>
                                    <td>02/12/2022</td>
                                    <td>Lyon</td>
                                    <td>Icone</td>
                                </tr>
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
</section>