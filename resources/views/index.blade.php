<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/styles.index.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uno.. Dos.. Tres - Games</title>
</head>
<body>

<?php if ($errors->any()) { ?>
<div class="error">
    <?php foreach ($errors->all() as $error) { ?>
    <div class="error-item">
        <?php echo $error; ?>
    </div>
    <?php } ?>
</div>
<?php } ?>

<?php if (session('success')) { ?>
<div class="success">
        {{ session('success') }}
</div>
<?php } ?>


<!-- login/signup form -->
<div class="card" id="login">
    <div class="card-title">
        Bienvenue sur le site
    </div>

    <div class="card-desc">
        <i>Connectez-vous ou inscrivez-vous pour pouvoir jouer...</i>
    </div>

    <div class="sep"></div>

    <div class="card-content">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-form">
                <label>Nom d'utilisateur</label>
                <input name="username" type="text" placeholder="Entrez votre nom" class="input" required>
            </div>

            <div class="input-form">
                <label>Mot de passe</label>
                <input name="password" type="password" placeholder="Entrez votre mot de passe" class="input" required>
            </div>

            <div class="input-form">
                <button type="submit" class="btn">Se connecter</button>
                <a href="#" onclick="toggleSignup();" class="button">S'inscrire</a>
            </div>
        </form>
    </div>
</div>

<!-- signup form -->
<div class="hidden" id="signup">
    <div class="card-title">
        Inscription
    </div>

    <div class="card-desc">
        <i>Remplissez les champs ci-dessous pour vous inscrire...</i>
    </div>

    <div class="sep"></div>

    <div class="card-content">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-form">
                <label>Choisir un pseudo</label>
                <input name="username" type="text" placeholder="Entrez votre nom" class="input">
            </div>

            <div class="input-form">
                <label>Choisir un mot de passe</label>
                <input name="password" type="password" placeholder="Entrez votre mot de passe" class="input">
            </div>

            <div class="input-form">
                <button type="submit" class="btn">Valider l'inscription</button>
                <a href="#" onclick="toggleSignup();" class="button return">Retour</a>
            </div>
        </form>
    </div>
</div>

<!-- animation background -->
<canvas class="background"></canvas>

<script src="{{ asset('scripts/particles.js') }}"></script>
<script src="{{ asset('scripts/index.js') }}"></script>
</body>
</html>
