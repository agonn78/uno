const socket = io("http://134.59.143.33:8081");

class Card {
    constructor(value, color, type) {
        this.value = value;
        this.color = color;
        this.type = type;
    }

    getValue() {
        return this.value;
    }

    getColor() {
        return this.color;
    }

    getType() {
        return this.type;
    }

    setValue(value) {
        this.value = value;
    }

    setColor(color) {
        this.color = color;
    }

    setType(type) {
        this.type = type;
    }
}

function getValueStringToInteger(value)
{
    if (value === "ONE")
        return 1;
    else if (value === "TWO")
        return 2;
    else if (value === "THREE")
        return 3;
    else if (value === "FOUR")
        return 4;
    else if (value === "FIVE")
        return 5;
    else if (value === "SIX")
        return 6;
    else if (value === "SEVEN")
        return 7;
    else if (value === "EIGHT")
        return 8;
    else if (value === "NINE")
        return 9;
    else if (value === "ZERO")
        return 0;
    return 0;
}

let rightSeatBusy = false;
let leftSeatBusy = false;
let topSeatBusy = false;
let bottomSeatBusy = false;

let rightSeatPlayer = 0;
let leftSeatPlayer = 0;
let topSeatPlayer = 0;

let playersTab = [];
let nbPlayers = 0;
let started = false;

let mainPlayerCards = [];
let leftPlayerCards = 0;
let rightPlayerCards = 0;
let topPlayerCards = 0;

socket.on('connect', () => {
    console.log('Connected to server');
});

window.addEventListener('beforeunload', function (e) {
    socket.emit('leavePlayer', [gameId, playerId]);
    e.returnValue = 'Reload';
});

var getPlayers = function(uuid) {
    socket.emit('ask-players', uuid);
}

getPlayers(gameId);


/* Get players from the game */
socket.on('get-players', (players, game) => {

    for(let i = 0; i < players.length; i++) {
        playersTab.push(players[i]);
        nbPlayers++;
    }

    console.log(playersTab);
    console.log(game);

    /* Place the players on the table */
    for(let i = 0; i < playersTab.length; i++) {

        if (playersTab[i]["uuid"] === playerId)
        {
            placePlayer(playersTab[i]["username"], "bottom");
            bottomSeatBusy = true;
        }

        else
        {
            if (topSeatBusy === false)
            {
                placePlayer(playersTab[i]["username"], "top");
                topSeatPlayer = i;
                topSeatBusy = true;
            }

            else if (leftSeatBusy === false)
            {
                placePlayer(playersTab[i]["username"], "left");
                leftSeatPlayer = i;
                leftSeatBusy = true;
            }

            else if (rightSeatBusy === false)
            {
                placePlayer(playersTab[i]["username"], "right");
                rightSeatPlayer = i;
                rightSeatBusy = true;
            }
        }
    }


    if (game["state"] === "PLAYING") {
        topPlayerCards = game["users"][topSeatPlayer]["nbCards"];
        leftPlayerCards = game["users"][leftSeatPlayer]["nbCards"];
        rightPlayerCards = game["users"][rightSeatPlayer]["nbCards"];
        updateCards();
    }

    if (game["state"] === "WAITING")
        update();
});

let placePlayer = function(username, seat)
{
    document.getElementById("" + seat +"__seat__h3").innerHTML = username;
}


/* When a player join the game */
socket.on('playerJoined', (player) => {
    console.log("Un joueur a rejoint la partie:" + player);
    playersTab.push(player);
    nbPlayers++;

    /* Place the player on the table */
    if (topSeatBusy === false)
    {
        placePlayer(player, "top");
        topSeatPlayer = playersTab.length - 1;
        topSeatBusy = true;
    }

    else if (leftSeatBusy === false)
    {
        placePlayer(player, "left");
        leftSeatPlayer = playersTab.length - 1;
        leftSeatBusy = true;
    }

    else if (rightSeatBusy === false)
    {
        placePlayer(player, "right");
        rightSeatPlayer = playersTab.length - 1;
        rightSeatBusy = true;
    }

    update();
});

