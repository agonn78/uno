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

function createSpecificCard(value, color, type, self)
{
    let card = document.createElement("div");
    if (value === "NONE")
    {
        if (type === "SKIP")
        {
            card.classList.add("card");
            card.classList.add("skip");
            card.classList.add(color.toLowerCase());
            if (self) card.classList.add("my-card");

            let inner = document.createElement("span");
            inner.classList.add("inner");

            let span = document.createElement("span");
            span.classList.add("mark");
            span.innerHTML = "⊘";
            span.style.backgroundColor = "white";

            inner.appendChild(span);
            card.appendChild(inner);
            return card;
        }
        else if (type === "DRAW_TWO")
        {
            card.classList.add("card");
            card.classList.add("draw2");
            card.classList.add(color.toLowerCase());
            if (self) card.classList.add("my-card");

            let inner = document.createElement("span");
            inner.classList.add("inner");

            let span = document.createElement("span");
            span.classList.add("mark");
            span.style.color = "white";
            span.style.backgroundColor = "white";
            span.style.textShadow = "rgb(255,255,255) 1px 1px 1px";
            span.innerHTML = "_";
            inner.appendChild(span);

            let div = document.createElement("div");
            div.classList.add("card__inner__plus2");
            div.classList.add("card-plus2-bottom-left");

            let spandiv = document.createElement("span");
            spandiv.classList.add("inner");

            div.appendChild(spandiv);
            span.appendChild(div);

            let div2 = document.createElement("div");
            div2.classList.add("card__inner__plus2");
            div2.classList.add("card-plus2-top-right");

            let spandiv2 = document.createElement("span");
            spandiv2.classList.add("inner");

            div2.appendChild(spandiv2);
            span.appendChild(div2);

            card.appendChild(inner);
            return card;
        }
        else if (type === "WILD")
        {
            card.classList.add("card");
            card.classList.add("wild");
            card.classList.add("black");
            if (self) card.classList.add("my-card");

            let inner = document.createElement("span");
            inner.classList.add("inner");

            let span = document.createElement("span");
            span.classList.add("mark");
            span.style.color = "white";
            span.style.backgroundColor = "white";
            span.style.textShadow = "rgb(255,255,255) 1px 1px 1px";
            span.innerHTML = "_";

            /* circle */
            let div = document.createElement("div");
            div.classList.add("circle-container");

            let quarter1 = document.createElement("div");
            quarter1.classList.add("quarter");
            quarter1.classList.add("top-left");

            let quarter2 = document.createElement("div");
            quarter2.classList.add("quarter");
            quarter2.classList.add("top-right");

            let quarter3 = document.createElement("div");
            quarter3.classList.add("quarter");
            quarter3.classList.add("bottom-left");

            let quarter4 = document.createElement("div");
            quarter4.classList.add("quarter");
            quarter4.classList.add("bottom-right");

            let inner2 = document.createElement("span");
            inner2.classList.add("inner");

            div.appendChild(quarter1);
            div.appendChild(quarter2);
            div.appendChild(quarter3);
            div.appendChild(quarter4);
            div.appendChild(inner2);

            span.appendChild(div);
            inner.appendChild(span);
            card.appendChild(inner);
            return card;
        }
        else if (type === "WILD_DRAW_FOUR")
        {
            card.classList.add("card");
            card.classList.add("plus-4");
            card.classList.add("black");
            if (self) card.classList.add("my-card");
            let inner = document.createElement("span");
            inner.classList.add("inner");

            let span = document.createElement("span");
            span.classList.add("mark");
            span.style.color = "white";
            span.style.backgroundColor = "white";
            span.style.textShadow = "rgb(255,255,255) 1px 1px 1px";
            span.innerHTML = "_";

            /* green */
            let div = document.createElement("div");
            div.classList.add("card__inner__plus4");
            div.classList.add("card__plus4__green");
            div.classList.add("green");
            let spandiv = document.createElement("span");
            spandiv.classList.add("inner");
            div.appendChild(spandiv);

            /* blue */
            let div2 = document.createElement("div");
            div2.classList.add("card__inner__plus4");
            div2.classList.add("card__plus4__blue");
            div2.classList.add("blue");
            let spandiv2 = document.createElement("span");
            spandiv2.classList.add("inner");
            div2.appendChild(spandiv2);

            /* red */
            let div3 = document.createElement("div");
            div3.classList.add("card__inner__plus4");
            div3.classList.add("card__plus4__red");
            div3.classList.add("red");
            let spandiv3 = document.createElement("span");
            spandiv3.classList.add("inner");
            div3.appendChild(spandiv3);

            /* yellow */
            let div4 = document.createElement("div");
            div4.classList.add("card__inner__plus4");
            div4.classList.add("card__plus4__yellow");
            div4.classList.add("yellow");
            let spandiv4 = document.createElement("span");
            spandiv4.classList.add("inner");


            card.appendChild(inner);
            inner.appendChild(span);
            span.appendChild(div);
            span.appendChild(div2);
            span.appendChild(div3);
            span.appendChild(div4);

            return card;
        }
        else if (type === "REVERSE")
        {
            card.classList.add("card");
            card.classList.add("reverse");
            card.classList.add(color.toLowerCase());
            if (self) card.classList.add("my-card");

            let inner = document.createElement("span");
            inner.classList.add("inner");

            let span = document.createElement("span");
            span.classList.add("mark");
            span.innerHTML = "⇄";
            span.style.backgroundColor = "white";

            inner.appendChild(span);
            card.appendChild(inner);
            return card;
        }
    }
    return card;
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

let deck = [];
let currentPlayerId = "";

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

var addSessionId = function() {
    socket.emit('add-session-id', playerId);
}

getPlayers(gameId);
addSessionId();


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

function deleteCards(parent)
{
    var card = parent.getElementsByClassName("card");
    var cardArray = Array.from(card);
    cardArray.forEach(function(element) {
        element.remove();
    });
}

function updateCards()
{
    if (topSeatBusy)
    {
        /* delete all the cards before update */
        deleteCards(document.getElementById("player__topseat__cards"));

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
        /* delete all the cards before update */
        deleteCards(document.getElementById("player__leftseat"));

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
        /* delete all the cards before update */
        deleteCards(document.getElementById("player__rightseat"));
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
        /* delete all the cards before update */
        deleteCards(document.getElementById("bottom__seat"));
        if (mainPlayerCards.length > 0)
        {
            for (let i = 0; i < mainPlayerCards.length; i++)
            {
                if (mainPlayerCards[i].value === "NONE")
                {
                    let card = createSpecificCard(mainPlayerCards[i].value, mainPlayerCards[i].color, mainPlayerCards[i].type, true);
                    document.getElementById("bottom__seat").appendChild(card);
                }
                else {


                    let card = document.createElement("div");
                    let span = document.createElement("span");
                    let mark = document.createElement("span");
                    card.className = "card";
                    card.classList.add("my-card");
                    card.classList.add("num-" + getValueStringToInteger(mainPlayerCards[i].value));
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

    /* generate the deck */
    for (let i = 0; i < game["deck"].length; i++)
    {
        let color = String(game["deck"][i]["color"]);
        let value = String(game["deck"][i]["value"]);
        let type = String(game["deck"][i]["type"]);
        deck.push(new Card(value, color, type));
    }

    /* place the first card into the field */
    let div = document.getElementById("card__played");
    let els = div.getElementsByTagName("div");
    Array.prototype.forEach.call(els, function (el) {
       el.remove();
    });

    let firstCardColor = String(game["discardPile"][0]["color"]);
    let firstCardValue = String(game["discardPile"][0]["value"]);
    let firstCardType = String(game["discardPile"][0]["type"]);

    let d = document.createElement("div");
    d.className = "card";
    d.classList.add("num-" + getValueStringToInteger(firstCardValue));
    d.classList.add(firstCardColor.toLowerCase());
    let span = document.createElement("span");
    span.className = "inner";
    let mark = document.createElement("span");
    mark.className = "mark";
    mark.style.backgroundColor = "#fff";
    mark.innerHTML = "" + getValueStringToInteger(firstCardValue) + "";

    d.appendChild(span);
    span.appendChild(mark);
    div.appendChild(d);

    /* Check if the main player is his turn */
    if (game["currentUserPlaying"]["uuid"] === playerId)
    {
        alertify.success("C'est à vous de jouer");
    }

    updateCards();
    currentPlayerId = game["currentUserPlaying"]["uuid"];
});

/* Call when the player click on a card */
$(document).on("click", ".my-card", function () {

    if (currentPlayerId !== playerId)
    {
        alertify.error("Ce n'est pas à vous de jouer");
        return;
    }
    let cardIndex = $(".my-card").index(this);
    let card = mainPlayerCards[cardIndex];
    playCard(card);
});

/* Call when the player click on the deck */
$(document).on("click", "#cardDeckPile", function() {

    if (currentPlayerId !== playerId)
    {
        alertify.error("Ce n'est pas à vous de jouer");
        return;
    }

    if (deck.length === 0)
    {
        alertify.error("The deck is empty");
        return;
    }

    const data = {
        gameId: gameId,
        playerId: playerId
    };

    const serialize = JSON.stringify(data);
    socket.emit('draw-card', serialize);
});

socket.on('mainplayer-drawcard', (response) => {

    if (response === "ERROR")
    {
        alertify.error("Vous ne pouvez pas tirer une carte");
    }
});

socket.on('playerDrawed', (game) => {

    if (game["currentUserPlaying"]["uuid"] === playerId)
    {
        alertify.success("C'est à vous de jouer");
    }

    /* regenerate the deck */
    deck = [];
    for (let i = 0; i < game["deck"].length; i++)
    {
        let color = String(game["deck"][i]["color"]);
        let value = String(game["deck"][i]["value"]);
        let type = String(game["deck"][i]["type"]);
        deck.push(new Card(value, color, type));
    }

    mainPlayerCards = [];
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

    /* update number of opponents cards */
    topPlayerCards = game["users"][topSeatPlayer]["nbCards"];
    leftPlayerCards = game["users"][leftSeatPlayer]["nbCards"];
    rightPlayerCards = game["users"][rightSeatPlayer]["nbCards"];

    updateCards();
    currentPlayerId = game["currentUserPlaying"]["uuid"];
});

function playCard(card)
{

    if (card.type === "WILD" || card.type === "WILD_DRAW_FOUR")
    {
        let color = prompt("Choisissez une couleur (RED, BLUE, GREEN, YELLOW)");
        if (color === null)
        {
            return;
        }
        color = color.toUpperCase();
        if (color !== "RED" && color !== "BLUE" && color !== "GREEN" && color !== "YELLOW")
        {
            alertify.error("Invalid color");
            return;
        }

        const data = {

            gameId: gameId,
            playerId: playerId,
            card: card,
            chooseColor: color

        };

        const serialized = JSON.stringify(data);
        socket.emit('play-card', serialized);
        return;
    }

    const data = {

        gameId: gameId,
      playerId: playerId,
        card: card,
        chooseColor: "NONE"

    };

    const serialized = JSON.stringify(data);
    socket.emit('play-card', serialized);
    console.log("Card played : " + card.value + " " + card.color + " " + card.type);
}

let unoButton = document.getElementById("button__uno");
unoButton.addEventListener("click", function () {
    if (currentPlayerId !== playerId)
    {
        alertify.error("Ce n'est pas à vous de jouer");
        return;
    }

    const data = {
        gameId: gameId,
        playerId: playerId
    };

    const serialized = JSON.stringify(data);

    socket.emit('playerCallUno', serialized);
});

socket.on('playerCalledUno', (game) => {

    alertify.success("Le joueur " + game["currentUserPlaying"]["username"] + " a appelé UNO");
});

socket.on('mainplayer-calluno', (response) => {

    if (response === "ERROR")
    {
        alertify.error("Vous ne pouvez pas appeler UNO! Vous venez de piocher une carte");
    }
});

function gameIsOver(user) {
    alertify.alert("Game Over", "Le joueur " + user["username"] + " a gagné la partie");

    /* update the elo of the user */
    if (user["uuid"] === playerId) {
        let newElo = elo + 10;
        let newGamesPlayed = games_played + 1;
        $.ajax({
            url: "/update/" + user["uuid"] + "/elo",
            type: "POST",
            data: JSON.stringify({
                elo: newElo,
                gamesPlayed: newGamesPlayed
            }),
            contentType: "application/json",
            dataType: "json",
            success: function (data) {
                console.log(data);
            }
        });
    }

    setTimeout(function() {
        window.location.href = "/";
    }, 2000);
}

socket.on('cardPlayed', (game) => {

console.log(game);
    let card = game["discardPile"][game["discardPile"].length - 1];
    let div = document.getElementById("card__played");
    let els = div.getElementsByTagName("div");
    Array.prototype.forEach.call(els, function (el) {
        el.remove();
    });

    //if the card is a specific card
    if (card["value"] === "NONE")
    {
        let e = createSpecificCard(card["value"], card["color"], card["type"], false);
        div.appendChild(e);
    }
    else {

        if (game["currentUserPlaying"]["uuid"] === playerId && game["currentUserPlaying"]["hand"].length === 1)
        {
            if (game["currentUserPlaying"]["callUno"] === false)
            {
                alertify.error("Vous n'avez pas appelé UNO! Vous venez de piocher 2 cartes");
            }
        }

        let d = document.createElement("div");
        d.className = "card";
        d.classList.add("num-" + getValueStringToInteger(card["value"]));
        d.classList.add(card["color"].toLowerCase());
        let span = document.createElement("span");
        span.className = "inner";
        let mark = document.createElement("span");
        mark.className = "mark";
        mark.style.backgroundColor = "#fff";
        mark.innerHTML = "" + getValueStringToInteger(card["value"]) + "";

        d.appendChild(span);
        span.appendChild(mark);
        div.appendChild(d);
    }

    if (card["type"] === "WILD" || card["type"] === "WILD_DRAW_FOUR")
    {
        let colorChoose = game["currentColor"].toString().toLowerCase();
        alertify.success("Couleur choisie:  " + colorChoose);
    }

    /* Check if the main player is his turn */
    if (game["currentUserPlaying"]["uuid"] === playerId)
    {
        alertify.success("C'est à vous de jouer");
        currentPlayerId = playerId;
    }

    currentPlayerId = game["currentUserPlaying"]["uuid"];

    /* regenerate the deck */
    deck = [];
    for (let i = 0; i < game["deck"].length; i++)
    {
        let color = String(game["deck"][i]["color"]);
        let value = String(game["deck"][i]["value"]);
        let type = String(game["deck"][i]["type"]);
        deck.push(new Card(value, color, type));
    }

    /* regenerate the main player cards */
    mainPlayerCards = [];
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

    /* update number of opponents cards */
    topPlayerCards = game["users"][topSeatPlayer]["nbCards"];
    leftPlayerCards = game["users"][leftSeatPlayer]["nbCards"];
    rightPlayerCards = game["users"][rightSeatPlayer]["nbCards"];


    /* Update the cards */
    updateCards();

    /* Check if the game is over */
    if (game["state"] === "FINISHED")
    {
        let winner = "";
        for (let i = 0; i < game["users"].length; i++)
        {
            if (game["users"][i]["nbCards"] === 0)
            {
                winner = game["users"][i];
            }
        }

        gameIsOver(winner);
    }
})
