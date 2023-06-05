const socket = io("http://localhost:8081");

socket.on('connect', () => {
    console.log('Connected to server');
});

var getPlayers = function(uuid) {
    socket.emit('get-players', uuid);
}

socket.on('get-players', (players) => {
    console.log(players);
})
