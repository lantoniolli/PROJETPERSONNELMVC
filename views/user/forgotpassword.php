<div>
    <div class="page-content p-5" id="content">
    <div class="contact-form-wrapper d-flex justify-content-center">
        <form action="#" novalidate method="POST" class="contact-form">
            <h5 class="title mb-5">Réinitialiser son MDP</h5>
            <!-- INPUT ADRESSE EMAIL -->
            <div>
                <label for="email">Adresse Mail</label>
                <input value="<?= $email ?? '' ?>" placeholder="xxx@exemple.fr" name="mail" type="email" id="email" class="form-control mb-3 rounded-0 form-input shadow-none" required>
            </div>
            <div class="submit-button-wrapper">
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>
    </div>
</div>