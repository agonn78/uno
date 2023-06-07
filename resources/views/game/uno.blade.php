<!doctype html>
<html lang="fr">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('scripts/socket.io.js') }}"></script>
    <script src="{{ asset('scripts/game.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/uno.css') }}">
    <title>Uno</title>
</head>

<script type="text/javascript">

    getPlayers("{{ $uuid }}");
</script>
<body>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>
<div class="ellipse"></div>

<div class="game__field">

    <div class="row">
        <div class="col center__card__hands">
            <div id="player__topseat"><h3>Ewan</h3></div>
            <div id="player__topseat__cards">
                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-2">
            <div id="player__leftseatid">
                <h3>Player 1</h3>
            </div>
            <div id="player__leftseat" class="side__hand">
                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>

                <div class="card black">
                    <span class="inner">
                        <span class="mark hidden">_</span>
                    </span>
                </div>
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
    </div>
</div>

</body>
</html>
