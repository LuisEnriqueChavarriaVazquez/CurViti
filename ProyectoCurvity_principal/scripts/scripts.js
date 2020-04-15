$(document).ready(function(){

    //Para el menu lateral.
    $('.sidenav').sidenav();

    //Boton flotante
    $('.fixed-action-btn').floatingActionButton();

    //Tamaño al 100% de la ventana
    $('.full-height').fullHeight();

    //Contador de caracteres en los texts areas
    $('textarea#direccion_sede, textarea#descripcion_empresa').characterCounter();

    //Inicializamos la parte de los scripts para el select
    $('select').formSelect();

  });