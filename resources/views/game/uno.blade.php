<!doctype html>
<html lang="fr">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('scripts/socket.io.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/alertify.css') }}"/>
    <script src="{{ asset('scripts/alertify.min.js') }}"></script>
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{ asset('css/uno.css') }}">
    <title>Uno</title>
</head>
<body>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>

<div class="game__field">

    <div class="row">
        <div class="col center__card__hands">
            <div id="player__topseat__id"><h3 id="top__seat__h3">Waiting player 1</h3></div>
            <div id="player__topseat__cards">

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-2">
            <div id="player__leftseatid">
                <h3 id="left__seat__h3"></h3>
            </div>
            <div id="player__leftseat" class="side__hand">

            </div>
        </div>
        <div class="col-md-8 center__card__hands" align="center">
            <div class="row ptb50">
                <div class="col pr200">

                    <!-- decks -->
                    <div class="card black rotate">
                        <span class="inner">
                            <span class="mark hidden">_</span>
                        </span>
                        <div id="cardDeckPile"></div>
                    </div>
                </div>

                <div class="col">
                    <div id="button__uno">
                        <button class="btn btn-primary">UNO!!</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="card__played">
                    <div class="card black">
                        <span class="inner">
                            <span class="mark hidden">_</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div id="player__rightseat__id">
                <h3 id="right__seat__h3"></h3>
            </div>
            <div id="player__rightseat" class="side__hand">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col center__card__hands" align="center">
            <div id="bottom__seat__id">
                <h3 id="bottom__seat__h3" class="active">Player</h3>
            </div>
            <div id="bottom__seat">
                @if ($game['owner']['username'] === $user->username)
                    <button id="started__button" style="display:none" class="btn btn-primary">Start the game</button>
                @endif
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    let playerId = "{{ $playerUuid }}";
    let gameId = "{{ $uuid }}";
</script>
<script src="{{ asset('scripts/game.js') }}"></script>
</body>
</html>
