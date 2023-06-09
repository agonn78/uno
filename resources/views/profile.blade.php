<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
    <link rel="stylesheet" href=" {{ asset('css/sweetalert.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/styles.profile.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Mon profil - {{ $user->username }}</title>
</head>

<script type="text/javascript">
    function createGame() {
        Swal.fire({
            title: 'Créer une partie',
            input: 'password',
            inputLabel: 'Mot de passe de la partie (falcultatif)',
            inputPlaceholder: 'Mot de passe',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Créer',
            showLoaderOnConfirm: true,
            preConfirm: (password) => {
                if (password === null || password === undefined || password === "")
                    password = "none";
                $.ajax({
                    header: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'http://134.59.143.33:8080/create',
                    type: 'POST',
                    data: {
                        username: '{{ $user->username }}',
                        uuid: '{{ $user->uuid }}',
                        password: password
                    },
                    success: function (data) {
                        if (data === "error") {
                            alert("Vous avez déjà une partie en cours !");
                            return;
                        }
                        window.location.href = "http://134.59.143.33:8000/game/" + data;
                    }
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
        /*$.ajax({
            header: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'http://134.59.143.33:8080/create',
            type: 'POST',
            data: {
                username: '{{ $user->username }}',
                uuid: '{{ $user->uuid }}',
            },
            success: function (data) {
                if (data === "error") {
                    alert("Vous avez déjà une partie en cours !");
                    return;
                }
                window.location.href = "http://134.59.143.33:8000/game/" + data;
            }
        });*/
    }

    function joinGame(game) {
        if (game['password'] !== "") {
            Swal.fire({
                title: 'Mot de passe',
                input: 'password',
                inputLabel: 'Mot de passe de la partie',
                inputPlaceholder: 'Mot de passe',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Rejoindre',
                showLoaderOnConfirm: true,
                preConfirm: (password) => {
                    if (password === game['password']) {
                        $.ajax({
                            url: 'http://134.59.143.33:8080/games/' + game['id'] + '/join',
                            type: 'POST',
                            data: {
                                username: '{{ $user->username }}',
                                uuid: '{{ $user->uuid }}',
                            },
                            success: function (data) {
                                if (data === "error") {
                                    alert("Une erreur est survenue! (Code 0x001) !");
                                    return;
                                }

                                window.location.href = "http://134.59.143.33:8000/game/" + game['id'];
                            }
                        });
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Mot de passe incorrect !',
                        });
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        } else {

            $.ajax({
                url: 'http://134.59.143.33:8080/games/' + game['id'] + '/join',
                type: 'POST',
                data: {
                    username: '{{ $user->username }}',
                    uuid: '{{ $user->uuid }}',
                },
                success: function (data) {
                    if (data === "error") {
                        alert("Une erreur est survenue! (Code 0x001) !");
                        return;
                    }

                    window.location.href = "http://134.59.143.33:8000/game/" + game['id'];
                }
            });

            return 0;
        }
    }
</script>

<body>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>

<div class="section">
    <div class="card card__user">
        <form id="uploadForm" style="display: none;" action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" id="imageInput" accept="image/jpeg, image/png">
        </form>
        <div class="logo" style="
        background-image:url({{ asset('images/'.$user->image) }});" id="chooseAvatar"></div>
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
                        <li>Parties jouées : {{ $scoreboard->first()->games_played }}</li>
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
                            <li>Parties jouées : {{ $player->games_played }}</li>
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
                <a href="#" onclick="createGame();">Créer une partie</a>
            </div>
        </div>

        <div class="card__games__body">

                @foreach($games as $game)
                    <div class="card__games__list">
                    <div class="card__games__list__img"></div>
                    <div class="card__games__list__text">
                        <div style="font-size:16px;">Partie de {{ $game['owner']['username'] }}</div>
                        <div class="card__games__list__text">{{ $game['nbPlayers'] }} joueurs dans la partie</div>
                        <div class="card__games__list__text">
                            <?php
                                $status = $game['state'];
                                $gameStateLabel = match($status) {
                                    'PLAYING' => 'En cours',
                                    'FINISHED' => 'Terminée',
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
                    <div class="card__games__join">
                        <a href="javascript:void(0);" onclick="joinGame({{ json_encode($game) }})">Rejoindre</a>
                    </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>
</body>


<script type="text/javascript">
    document.getElementById("chooseAvatar").addEventListener('click', function() {
        document.getElementById('imageInput').click();
    });

    document.getElementById('imageInput').addEventListener('change', function() {
        document.getElementById('uploadForm').submit();
    });

    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var form = event.target;
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var logoElement = document.querySelector('.logo');
                    logoElement.style.backgroundImage = 'url(' + data.image + ')';
                    // Autres mises à jour nécessaires après le changement d'image
                } else if (data.error) {
                    console.log(data.error);
                }
            })
            .catch(error => console.log(error));
    });
</script>

<script src="{{ asset('scripts/sweetalert.js') }}"></script>
</html>
