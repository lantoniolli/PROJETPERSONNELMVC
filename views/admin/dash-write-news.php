<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__dashboard">Rédaction Article</h2>
    <div class="separator"></div>

    <div class="container text-white d-flex justify-content-center">
        <form action="" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="inputTitle" class="form-label title__label">Titre</label>
                <input type="text" class="form-control" id="inputTitle" name="title">
            </div>
            <div class="col-md-6">
                <label for="formFileSm" class="form-label title__label">Couverture de l'Article</label>
                <input class="form-control" id="formFileMd" type="file" name="news_img">
            </div>
            <div class="col-12">
                <label for="inputContent" class="form-label title__label">Contenu</label>
                <textarea class="form-control" id="inputContent" rows="5" name="content"></textarea>
            </div>
            <div class="col-12 text-center mt-5">
                <button type="submit" class="btn btn__color">Publier</button>
            </div>
        </form>
    </div>