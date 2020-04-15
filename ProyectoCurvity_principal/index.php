<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/styleMenu.css">
    <link rel="stylesheet" href="materialize/css/styleMaterialize.css">
    <link rel="stylesheet" href="style/sizeIcons.css">
    <link rel="stylesheet" href="style/body.css">
    <!--Define el tema de color-->
    <link rel="stylesheet" href="style/themes/sunny.css" id="theme">
</head>

<body>

    <!--Aqui tenemos nuestro navbar-->
    <nav class="nav-extended colorDefault">
        <!--Menu superior-->
        <div class="nav-wrapper left-align colorDefault">
            <a href="#" class="brand-logo sidenav-trigger" data-target="slide-out"><svg class="sizeIcons colorIcons"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="384px" height="384px">
                    <path
                        d="M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z" />
                </svg></a>
            <div class="iconMenu"><a href="#" data-target="mobile-demo" class="sidenav-trigger"></a></div>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">JavaScript</a></li>
            </ul>
        </div>

        <!--Menu inferior con los tabs-->
        <div class="nav-content">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a class="active" href="#test1">Maths</a></li>
                <li class="tab"><a href="#test2">Chemistry</a></li>
                <li class="tab "><a href="#test3">Physics</a></li>

            </ul>
        </div>
    </nav>

    <!--Enlaces del menu superior // para la versioón agrandada-->
    <ul class="sidenav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
    </ul>


    <!--Cuerpo de las secciones-->
    <div id="test1" class="col s12 mainCarouselOwn">
        <div class="boxSubjects">
            <div class="row">
                <div class="col s12 m6 cardSubject">
                    <div class="cardContainerOwn">
                        <div class="imagenCardOwn"></div>
                        <div class="contentCardOwn">
                            <div class="titleCardOwn flow-text">Title</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 cardSubject">
                    <div class="cardContainerOwn">
                        <div class="imagenCardOwn"></div>
                        <div class="contentCardOwn">
                            <div class="titleCardOwn flow-text">Title</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 cardSubject">
                    <div class="cardContainerOwn">
                        <div class="imagenCardOwn"></div>
                        <div class="contentCardOwn">
                            <div class="titleCardOwn flow-text">Title</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 cardSubject">
                    <div class="cardContainerOwn">
                        <div class="imagenCardOwn"></div>
                        <div class="contentCardOwn">
                            <div class="titleCardOwn flow-text">Title</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 cardSubject">
                    <div class="cardContainerOwn">
                        <div class="imagenCardOwn"></div>
                        <div class="contentCardOwn">
                            <div class="titleCardOwn flow-text">Title</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="test2" class="col s12">

    </div>
    <div id="test3" class="col s12">

    </div>

    <!--Menu del sidenav-->

    <ul id="slide-out" class="sidenav colorContrast">
        <li>
            <div class="user-view">
                <div class="background sideNavFont">

                </div>
                <a href="#user"><img class="circle" src="pictures/logo.png"></a>
                <a href="#name"><span class="white-text name">FormuJungle</span></a>
                <a href="#email"><span class="white-text email">Version 1.0.0</span></a>
            </div>
        </li>
        <li><a href="#!" class="textColor"><svg class="sizeIconsSideNav colorIconsContrast" width="768" height="768"
                    viewBox="0 0 768 768">
                    <path
                        d="M384 496.5q46.5 0 79.5-33t33-79.5-33-79.5-79.5-33-79.5 33-33 79.5 33 79.5 79.5 33zM622.5 415.5l67.5 52.5q10.5 7.5 3 21l-64.5 111q-6 10.5-19.5 6l-79.5-31.5q-31.5 22.5-54 31.5l-12 84q-3 13.5-15 13.5h-129q-12 0-15-13.5l-12-84q-28.5-12-54-31.5l-79.5 31.5q-13.5 4.5-19.5-6l-64.5-111q-7.5-13.5 3-21l67.5-52.5q-1.5-10.5-1.5-31.5t1.5-31.5l-67.5-52.5q-10.5-7.5-3-21l64.5-111q6-10.5 19.5-6l79.5 31.5q31.5-22.5 54-31.5l12-84q3-13.5 15-13.5h129q12 0 15 13.5l12 84q28.5 12 54 31.5l79.5-31.5q13.5-4.5 19.5 6l64.5 111q7.5 13.5-3 21l-67.5 52.5q1.5 10.5 1.5 31.5t-1.5 31.5z">
                    </path>
                </svg>&nbsp;&nbsp;Settings</a></li>
        <li id="sunny"><a href="#!" class="textColor"><svg class="sizeIconsSideNav  colorIconsContrast" width="768"
                    height="768" viewBox="0 0 768 768">
                    <path
                        d="M114 594l57-58.5 45 45-57 58.5zM352.5 718.5v-94.5h63v94.5h-63zM384 175.5q79.5 0 135.75 56.25t56.25 135.75-56.25 135.75-135.75 56.25-135.75-56.25-56.25-135.75 56.25-135.75 135.75-56.25zM640.5 336h96v64.5h-96v-64.5zM552 580.5l45-43.5 57 57-45 45zM654 142.5l-57 57-45-45 57-57zM415.5 18v94.5h-63v-94.5h63zM127.5 336v64.5h-96v-64.5h96zM216 154.5l-45 45-57-57 45-45z">
                    </path>
                </svg>&nbsp;&nbsp;Sunny mode</a></li>
        <li id="dark"><a href="#!" class="textColor"><svg class="sizeIconsSideNav  colorIconsContrast" width="768"
                    height="768" viewBox="0 0 768 768">
                    <path
                        d="M319.5 64.5q133.5 0 227.25 93.75t93.75 225.75-93.75 225.75-227.25 93.75q-87 0-159-42 73.5-42 116.25-116.25t42.75-161.25-42.75-161.25-116.25-116.25q72-42 159-42z">
                    </path>
                </svg>&nbsp;&nbsp;Dark mode</a></li>
    </ul>

    <!--Boton flotante-->
    <div class="fixed-action-btn click-to-toggle">
        <a class="btn-floating btn-large colorDefault waves-effect">
          <img src="icons/add.svg" class="sizeFloatingButtonBig">
        </a>
        <ul>
          <li><a class="btn-floating yellow darken-1"><img class="sizeFloatingButton" src="icons/laboratory.svg" alt=""></a></li>
          <li><a class="btn-floating green"><img class="sizeFloatingButton" src="icons/newtons-cradle.svg" alt=""></a></li>
          <li><a class="btn-floating blue"><img class="sizeFloatingButton" src="icons/pi.svg" alt=""></a></li>
        </ul>
      </div>


</body>
<script src="scripts/jq.js"></script>
<script src="materialize/js/script.js"></script>
<script src="scripts/scripts.js"></script>
<script src="scripts/themes.js"></script>

</html>