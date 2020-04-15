$(document).ready(function(){

    //  Script para la tabs cons swipe
    $('ul.tabs').tabs({
        swipeable: true,
        responsiveThreshold:
        1920
    });

    //Para el menu lateral.
    $('.sidenav').sidenav();

    //Boton flotante
    $('.fixed-action-btn').floatingActionButton();
  });