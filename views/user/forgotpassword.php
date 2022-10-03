<div class="container">
        <div class="container_left">
            <div class="title">Mot de passe oublié ?</div>
            <form action="" novalidate method="POST" class="forgetPassword_Form">
                <div class="subtitle">Veuillez renseigner votre adresse mail</div>
                    <label for="email" class="form-label">Email *</label>
                        <input value="<?= $email ?? '' ?>" name="email" type="email" id="email" class="form-input" required>
                        <p class="input-error-text" id="emailTextError"><?= $errorEmail ?? '' ?></p>
                    <button type="subtmit" class="btnRegister">Se connecter</button>
            <form>        
        </div>
</div>