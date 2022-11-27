<div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
            <h2 class="display-3 news__title text-center">Commentaires</h2>
            <div class="card">
            <?php
            foreach ($users as $user) {
            ?>
                <div class="card-body">
                    <div class="d-flex flex-start align-items-center">
                        <img class="rounded-circle shadow-1-strong me-3" src="/public/assets/img/cerseiicons.jpg" alt="avatar" width="60" height="60" />
                        <div>
                            <h6 class="fw-bold mb-1">Jon Snow</h6>
                            <p class="text-muted small mb-0">
                                Posté le - Jan 2020
                            </p>
                        </div>
                    </div>

                    <p class="mt-3 mb-4 pb-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.
                    </p>
                </div>

                <?php
            };
            ?>
                <!-- <div class="card-body">
                    <div class="d-flex flex-start align-items-center">
                        <img class="rounded-circle shadow-1-strong me-3" src="/public/assets/img/cerseiicons.jpg" alt="avatar" width="60" height="60" />
                        <div>
                            <h6 class="fw-bold mb-1">Cersei Lannister</h6>
                            <p class="text-muted small mb-0">
                                Posté le - Jan 2020
                            </p>
                        </div>
                    </div>

                    <p class="mt-3 mb-4 pb-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.
                    </p>
                </div> -->
                <form method="POST">
                    <div class="card-footer py-3 border-0">
                        <div class="d-flex flex-start w-100">
                            <img class="rounded-circle shadow-1-strong me-3" src="/public/assets/img/iconscomment.jpg" alt="avatar" width="40" height="40" />
                            <div class="form-outline w-100">
                                <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                <label class="form-label" for="textAreaExample">Message</label>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" class="btn btn__color mb-3">Publier</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>