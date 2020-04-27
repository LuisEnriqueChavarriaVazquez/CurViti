$(document).ready(function () {

    //Activa el carrusel del SWIPE
    $(".owl-carousel").owlCarousel({
        center: true,
        items: 1,
        loop: true,
        margin: 1000,
        dots: false,
        smartSpeed: 400,
        fluidSpeed: true,
        animateOut: 'fadeOut'
    });

    //Adaptar la altura del fondo para los elementos SWIPE
    var height = $(window).height();
    $('.alturaAdaptable').height(height);

    

});