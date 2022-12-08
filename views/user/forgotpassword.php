<div class="py-5">
    <div class="container py-5">
        <?php
        if (SessionFlash::exist()) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="uil uil-check-circle"></i><?= SessionFlash::get(); ?>
            </div>
        <?php } ?>
        <h5 class="divider mb-5">Modifier son mot de passe</h5>
        <div class="contact-form-wrapper d-flex justify-content-center">
            <form action="#" novalidate method="POST" class="contact-form">
                <!-- INPUT ANCIEN MOT DE PASSE -->
                <div>
                    <label for="email">Ancien mot de passe</label>
                    <input type="password" name="oldPassword" id="password" placeholder="8 caractères" pattern="<?= REGEX_FOR_PASSWORD ?>" class="form-control rounded-0 form-input shadow-none" required>
                    <p class="error_form" id="errorPassword"><?= $errors['oldPassword'] ?? '' ?></p>
                    
                </div>
                <!-- INPUT ADRESSE EMAIL -->
                <div>
                    <label for="email">Nouveau mot de passe</label>
                    <input type="password" name="newPassword" id="password" placeholder="8 caractères" pattern="<?= REGEX_FOR_PASSWORD ?>" class="form-control rounded-0 form-input shadow-none" required>
                    <p class="error_form" id="errorPassword"><?= $errors['newPassword'] ?? '' ?></p>
                </div>
                <div>
                    <label for="email">Confirmation du mot de passe</label>
                    <input type="password" name="confirmPassword" id="password" placeholder="8 caractères" pattern="<?= REGEX_FOR_PASSWORD ?>" class="form-control rounded-0 form-input shadow-none" required>
                    <p class="error_form" id="errorPassword"><?= $errors['confirmPassword'] ?? '' ?></p>
                </div>
                <div class="submit-button-wrapper">
                    <input type="submit" value="modifier">
                </div>
            </form>
        </div>
    </div>
</div>