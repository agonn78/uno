<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/styles.uno.css') }}" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <title>Game - UNO</title>
</head>
<body>
<div class="container">
    <div class="column">
        <h2>Rejoignez une partie en ligne</h2>
        <div class="games__list">
            <div class="games__card">
                <div class="games__card__header">
                    Partie de Léo<br />
                    <i>2 joueurs sur 4 en ligne </i>
                    <div class="games__card__button" onclick="enterGame(1);">Rejoindre la partie</div>
                </div>
            </div>

            <div class="games__card">
                <div class="games__card__header">
                    Partie de Ewan<br />
                    <i>2 joueurs sur 4 en ligne </i>
                    <div class="games__card__button deactivated">COMPLET</div>
                </div>
            </div>

            <div class="games__card">
                <div class="games__card__header">
                    Partie de Ilyass<br />
                    <i>2 joueurs sur 4 en ligne </i>
                    <div class="games__card__button deactivated">COMPLET</div>
                </div>
            </div>
        </div>
    </div>

    <div class="column">
        <div class="games__create">
            <div class="games__create__header">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset('images/1.svg')}}" />
                            <h2>Créer une partie</h2>
                            <h3>Commencer une nouvelle partie</h3>
                            <input spellcheck="false" placeholder="Entrer un nom de partie" type="text" />
                            <button type="button" onclick="gotoSlide(1)">Suivant</button>
                        </div>

                        <div class="swiper-slide">
                            <div class="image-wrapper">
                                <img src="{{asset('images/2.svg')}}" />
                            </div>
                            <h2>Sécurité</h2>
                            <h3>Entrez un mot de passe (falcultatif)</h3>
                            <input type="password" placeholder="Entrez un mot de passe"/>
                            <button type="button" id="createButton" onclick="checkValid()">Créer la partie</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- animation background -->
<canvas class="background"></canvas>

<script src="{{ asset('scripts/particles.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('scripts/profile.js') }}"></script>
</body>
</html>
