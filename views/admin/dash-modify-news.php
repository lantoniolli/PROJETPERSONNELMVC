<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__dashboard">Modifier l'Article</h2>
    <div class="separator"></div>

    <div class="container text-white d-flex justify-content-center">
        <div id="preview_img" style="width: 18rem;">
            <img src="/public/uploads/<?= $news->id_news ?>.jpg" class="card-img-top" id="preview" alt="..."></div></div>
            <form action="" enctype="multipart/form-data" method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="inputTitle" class="form-label title__label">Titre</label>
                    <input type="text" class="form-control" id="inputTitle" name="title" value="<?= $news->news_title ?>">
                </div>


                <div class="col-md-6">
                    <label for="formFileSm" class="form-label title__label">Couverture de l'Article</label>
                    <input class="form-control" id="formFileMd" type="file" id="file-ip-1" accept="image/jpeg" name="news_img" onchange="readURL(this)" ;>
                </div>


                <div class="col-12 mt-3">
                    <label for="inputContent" class="form-label title__label">Contenu</label>
                    <textarea class="form-control" id="inputContent" rows="5" name="content"><?= $news->news_content ?></textarea>
                </div>
                <div class="col-12 text-center mt-5">
                    <button type="submit" class="btn btn__color">Publier</button>
                </div>
            </form>
        </div>