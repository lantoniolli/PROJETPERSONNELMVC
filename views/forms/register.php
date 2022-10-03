<title>Formulaire d'inscription.</title>
</head>

<body>
    <!-- Emplacement de la navbar. -->
    <div class="container">
        <div class="container_left">
            <h1>Inscription</h1>
            <form action="" novalidate method="POST" class="registerForm">
                <div class="subtitle">Remplir les champs</div>
                <div class="input_form">
                    <!-- INPUT DU NOM -->
                    <label for="lastname" class="details">Nom</span>
                        <input value="<?= $lastname ?? '' ?>" name="lastname" id="lastname" pattern="<?= REGEX_FOR_PSEUDO ?>" type="text" placeholder="Votre nom ici">
                        <p class="input-error-text" id="lastnameTextError"><?= $errorName ?? '' ?></p>

                    <!-- INPUT ADRESSE EMAIL -->
                    <label for="email" class="form-label">Email *</label>
                        <input value="<?= $email ?? '' ?>" name="email" type="email" id="email" class="form-input">
                        <p class="input-error-text" id="emailTextError"><?= $errorEmail ?? '' ?></p>

                        <label for="password">Mot de passe : <p><?php echo $errorPassword ?? '' ?></p></label>
                        <input type="password" name="password" id="password" pattern="<?= REGEX_FOR_PASSWORD ?>" required>

                        <label for="confirmPassword">Confirmer le mot de passe : <p><?php echo $errorConfirmPassword ?? '' ?></p></label>
                        <input type="password" name="confirmPassword" id="confirmPassword" pattern="<?= REGEX_FOR_PASSWORD ?>" required>
                </div>

                <div class="checkbox">
                    <div class="forgetPassword">Mot de passe oublié ?</div>
                </div>
                <button type="submit" class="btnRegister">S'inscrire</button>
                </div>
            </form>
        </div>
