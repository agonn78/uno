var gotoUno = function() {
    window.location.href = "/game/uno/create";
};

const swiper = new Swiper(".swiper", {
    speed: 500,
    allowTouchMove: false,
    direction: 'horizontal',

    pagination: {
        el: '.swiper-pagination',
    }
});

const gotoSlide = (index) => {
    swiper.slideTo(index);
};

const restart = () => {
    const inputs = document.querySelectorAll("input");
    const buttons = document.querySelectorAll("button[type=button]");

    buttons.forEach((button) => {
        button.disabled = true;
    });

    inputs.forEach((input) => {
        input.value = "";
    });

    gotoSlide(0);
};


const checkValid  = function() {

    Swal.fire({
        icon: 'error',
        title: 'Oups...',
        text: 'La création de partie est désactivée'
    });
}


const enterGame = function(index) {
    Swal.fire({
        icon: 'info',
        title: 'Entrez le mot de passe de la partie',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Jouez!'
    });
}


var particles = Particles.init({
    selector: '.background',
    sizeVariations: 4,
    maxParticles: 200,
    color: ['#DBEDF3', '#DBEDF3', '#DBEDF3'],
    connectParticles: true
});

