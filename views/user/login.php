    <div>
    <div class="page-content p-5" id="content">
    <div class="contact-form-wrapper d-flex justify-content-center">
        <form action="#" novalidate method="POST" class="contact-form">
            <h5 class="title mb-5">Se Connecter</h5>
            <!-- INPUT ADRESSE EMAIL -->
            <div>
                <label for="email">Adresse Mail</label>
                <input value="<?= $email ?? '' ?>" placeholder="xxx@exemple.fr" name="email" type="email" id="email" class="form-control mb-3 rounded-0 form-input shadow-none" required>
            </div>
            <!-- INPUT PASSWORD -->
            <div>
            <label for="email">Adresse Mail</label>
            <input type="password" name="password" id="password" placeholder="8 caractères" pattern="<?= REGEX_FOR_PASSWORD ?>" class="form-control mb-3 rounded-0 form-input shadow-none" required>
            <p class="error_form" id="emailTextError"><?= $errorPassword ?? '' ?></p>
                <p class="forgot_password text-center"><a href="/controllers/forgetPasswordCtrl.php">Mot de passe oublié ?</a></p>
            </div>
            <div class="submit-button-wrapper">
                <input type="submit" value="Se Connecter">
            </div>
        </form>
    </div>
    </div>
</div>