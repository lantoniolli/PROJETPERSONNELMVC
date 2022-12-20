<!-- page test affichage détail convention -->
<section class="meetings">
    <div class="page-content p-5" id="content">
        <h2 class="display-3 news__title mt-5 text-center"><?= $meeting->event_name ?></h2>
        <!-- ici un sous-titre -->
        <div class="separator"></div>
        <div class="container d-flex align-items-center gx-4 justify-content-evenly">
            <div><i class="uil uil-map-marker-shield button__icon"></i><?= $meeting->event_location ?></div>
            <div><i class="uil uil-bookmark button__icon"></i> <?= ($reservations->places != null && $reservations->places > 1) ? $reservations->places . ' réservations' : (($reservations->places == null) ? 'Aucune réservation' : $reservations->places . ' réservation') ?></div>
        </div>
        <div class="container d-flex flex-column mt-5">
            <div class="row gx-4 justify-content-center align-items-center">
                <div class="col-md-3 text-center">
                    <div class="bg-image hover-overlay ripple shadow-2-strong rounded">
                        <img src="/public/uploads/meetings/<?= $meeting->id_meetings ?>.jpg" style="height:350px" class="img-fluid shadow-lg">
                    </div>
                </div>
                <div class="col-md-4">
                    <p><?= html_entity_decode($meeting->event_description) ?></p>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <?php
                        if (!isset($_SESSION['user'])) {
                        ?>

                            <div class="container my-5 py-5">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 col-lg-10 col-xl-8">
                                        <h2 class="display-3 news__title text-center">Inscription</h2>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center mb-3">Pour s'inscrire à une convention vous devez être inscrit sur le site ou connecté</div>
                                                <div class="d-flex flex-start justify-content-around">
                                                    <a href="/controllers/registerCtrl.php"><button type="button" class="btn btn__color btn-lg">S'inscrire</button></a>
                                                    <div>
                                                        <a href="/controllers/loginCtrl.php"><button type="button" class="btn btn__color__alt btn-lg">Se connecter</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        } else { ?>
                        <!-- FORMULAIRE DE RESERVATION -->
                            <form action="" method="POST">
                                <div class="container my-5 py-5">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 col-lg-10 col-xl-8">
                                            <h2 class="display-3 news__title text-center">Inscription</h2>
                                            <?php
                                            if (SessionFlash::exist()) { ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
                                                </div>
                                            <?php } ?>
                                            Ea esse veniam qui voluptatum sequi nam cupiditate quia? Id sapiente voluptas a quos tempora hic pariatur velit.

                                            Sed voluptas labore est obcaecati vitae ut quasi voluptas ea recusandae dolores! Et corporis velit aut deserunt rerum et consequatur vero et tempore assumenda.
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <input type="number" min="1" max="10" placeholder="0" name="places" />
                                                </div>
                                            </div>
                                            <input type="hidden" name="form" value="1">
                                            <div class="text-center"><button type="submit" class="btn btn__color mt-3">S'inscrire à cette convention</button></div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                </form>
            <?php
                        }
            ?>
            </div>

        </div>
    </div>
    <!-- ENCART DES COMMENTAIRES / AFFICHAGE DES COMMENTAIRES POSTES -->
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-10 col-lg-8 col-xl-5">
            <h2 class="display-3 divider mb-4">Avis</h2>
            <div class="card">
                <?php
                foreach ($posts as $post) {
                    $filename = __DIR__ . '/../../public/uploads/users/' . $post->id_users . '.jpg';
                    if (file_exists($filename)) {
                        $filename = '/public/uploads/users/' . $post->id_users . '.jpg';
                    } else {
                        $filename = '/public/assets/img/useravatar/' . $post->user_house . '.jpg';
                    }
                ?>
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center justify-content-between">
                            <div class="avatar_pseudo_user d-flex">
                                <img class="rounded-circle shadow-1-strong me-3" src="<?= $filename ?>" alt="avatar" width="60" height="60" />
                                <div>
                                    <a href="/controllers/view-profile-userCtrl.php?id=<?= $post->id_users ?>" <h6 class="fw-bold mb-1 username__comments"><?= $post->user_name ?></h6>
                                        <p class="text-muted small mb-0 detail__comments">
                                            Posté le <?= date("d/m/Y H:i", strtotime($post->posted_at)) ?></p>
                                </div>
                                <div class="ms-5"><img src="/public/assets/img/sigils/<?= $post->user_house ?>.png" height="30px"></div>
                            </div>
                            <div class="moderation d-flex">
                                <!-- Affiche le bouton pour un visiteur non connecté -->
                                <?php if (!isset($_SESSION['user'])) { ?>
                                    <div class="flex-end"><a href="#"><i class="uil uil-exclamation-triangle button__icon" title="Signaler" data-toggle="tooltip" data-placement="right"></i></a></div>
                                    <!-- Affiche le bouton pour un utilisateur connecté -->
                                <?php } else if ($post->id_users != $id_user) { ?>
                                    <div class="flex-end"><a href="#"><i class="uil uil-exclamation-triangle button__icon" title="Signaler" data-toggle="tooltip" data-placement="right"></i></a></div>
                                    <!-- Affiche le bouton seulement pour l'auteur du commentaire -->
                                <?php } else if ($post->id_users == $id_user) { ?>
                                    <div class="flex-end"><a href="/controllers/modify-commentsCtrl.php?id=<?= $post->id_comments; ?>"><i class="uil uil-comment-edit button__icon" title="Editer" data-toggle="tooltip"></i></a></div>
                                <?php } ?>
                            </div>
                        </div>

                        <p class="mt-3 mb-4 pb-2 content__comments">
                            <?= $post->comment_description ?>
                        </p>
                    </div>

                <?php
                };
                ?>


                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <div class="container my-5 py-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12 col-lg-10 col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-3">Pour poster un commentaire vous devez être inscrit ou connecté</div>
                                        <div class="d-flex flex-start justify-content-around">
                                            <a href="/controllers/registerCtrl.php"><button type="button" class="btn btn__color btn-lg">S'inscrire</button></a>
                                            <div>
                                                <a href="/controllers/loginCtrl.php"><button type="button" class="btn btn__color__alt btn-lg">Se connecter</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                } else { ?>
                    <form action="" method="POST">
                    <?php
                           $fileUser = __DIR__ . '/../public/uploads/users/' . $id_user . '.jpg';
                           if (file_exists($fileUser)) {
                               $fileUser = '/public/uploads/users/' . $id_user . '.jpg';
                           } else {
                               $fileUser = '/public/assets/img/useravatar/' . $user->user_house . '.jpg';
                           }
                        ?>
                        <div class="card-footer py-3 border-0">
                            <div class="d-flex flex-start w-100">
                                <img class="rounded-circle shadow-1-strong me-3" src="<?= $fileUser ?>" alt="avatar" width="40" height="40" />
                                <div class="form-outline w-100">
                                    <span class="form_infos">Connecté en tant que <span class="form_name"><?php echo $user->user_name; ?></span>. Ce n'est pas vous ? <a href="/controllers/logoutCtrl.php">Déconnexion</a></span>
                                    <textarea class="form-control resize_textarea" id="myText" rows="4" style="background: #fff;" name="content"></textarea>

                                    <label class="form-label detail__comments" for="textAreaExample">nombre de caractères : <span id="wordCount">0</span> / 300</label>
                                </div><?= $errors['content'] ?? '' ?>
                            </div>
                            <input type="hidden" name="form" value="2">
                            <div class="text-center"><button type="submit" class="btn btn__color">Publier</button></div>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>