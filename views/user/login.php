<title>FWR | Connexion</title>
</head>

<body>
    <!-- Emplacement de la navbar. -->

    <div class="container_form">
        <h1 class="title_form">Connexion</h1>
        <form action="" novalidate method="POST" class="registerForm">
            <div class="input_form">

                <!-- INPUT ADRESSE EMAIL -->
                <label for="email">Email</label>
                <input value="<?= $email ?? '' ?>" placeholder="xxx@exemple.fr" name="email" type="email" id="email" required>
                <p class="error_form" id="emailTextError"><?= $errorEmail ?? '' ?></p>
                

                <!-- INPUT PASSWORD -->
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="8 caractères" pattern="<?= REGEX_FOR_PASSWORD ?>" required>
                <p class="error_form" id="emailTextError"><?= $errorPassword ?? '' ?></p>
                <p class="forgot_password"><a href="#">Mot de passe oublié ?</a></p>

                <!-- SUBMIT BUTTON -->
                <button type="submit" class="btnRegister">Se connecter</button>
                <!-- FORGOT PASSWORD -->
            </div>
        </form>
    </div>