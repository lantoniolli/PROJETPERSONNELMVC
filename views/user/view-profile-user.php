<div class="container">
    <div class="py-5">
        <div class="container py-5">
            <h2 class="display-3 divider">Profil de <?= $users->user_name ?></h2>
            <div class="container d-flex justify-content-center align-items-center mt-5 test2__container">
                <div class="col-9">
                    <div class="row ">
                        <div class="col-lg-3">
                            <div class="card mb-4">
                                <div class="card-body text-center">

                                    <img src="<?= $filename ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">

                                    <h5 class="my-3 username__profile"><?= $users->user_name ?></h5>
                                    <p class="mb-1 label__profile">Administratrice</p>
                                    <img src="/public/assets/img/sigils/<?= $users->user_house ?>.png" alt="emblème_maison" class="rounded-circle img-fluid" style="width: 70px;">


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <form method="POST" name="update">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="mb-3 label__profile">Commentaires</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="mb-0 text-center"><?= $nbComments ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="mb-3 label__profile">Réservations</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="mb-0">
                                                    <!-- <p class="mb-0 text-center"><?= $comments ?></p> -->
                                            </div>
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="label__profile">Date</th>
                                                        <th scope="col" class="label__profile">Lieu</th>
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
                                                        </tr>
                                                    <?php
                                                    };
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div class="col-sm-12 text-center">
                                                <!-- Affiche le bouton seulement pour l'auteur du commentaire -->
                                                <?php if (!isset($_SESSION['user'])) { ?>
                                                    <div class="flex-end"><a href="#">En savoir plus sur les Conventions ?</a></div>
                                                <?php } else if ($user->id_users != $id_user) { ?>
                                                    <div class="flex-end"><a href="#">En savoir plus sur les Conventions</a></div>
                                                <?php } else if ($user->id_users == $id_user) { ?>
                                                    <div class="flex-end button__title"><a href="/controllers/modify-profile-userCtrl.php?id=<?= $id_user ?>">Modifier mon profil</a></div>

                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>