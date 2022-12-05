<section class="about__section" id="about">
    <div class="page-content p-5" id="content">
        <h2 class="display-3 news__title">A propos</h2>
        <div class="separator"></div>

        <div class="container d-flex flex-column align-items-center">
            <div class="row gx-5 justify-content-center align-items-center">
                <div class="col-md-4 mb-4">
                    <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                        <img src="https://geekxgirls.com/images/gameofthrones/game_of_thrones_cosplay_05.jpg" height="200px" class="img-fluid" />
                        <a href="#">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-4 text-justify">
                    <h4 class="news__title"><strong><?= $lastNews->news_title ?></strong></h4>
                    <p class="news__text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia id sit asperiores omnis repellendus laboriosam dignissimos tenetur quos, repellat aliquam atque alias eius minus laborum totam quidem quasi ipsum fugit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, quae asperiores eum debitis dolores laborum, illo quos optio deleniti porro nostrum! Reiciendis et rem eaque perspiciatis pariatur laudantium ipsa ea! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, optio atque! Autem eos excepturi amet cumque aspernatur itaque ea quos sequi pariatur, rem nemo necessitatibus, laboriosam officiis quae id laudantium? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos veritatis distinctio labore? Excepturi sunt ducimus voluptate incidunt expedita hic totam, similique dicta eligendi sit cupiditate repellat laudantium ad, repellendus ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. At similique saepe odit unde, laborum, est iure consequatur numquam facere nulla sequi hic labore architecto sunt laboriosam. Ullam beatae aperiam autem.</p>
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <form action="#" class="contact-form">
                        <h5 class="title">Contactez nous</h5>
                        <p class="description">Vous avez une question ? N'hésitez pas à nous contacter !</p>
                        </p>
                        <div>
                            <input type="text" class="form-control mb-3 rounded-0 form-input shadow-none" id="name" placeholder="Nom" required>
                        </div>
                        <div>
                            <input type="email" class="form-control mb-3 rounded-0 form-input shadow-none" placeholder="Email" required>
                        </div>
                        <div>
                            <textarea id="message" class="form-control mb-3 rounded-0 form-input shadow-none area" placeholder="Message" required></textarea>
                        </div>
                        <div class="submit-button-wrapper">
                            <input type="submit" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>