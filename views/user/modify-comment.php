<div class="container-test">
    <div class="container py-5">
    <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <h2 class="display-3 news__title text-center">Modification d'un Commentaire</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center justify-content-between">
                            <div class="avatar_pseudo_user d-flex">
                                <img class="rounded-circle shadow-1-strong me-3" src="/public/assets/img/cerseiicons.jpg" alt="avatar" width="60" height="60" />
                                <div>
                                    <h6 class="fw-bold mb-1"><?= $comment->user_name ?></h6>
                                    <p class="text-muted small mb-0">
                                        Posté le <?= date("d/m/Y H:i", strtotime($comment->posted_at)) ?></p>
                                </div>
                            </div>
                        </div>

                        <p class="mt-3 mb-4 pb-2">
                            <?= $comment->comment_description ?>
                        </p>
                    </div>
                    <form action="" method="POST">
                        <div class="card-footer py-3 border-0">
                            <div class="d-flex flex-start w-100">
                                <img class="rounded-circle shadow-1-strong me-3" src="/public/assets/img/iconscomment.jpg" alt="avatar" width="40" height="40" />
                                <div class="form-outline w-100">
                                    <textarea class="form-control resize_textarea" id="myText" rows="4" style="background: #fff;" name="content"></textarea>

                                    <label class="form-label" for="textAreaExample">nombre de caractères : <span id="wordCount">0</span> / 300</label>
                                </div><?= $errors['content'] ?? '' ?>
                            </div>
                            <div class="float-end mt-2 pt-1">
                                <button type="button" class="btn btn__color__alt mb-3">Annuler</button>
                                <button type="submit" class="btn btn__color mb-3">Enregister les modifications</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>