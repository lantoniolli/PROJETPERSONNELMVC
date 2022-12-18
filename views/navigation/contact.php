<div class="containerPage">
    <div class="py-5">
        <div class="container py-5">
            <h5 class="divider mb-5">Contactez-nous</h5>
            <div class="contact-form-wrapper d-flex justify-content-center">
                <div class="col-md-6">
        
                    <p class="text-center"> <?php
                                            if (SessionFlash::exist()) { ?>
                    <div class="alert alert-light alert-dismissible fade show" role="alert">
                        <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?></p>
                <form action="" method="POST" class="contact-form">
                    <!-- INPUT PSEUDO -->
                    <div>
                        <label for="pseudo">Nom</label>
                        <input placeholder="" name="name" type="text" pattern="<?= REGEX_FOR_PSEUDO ?>" id="pseudo" class="form-control rounded-0 form-input shadow-none" required>
                        <p class="error_form" id="pseudoTextError"><?= $errors['Pseudo'] ?? '' ?></p>
                    </div>
                    <!-- INPUT ADRESSE EMAIL -->
                    <div>
                        <label for="email">Adresse Mail</label>
                        <input value="<?= $email ?? '' ?>" placeholder="xxx@exemple.fr" name="email" type="email" id="email" class="form-control rounded-0 form-input shadow-none" required>
                        <p class="error_form" id="emailTextError"><?= $errors['Email'] ?? '' ?></p>
                    </div>
                    <!-- INPUT PASSWORD -->
                    <div>
                        <label for="inputContent" class="form-label title__label">Message</label>
                        <textarea class="form-control rounded-0 form-input shadow-none" name="content" value="<?= $content ?? '' ?>"></textarea>
                    </div>
                    <div class="submit-button-wrapper mt-5">
                        <input type="submit" value="Nous contacter">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>