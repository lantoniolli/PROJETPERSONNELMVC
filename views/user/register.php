<!-- Formulaire vérifié fonctionnel -->
<?php
if (SessionFlash::exist()) { ?>
    <?= SessionFlash::get('Error'); ?>
<?php } ?>

<div class="containerPage">
    <div class="py-5">
    <div class="container py-5">
        <h5 class="divider mb-5">Formulaire d'inscription</h5>
        <div class="contact-form-wrapper d-flex justify-content-center">
            <form action="" method="POST" class="contact-form">
                <!-- INPUT PSEUDO -->
                <div>
                    <label for="pseudo">Pseudo *</label>
                    <input value="<?= $pseudo ?? '' ?>" placeholder="" name="pseudo" type="text" pattern="<?= REGEX_FOR_PSEUDO ?>" id="pseudo" class="form-control rounded-0 form-input shadow-none" required>
                    <p class="error_form" id="pseudoTextError"><?= $errors['Pseudo'] ?? '' ?></p>
                </div>
                <!-- INPUT ADRESSE EMAIL -->
                <div>
                    <label for="email">Adresse Mail *</label>
                    <input value="<?= $email ?? '' ?>" placeholder="xxx@exemple.fr" name="email" type="email" id="email" class="form-control rounded-0 form-input shadow-none" required>
                    <p class="error_form" id="emailTextError"><?= $errors['Email'] ?? '' ?></p>
                </div>
                <!-- INPUT PASSWORD -->
                <div>
                    <label for="email">Mot de Passe *</label>
                    <input type="password" name="password" id="password" placeholder="8 caractères" pattern="<?= REGEX_FOR_PASSWORD ?>" class="form-control rounded-0 form-input shadow-none" required><span class="input-group-btn">
                    <p class="error_form" id="errorPassword"><?= $errors['Password'] ?? '' ?></p>
                </div>
                <div>
                    <label for="email">Confirmation du Mot de Passe *</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="8 caractères" pattern="<?= REGEX_FOR_PASSWORD ?>" class="form-control rounded-0 form-input shadow-none" required>
                    <p class="error_form" id="errorConfirmPassword"><?= $error['ConfirmPassword'] ?? '' ?></p>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="conditions" required>
                    <label class="form-check-label" for="inlineCheckbox1">Conditions Générales</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="cgu" required>
                    <label class="form-check-label" for="inlineCheckbox2">CGU</label>
                </div>
                <p class="forgot_password text-center">Déjà inscrit ? <a href="/controllers/loginController.php">Se Connecter</a></p>
                <p class="error_form" id="errorPassword"><?= $errors['conditions'] ?? '' ?></p>
                <p class="error_form" id="errorPassword"><?= $errors['cgu'] ?? '' ?></p>
                <div class="submit-button-wrapper">
                    <input type="submit" value="S'inscrire">
                </div>
            </form>
        </div>
    </div>
</div>
</div>