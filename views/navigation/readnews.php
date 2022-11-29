<section class="about__section" id="about">
    <div class="page-content test__container p-2" id="content">
        <h2 class="display-3 news__title text-center">Lecture Article</h2>
        <div class="separator"></div>
        <!-- sessionflash -->
        <?php
        if (SessionFlash::exist()) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
            </div>
        <?php } ?>
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8">
                    <span class="badge px-2 py-1 mb-3 hot__button">rédigé par
                        <?= $news->user_name ?>
                    </span><span class="badge px-2 py-1 mb-3 hot__button">
                        <?= date("d/m/Y", strtotime($news->news_posted_at)) ?>
                    </span>
                    <img src="/public/uploads/<?= $news->id_news ?>.jpg" class="card-img-top" id="preview" alt="..." class="img-fluid">
                    <h4 class="news__title mt-2"><strong>
                            <?= $news->news_title ?>
                        </strong></h4>
                    <p class="news__text">
                        <?= html_entity_decode($news->news_content) ?>
                </div>
</section>