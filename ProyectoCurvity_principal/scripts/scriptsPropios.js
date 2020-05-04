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

    //Cargar del scroll
    window.onscroll = function () { myFunction() };

    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }



});