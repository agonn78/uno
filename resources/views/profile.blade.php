<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/styles.profile.css') }}" />
    <title>Mon profil - </title>
</head>
<body>
<div class="shadow">
    <div class="bend">
        <h2>Bonjour, {{ $username }}</h2>
        <h3>Choisissez le jeu auquel vous voulez jouer</h3>
        <a href="{{ route('logout') }}">Se déconnecter</a>
    </div>

    <div class="games">
        <div class="card" id="uno" onclick="javascript:void(1);">
            <div class="card__content">
                <div class="card__title">UNO: THE GAME</div>
                <div class="card__subtitle">
                    1 à 5 joueurs
                </div>
                <p class="card__description">
                    Créé en 1971. Rejouez au meilleur jeu de cartes à plusieurs. Cliquez pour jouer
                </p>
            </div>
        </div>

        <div class="card" id="belote">
            <div class="card__content">
                <div class="card__title">BELOTE</div>
                <div class="card__subtitle">
                    En développement
                </div>
                <p class="card__description">
                    Malheureusement, la belote est toujours en cours de développement
                </p>
            </div>
        </div>

        <div class="card" id="snake">
            <div class="card__content">
                <div class="card__title">SNAKE</div>
                <div class="card__subtitle">
                    En développement
                </div>
                <p class="card__description">
                    Malheureusement, le snake est toujours en cours de développement
                </p>
            </div>
        </div>
    </div>
</div>

<!-- animation background -->
<canvas class="background"></canvas>

<script src="{{ asset('scripts/particles.js') }}"></script>
<script src="{{ asset('scripts/animation.js') }}"></script>
</body>
</html>