function update()
{
    if (nbPlayers > 1)
    {
        let buttonStarted = document.getElementById("started__button");
        if (buttonStarted !== null)
        {
            buttonStarted.style.display = "block";
        }
    }
    else
    {
        let buttonStarted = document.getElementById("started__button");
        if (buttonStarted !== null)
        {
            buttonStarted.style.display = "none";
        }
    }
}

function updateCards()
{
    if (topSeatBusy)
    {
        if (topPlayerCards > 0)
        {
            for (let i = 0; i < topPlayerCards; i++)
            {
                let card = document.createElement("div");
                let span = document.createElement("span");
                let mark = document.createElement("span");
                card.className = "card";
                card.classList.add("black");
                span.className = "inner";
                mark.className = "mark";
                mark.classList.add("hidden");
                mark.innerHTML = "_";

                card.appendChild(span);
                span.appendChild(mark);
                document.getElementById("player__topseat__cards").appendChild(card);
            }
        }
    }

    if (leftSeatBusy)
    {
        if (leftPlayerCards > 0)
        {
            for (let i = 0; i < topPlayerCards; i++)
            {
                let card = document.createElement("div");
                let span = document.createElement("span");
                let mark = document.createElement("span");
                card.className = "card";
                card.classList.add("black");
                span.className = "inner";
                mark.className = "mark";
                mark.classList.add("hidden");
                mark.innerHTML = "_";

                card.appendChild(span);
                span.appendChild(mark);
                document.getElementById("player__leftseat").appendChild(card);
            }
        }
    }

    if (rightSeatBusy)
    {
        if (rightPlayerCards > 0)
        {
            for (let i = 0; i < topPlayerCards; i++)
            {
                let card = document.createElement("div");
                let span = document.createElement("span");
                let mark = document.createElement("span");
                card.className = "card";
                card.classList.add("black");
                span.className = "inner";
                mark.className = "mark";
                mark.classList.add("hidden");
                mark.innerHTML = "_";

                card.appendChild(span);
                span.appendChild(mark);
                document.getElementById("player__rightseat").appendChild(card);
            }
        }
    }


    if (bottomSeatBusy)
    {
        if (mainPlayerCards.length > 0)
        {
            for (let i = 0; i < mainPlayerCards.length; i++)
            {
                let card = document.createElement("div");
                let span = document.createElement("span");
                let mark = document.createElement("span");
                card.className = "card";
                card.classList.add("my-card");
                card.classList.add("num-"+ getValueStringToInteger(mainPlayerCards[i].value));
                let color = String(mainPlayerCards[i].color);
                card.classList.add(color.toLowerCase());
                span.className = "inner";
                mark.className = "mark";
                mark.style.backgroundColor = "#fff";
                mark.innerHTML = "" + getValueStringToInteger(mainPlayerCards[i].value) + "";

                card.appendChild(span);
                span.appendChild(mark);
                document.getElementById("bottom__seat").appendChild(card);
            }
        }
    }
}

let buttonStarted = document.getElementById("started__button");
if (buttonStarted != null) {

    buttonStarted.addEventListener("click", function () {

        if (started === false) {
            started = true;
            buttonStarted.style.display = "none";
            console.log("Game started");
            socket.emit('start-game', gameId);
        }
    });
}

socket.on('gameStarted', (game) => {

    console.log(game);
    topPlayerCards = game["users"][topSeatPlayer]["nbCards"];
    leftPlayerCards = game["users"][leftSeatPlayer]["nbCards"];
    rightPlayerCards = game["users"][rightSeatPlayer]["nbCards"];

    /* Add cards from the main player */
    for (let i = 0; i < game["users"].length; i++)
    {
        if (game["users"][i]["uuid"] === playerId)
        {
            for (let y = 0; y < game["users"][i]["hand"].length; y++)
            {
                let color = String(game["users"][i]["hand"][y]["color"]);
                let value = String(game["users"][i]["hand"][y]["value"]);
                let type = String(game["users"][i]["hand"][y]["type"]);
                mainPlayerCards.push(new Card(value, color, type));
            }
        }
    }

    updateCards();
});
