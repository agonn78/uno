<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/styles.profile.css') }}">
    <title>Mon profil - {{ $username }}</title>
</head>

<body>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>

<div class="section">
    <div class="card card__user">
        <div class="logo"></div>
        <div class="user__stats">
            <ul>
                <li style="font-size: 20px; opacity: 1">{{ $username }}</li>
                <li>Classement global : <b>1er</b></li>
                <li>Dernière connexion : {{ $user->updated_at->format("d-m-Y") }}</li>
                <li>
                    <a href="/user/logout">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="card card__scoreboard">

    </div>
</div>

<div class="section">
    <div class="card card__games">

    </div>
</div>
</body>
</html>
