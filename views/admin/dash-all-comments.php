<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__dashboard">Listing des Commentaires</h2>
    <div class="separator"></div>
    <?php
    if (SessionFlash::exist()) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
        </div>
    <?php } ?>
    <table class="table table-dark table-striped mt-3">
        <div class="container text-white d-flex justify-content-center">
            <div class="col-4">
                <form method="get">
                    <div class="input-group mb-4">
                        <input type="search" class="form-control" placeholder="Chercher un article" name="search" aria-describedby="button-addon2">
                        <button class="btn btn__color" type="submit" id="button-addon2">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container text-white d-flex justify-content-center"><?= $nbComments ?> Commentaires</div>
        <thead>
            <tr>
                <th class="text-center title__dashboard" scope="col">Sujet</th>
                <th class="text-center title__dashboard" scope="col">Posté par</th>
                <th class="text-center title__dashboard" scope="col">Posté le</th>
                <th class="text-center title__dashboard" scope="col">Contenu</th>
                <th class="text-center title__dashboard" scope="col">Gestion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($allComments as $comment) {
            ?>
                <tr>
                    <td class="text-center"><a href="/controllers/readnewsCtrl.php?id=<?= $comment->id_news ?>"><i class="uil uil-eye button__icon__alt"></i></a></td>
                    <td class="text-center"><?= $comment->user_name ?></td>
                    <td class="text-center"><?= date("d/m/Y", strtotime($comment->posted_at)) ?></td>
                    <td class="text-truncate"><?= $comment->comment_description ?></td>
                    <td class="text-center">
                        <!-- Bouton pour supprimer le commentaire -->
                        <a href="/controllers/dashboard/dash-delete-commentsCtrl.php?id=<?= $comment->id_comments; ?>"><i class="uil uil-trash button__icon"></i></a>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
</div>