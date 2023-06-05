<!doctype html>
<html lang="fr">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('scripts/socket.io.js') }}"></script>
    <script src="{{ asset('scripts/game.js') }}"></script>
    <title>Uno</title>
</head>

<script type="text/javascript">

    getPlayers("{{ $uuid }}");
</script>
<body>

<ul id="players">

</ul>

</body>
</html>
