<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/styles.profile.css') }}">
    <title>Mon profil - {{ $user->username }}</title>
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
                <li style="font-size: 20px; opacity: 1">{{ $user->username }}</li>
                <?PHP
                    $userKey = $scoreboard->pluck('id')->search($user->id);
                    $userPosition = $userKey !== false ? $userKey + 1 : null;
                ?>
                <li>Classement global : <b>{{ $userPosition }}</b></li>
                <li>Dernière connexion : {{ $user->updated_at->format("d-m-Y") }}</li>
                <li>
                    <a href="/user/logout">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="card card__scoreboard">
        <div class="card__title">Classement global</div>
        <div class="card__content">
            <div class="card__content__player">
                <div class="card__content__player__medail"></div>
                <div class="card__content__player__logo"></div>
                <div class="card__content__player__stats">
                    <ul>
                        <li style="font-size: 12px; font-weight: bold">{{ $scoreboard->first()->username }}</li>
                        <li>Elo : {{ $scoreboard->first()->elo }}</li>
                        <li>Parties jouées : 20</li>
                    </ul>
                </div>
            </div>

            <?php
                $filtered = $scoreboard->shift();
            ?>
            @foreach($scoreboard as $player)
                <div class="card__content__player">
                    <div class="card__content__player__logo"></div>
                    <div class="card__content__player__stats">
                        <ul>
                            <li style="font-size: 12px; font-weight: bold">{{ $player->username }}</li>
                            <li>Elo : {{ $player->elo }}</li>
                            <li>Parties jouées : 20</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="section">
    <div class="card card__games">
        <div class="card__games__title">
            <div class="card__games__title__text">Parties en ligne</div>
            <div class="card__games__title__button">
                <a href="/game/create">Créer une partie</a>
            </div>
        </div>

        <div class="card__games__body">

                @foreach($games as $game)
                    <div class="card__games__list">
                    <div class="card__games__list__img"></div>
                    <div class="card__games__list__text">
                        <div style="font-size:16px;">Partie de {{ $game['owner']['name'] }}</div>
                        <div class="card__games__list__text">{{ $game['nbPlayers'] }} joueurs dans la partie</div>
                        <div class="card__games__list__text">
                            <?php
                                $status = $game['gameState'];
                                $gameStateLabel = match($status) {
                                    'ONGOING' => 'En cours',
                                    'COMPLETED' => 'Terminée',
                                    'WAITING' => 'En attente',
                                    default => 'Inconnu'
                                    };

                                $locked = $game['password'];
                                $lockedLabel = "";
                                if (empty($locked)) $lockedLabel = "Ouverte";
                                else $lockedLabel = "Fermée"; ?>
                            {{ $gameStateLabel }} | {{ $lockedLabel }}
                        </div>
                    </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>
</body>
</html>
