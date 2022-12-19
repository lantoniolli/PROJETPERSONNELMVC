<!-- page test affichage détail convention -->
<section>
    <div class="page-content p-5" id="content">
        <h2 class="display-3 news__title mt-5 text-center"><?= $meeting->event_name ?></h2>
        <!-- ici un sous-titre -->
        <div class="separator"></div>
        <div class="container d-flex align-items-center gx-4 justify-content-evenly">
            <div><i class="uil uil-map-marker-shield button__icon"></i><?= $meeting->event_location ?></div>
            <div><i class="uil uil-bookmark button__icon"></i> <?= ($reservations->places != null && $reservations->places > 1 ) ? $reservations->places.' réservations' : (($reservations->places == null) ? 'Aucune réservation' : $reservations->places.' réservation') ?></div>
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
                <div class="col-md-5 text-center"><iframe src="<?= $meeting->event_map ?>" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            </div>
        </div>
        <div class="separator"></div>
        <!-- avis -->
        <h2 class="display-3 news__title mt-5 text-center">Photos & Avis</h2>
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex flex-column comment-section">
                        <div class="bg-white shadow-lg p-2">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="/public/assets/img/meeting.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="/public/assets/img/meeting.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="/public/assets/img/meeting.jpg" alt="Third slide">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
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
                        } else { ?>
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


                                                    <!-- <span class="input-number-decrement">–</span><input class="input-number" type="text" value="1" min="0" max="10" name="reservation"><span class="input-number-increment">+</span> -->
                                                </div>
                                            </div>
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
    </div>
</section>