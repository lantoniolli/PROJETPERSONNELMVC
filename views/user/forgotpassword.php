<title>FWR | Mot de passe perdu</title>
</head>

<body>
    <!-- Emplacement de la navbar. -->

    <div class="container_form">
        <h1 class="title_form">Mot de passe perdu</h1>
        <form action="" novalidate method="POST" class="registerForm">
            <div class="input_form">

                <!-- INPUT ADRESSE EMAIL -->
                <label for="email">Email</label>
                <input value="<?= $email ?? '' ?>" placeholder="xxx@exemple.fr" name="email" type="email" id="email" required>
                <p class="error_form" id="emailTextError"><?= $errorEmail ?? '' ?></p>

                <!-- SUBMIT BUTTON -->
                <button type="submit" class="btnRegister">Envoyer</button>
                <!-- FORGOT PASSWORD -->
            </div>
        </form>
    </div>