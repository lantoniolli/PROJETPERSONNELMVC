    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-end justify-content-center ">
            <div class="d-flex justify-content-center title__position">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase mb-2">Fire Will Reign</h1>
                    <a class="btn mb-2 col-sm-8 header__subtitle" href="#about">Trouvez votre prochaine convention</a>
                </div>
            </div>
        </div>
    </header>

    <section class="about__section" id="about">
        <div class="page-content p-5" id="content">
            <h2 class="display-3 divider">Actualités</h2>
            <!-- <div class="separator"></div> -->
            <div class="container d-flex flex-column mt-5">
                <div class="row gx-5 justify-content-center align-items-center">
                    <div class="col-md-4 mb-4">
                        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                            <img src="/public/uploads/<?= $lastNews->id_news ?>.jpg" class="img-fluid" />
                            <a href="#">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <span class="badge px-2 py-1 mb-3 hot__button">rédigé par <?= $lastNews->user_name ?></span><span class="badge px-2 py-1 mb-3 hot__button"><?= date("d/m/Y", strtotime($lastNews->news_posted_at)) ?></span>
                        <h4 class="news__title"><strong><?= $lastNews->news_title ?></strong></h4>
                        <p class="news__text">
                            <?= html_entity_decode(substr($lastNews->news_content, 0, 240)) ?>
                        </p>
                        <a href="/controllers/readnewsCtrl.php?id=<?= $lastNews->id_news ?>"><button type="button" class="btn btn__color">Lire l'article</button></a>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a class="twitter-timeline" data-lang="fr" data-width="300" data-height="300" data-theme="light" href="https://twitter.com/GameOfThrones?ref_src=twsrc%5Etfw">Tweets by GameOfThrones</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
            
        </div>






    </section>

    <section class="meetings__section" id="meetings">
        <div class="page-content p-5" id="content">
            <h2 class="display-3 divider">Prochaines Conventions</h2>
            <!-- <div class="separator"></div> -->

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <?php
                    foreach ($lastMeetings as $lastMeeting) {
                    ?>
                        <div class="col-md-3 col-sm-6 item">
                            <div class="card item-card card-block">
                            <img src="/public/uploads/meetings/<?= $lastMeeting->id_meetings ?>.jpg" alt="MeetingCouv">
                            <a href="/controllers/view-meetingCtrl.php?id=<?= $lastMeeting->id_meetings ?>"><h5 class="item-card-title mt-3 mb-3 subtitle__text text-center"><?= date("d/m/Y", strtotime($lastMeeting->event_date)) ?></h5>
                                <p class="card-text text-center cgu__subtitle"><?= $lastMeeting->event_location ?></td></a>
                                </p>
                            </div>
                        </div>
                    <?php
                    };
                    ?>
                </div>

            </div>
        </div>
    </section>