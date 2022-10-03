<div class="container">
        <div class="container_left">
            <div class="title">Connexion</div>
            <form action="" novalidate method="POST" class="registerForm">
                <div class="subtitle">Remplir les champs</div>
                    <label for="email" class="form-label">Email *</label>
                        <input value="<?= $email ?? '' ?>" name="email" type="email" id="email" class="form-input">
                        <p class="input-error-text" id="emailTextError"><?= $errorEmail ?? '' ?></p>

                        <label for="password">Mot de passe : <p><?php echo $errorPassword ?? '' ?></p></label>
                        <input type="password" name="password" id="password" pattern="<?= REGEX_FOR_PASSWORD ?>" required>

                    <button type="subtmit" class="btnRegister">Se connecter</button>
            <form>        
        </div>
</div>