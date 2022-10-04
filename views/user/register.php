<title>FWL | Inscription</title>
</head>

<body>
    <!-- Emplacement de la navbar. -->

    <div class="container_form">
        <h1 class="title_form">Inscription</h1>
        <form action="" novalidate method="POST" class="registerForm">
            <div class="input_form">
                <!-- INPUT DU NOM -->
                <label for="lastname">Pseudo *</label>
                <input value="<?= $lastname ?? '' ?>" name="lastname" id="lastname" pattern="<?= REGEX_FOR_PSEUDO ?>" type="text" placeholder="Votre nom ici" required>
                <p class="error_form" id="lastnameTextError"><?= $errorName ?? '' ?></p>

                <!-- INPUT ADRESSE EMAIL -->
                <label for="email">Email *</label>
                <input value="<?= $email ?? '' ?>" placeholder="xxx@exemple.fr" name="email" type="email" id="email" required>
                <p class="error_form" id="emailTextError"><?= $errorEmail ?? '' ?></p>

                <!-- INPUT PASSWORD -->
                <label for="password">Mot de passe<p><?php echo $errorPassword ?? '' ?></p></label>
                <input type="password" name="password" id="password" placeholder="8 caractères" pattern="<?= REGEX_FOR_PASSWORD ?>" required>

                <!-- INPUT CONFIRM PASSWORD -->
                <label for="confirmPassword">Confirmer le mot de passe
                    <p><?php echo $errorConfirmPassword ?? '' ?></p>
                </label>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="********" pattern="<?= REGEX_FOR_PASSWORD ?>" required>
                <!-- SUBMIT BUTTON -->
                <button type="submit" class="btnRegister">S'inscrire</button>
            </div>
        </form>
    </div>