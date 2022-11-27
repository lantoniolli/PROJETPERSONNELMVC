    <header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-end justify-content-center ">
        <div class="d-flex justify-content-center title__position">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase mb-5">Fire Will Reign</h1>
                <a class="btn mb-2 col-sm-4 header__subtitle" href="#about">Trouvez votre prochaine convention</a>
            </div>
        </div>
    </div>
</header>

<section class="about__section" id="about">
    <div class="page-content p-5" id="content">
        <h2 class="display-3 news__title">Actualités</h2>
        <div class="separator"></div>
        <div class="container d-flex flex-column mt-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                        <img src="/public/uploads/<?= $lastNews->id_news ?>.jpg" class="img-fluid"/>
                        <a href="#">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <span class="badge px-2 py-1 mb-3 hot__button">rédigé par <?= $lastNews->user_name ?></span><span class="badge px-2 py-1 mb-3 hot__button"><?= date("d/m/Y", strtotime($lastNews->news_posted_at)) ?></span>
                    <h4 class="news__title"><strong><?= $lastNews->news_title ?></strong></h4>
                    <p class="news__text">
                        <?= html_entity_decode($lastNews->news_content) ?>
                    </p>
                    <a href="/controllers/readnewsCtrl.php?id=<?= $lastNews->id_news ?>"><button type="button" class="btn btn__color">Lire l'article</button></a>
                </div>
                <div class="col-md-4 mb-4">
                <a class="twitter-timeline" data-lang="fr" data-width="300" data-height="500" data-theme="light" href="https://twitter.com/HouseofDragon?ref_src=twsrc%5Etfw">Tweets by HouseofDragon</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
</section>

<section class="meetings__section" id="meetings">
    <div class="page-content p-5" id="content">
        <h2 class="display-3 news__title">Prochaines Conventions</h2>
        <div class="separator"></div>

        <div class="container d-flex flex-column align-items-center">
            <div class="row d-flex justify-content-around">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">19 Nov 22</th>
                            <td>Convention N°1</td>
                            <td>Paris</td>
                            <td>Button</td>
                        </tr>
                        <tr>
                            <th scope="row">19 Nov 22</th>
                            <td>Convention N°1</td>
                            <td>Paris</td>
                            <td>Button</td>
                        </tr>
                        <tr>
                            <th scope="row">19 Nov 22</th>
                            <td>Convention N°1</td>
                            <td>Paris</td>
                            <td>Button</td>
                        </tr>
                        <tr>
                            <th scope="row">19 Nov 22</th>
                            <td>Convention N°1</td>
                            <td>Paris</td>
                            <td>Button</td>
                        </tr>
                        <tr>
                            <th scope="row">19 Nov 22</th>
                            <td>Convention N°1</td>
                            <td>Paris</td>
                            <td>Button</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn mt-2 col-sm-6" href="#">S'y inscrire ?</a>
            </div>
        </div>
    </div>
</section>

<!-- <section class="gallery__section" id="gallery">
    <div class="page-content p-5" id="content">
        <h2 class="display-3 news__title">Galerie</h2>
        <div class="separator"></div>
        <div class="col-md-4 mb-4">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/public/assets/img/wp5187949-viserion-wallpapers.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/public/assets/img/Sans-titre-1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/public/assets/img/wp5187949-viserion-wallpapers.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
        </div>
    </div>
</section> -->
