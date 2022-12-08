<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn bg-dark rounded-pill shadow-sm px-2 mb-4"><i class="uil uil-maximize-left button__icon"></i></button>
    <h2 class="display-4 title__dashboard">Modifier les rôles</h2>
    <div class="separator"></div>

    <div class="container text-white d-flex flex-column justify-content-center ">
    <?php
    if (SessionFlash::exist()) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
        </div>
    <?php } ?>
        <form action="" method="POST">
            <div class="row">
                <div class="col-6 text-center">
                    <select class="form-select" aria-label="Default select example" name="id">
                        <?php
                        foreach ($users as $user) { ?>
                            <option value="<?= $user->id_users ?>"><?= $user->user_name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-6 text-center">
                    <select class="form-select" name="role">
                        <option value="3">Utilisateur</option>
                        <option value="2">Rédacteur</option>
                        <option value="1">Administrateur</option>
                    </select>
                </div>
                <div class="col-12 text-center mt-5">
                    <button type="submit" class="btn btn__color">Modifier le rôle</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container text-white d-flex justify-content-center mt-3 ">
        <div class="col-6 text-center">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Administrateurs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($admins as $admin) { ?>
                            <tr>
                            <td><?= $admin->user_name ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>

        <div class="col-6 text-center">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Rédacteurs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($writers as $writer) { ?>
                            <tr>
                            <td><?= $writer->user_name ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>