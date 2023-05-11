<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <link rel="stylesheet" href="{{ asset('css/styles.index.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/alertify.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/themes/bootstrap.css') }}"/>
    <script src="{{ asset('scripts/alertify.min.js') }}"></script>
    <title>Game - UNO</title>
</head>

<body>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>


<div class="logo"></div>
<div class="card" id="loginCard">
    <div class="card__header">
        <h2>Se connecter...</h2>
        <i>Merci de remplir les champs ci-dessous</i>
    </div>
    <div class="card__body">
        @CSRF
        <form method="POST" action="/user/auth">
            <div class="form__group">
                <input type="text" name="username" placeholder="Entrez votre nom d'utilisateur" class="form-input" required/>
            </div>
            <div class="form__group">
                <input type="password" name="password" placeholder="Entrez votre mot de passe" class="form-input" required/>
            </div>
            <div class="form__group form__button">
                <button type="submit" class="button">Valider</button>
                <a href="#" onclick="clickButton();" class="register">S'inscrire gratuitement</a>
            </div>
        </form>
    </div>
</div>

<div class="card" id="registerCard" style="display: none">
    <div class="card__header">
        <h2>S'inscrire gratuitement...</h2>
        <i>Merci de remplir les champs ci-dessous</i>
    </div>
    <div class="card__body">
        @CSRF
        <form method="POST" action="/user/signup">
            <div class="form__group">
                <input type="text" name="username" placeholder="Choisir un nom" class="form-input" required/>
            </div>
            <div class="form__group">
                <input type="password" name="password" placeholder="Choisir un mot de passe" class="form-input" required/>
            </div>
            <div class="form__group form__button">
                <button type="submit" class="button-second">Valider l'inscription</button>
                <a href="#" onclick="clickButton()" class="back-button">Retour</a>
            </div>
        </form>
    </div>
</div>

@if ($errors->any())
    <script type="text/javascript">
        alertify.error('{{$errors->first()}}');
    </script>
@endif

@if (session()->has('success'))
    <script type="text/javascript">
        alertify.success('{{ session()->get('success') }}');
    </script>
@endif

<script type="text/javascript" src="{{ asset('scripts/index.js') }}"></script>
</body>
</html>
