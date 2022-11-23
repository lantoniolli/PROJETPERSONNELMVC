<section class="about__section" id="about">
    <div class="page-content p-5" id="content">
        <h2 class="display-3 news__title">Actualités</h2>
        <div class="separator"></div>
        <?php
        foreach ($news as $new) {
        ?>
            <div class="container d-flex flex-column mt-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-md-5 mb-4">
                        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                            <img src="https://cdn-europe1.lanmedia.fr/var/europe1/storage/images/europe1/guide-shopping/house-of-the-dragon-comment-regarder-le-nouvel-episode-de-la-serie-du-moment-4141283/59231858-1-fre-FR/House-of-the-Dragon-comment-regarder-le-nouvel-episode-de-la-serie-du-moment.jpg" class="img-fluid" />
                            <a href="#">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 mb-4">
                        <span class="badge px-2 py-1 mb-3 hot__button">🔥Convention</span><span class="badge px-2 py-1 mb-3 hot__button"><?= date("d/m/Y", strtotime($new->news_posted_at)) ?></span>
                        <h4 class="news__title"><strong><?= $new->news_title ?></strong></h4>
                        <p class="news__text">
                            <?= $new->news_content ?>
                        </p>
                        <button type="button" class="btn btn__color">Lire l'article</button>
                    </div>
                </div>
            </div>
        <?php
        };
        ?>
    </div>
</section>