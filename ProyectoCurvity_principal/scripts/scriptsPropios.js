$(document).ready(function () {

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

    //Carousel Swipe
    $('.SWIPECAROUSEL').slick({
        dots:false,
        arrows:false,
        adaptiveHeight:true,
        centerMode: true,
        centerPadding: '0px',
        lazyLoad: 'progressive',
        cssEase: 'ease',
        infinite: true,
        mobileFirst: true,
        slidesToShow: 1
    });


});