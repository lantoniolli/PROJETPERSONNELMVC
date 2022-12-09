
    <div class="py-5">
        <div class="container py-5">
            <h2 class="display-3 divider">Actualités</h2>

            <?php
            foreach ($allNews as $new) {
            ?>
                <div class="container d-flex flex-column mt-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-md-5 mb-4">
                            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                                <img src="/public/uploads/<?= $new->id_news ?>.jpg" class="img-fluid" />
                                <a href="#">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-5 mb-4">
                            <span class="badge px-2 py-1 mb-3 hot__button">rédigé par <?= $new->user_name ?></span><span class="badge px-2 py-1 mb-3 hot__button"><?= date("d/m/Y", strtotime($new->news_posted_at)) ?></span>
                            <h4 class="news__title"><strong><?= $new->news_title ?></strong></h4>
                            <div class="news__text">
                                <?= html_entity_decode($new->news_content) ?>
                            </div>
                            <a href="/controllers/readnewsCtrl.php?id=<?= $new->id_news ?>"<button type="button" class="btn btn__color">Lire l'article</button></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

