<div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
            <h2 class="display-3 news__title text-center">Commentaires</h2>
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
                                <!-- Affiche le bouton seulement pour l'auteur du commentaire -->
                                <?php if (!isset($_SESSION['user'])) { ?>
                                    <div class="flex-end"><a href="#"><i class="uil uil-exclamation-triangle button__icon" title="Signaler" data-toggle="tooltip" data-placement="right"></i></a></div>
                                <?php } else if ($post->id_users != $id_user) { ?>
                                    <div class="flex-end"><a href="#"><i class="uil uil-exclamation-triangle button__icon" title="Signaler" data-toggle="tooltip" data-placement="right"></i></a></div>
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
                                <h2 class="display-3 news__title text-center">Commentaires</h2>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-3">Pour poster un commentaire vous devez être inscrit ou connecté</div>
                                        <div class="d-flex flex-start justify-content-around">
                                            <button type="button" class="btn btn__color btn-lg">S'inscrire</button>
                                            <div>
                                                <button type="button" class="btn btn__color__alt btn-lg">Se connecter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                } else { 
                    ?>
                    <form action="" method="POST">
                        <div class="card-footer py-3 border-0">
                            <div class="d-flex flex-start w-100">
                                <img class="rounded-circle shadow-1-strong me-3" src="<?= $fileUser ?>" alt="avatar" width="40" height="40" />
                                <div class="form-outline w-100">
                                    <span class="form_infos">Connecté en tant que <span class="form_name"><?php echo $user->user_name; ?></span>. Ce n'est pas vous ? <a href="/controllers/logoutCtrl.php">Déconnexion</a></span>
                                    <textarea class="form-control resize_textarea" id="myText" rows="4" style="background: #fff;" name="content"></textarea>

                                    <label class="form-label detail__comments" for="textAreaExample">nombre de caractères : <span id="wordCount">0</span> / 300</label>
                                </div><?= $errors['content'] ?? '' ?>
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn__color">Publier</button></div>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>