<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>


<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarSuperior.php' ?>
ofertasPublicadasPrevioSwipe.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInferior.php' ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////En esta seccion comienza el slider para marcas de codigos de FALLA OBDII-->

<!-- Set up your HTML -->
<div class="alturaAdaptable SWIPECAROUSEL contank  light-blue darken-4">

    <!-- Primer item -->
    <div class="margin-down-bigger elementoSwipePadre">
        <div class="idDisplay z-depth-4">IPNEMAPDDANSD</div>
        <div class="wrapper">
            <div class="clash-card empleado">
                <div class="clash-card__image clash-card__image--empleado">
                    <img src="pictures/personas/manuel.jpg" class="card_image_empleado">
                </div>
                <div class="buttonContainerEvaluate z-depth-3">
                    <div id="aceptaButton" onclick="M.toast({html: 'Aspirante aceptado'}); borrar()" class="btn buttonEvaluate waves-effect waves-green"><img src="icons/check.svg"></div>
                    <div id="rechazaButton" onclick="M.toast({html: 'Aspirante rechazado'}); borrar()" class="btn buttonEvaluate waves-effect waves-red"><img src="icons/cross.svg"></div>
                    <div id="rehacerButton" onclick="M.toast({html: 'Cambios desechos'}); borrarRetorno()" class="buttonHide btn buttonEvaluate waves-effect waves-light"><img src="icons/undo.svg"></div>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Nombre.</div>
                    <p class="flow-text name_margin">Pedro Martinez Juarez.</p>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Experiencia laboral.</div>
                    <p class="small_text_summary">Lorem ipsum dciduntdunt Lorem em ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt Lorem ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt Lorem ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt Lorem ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt</p>
                </div>
                <!-- Modal Trigger -->
                <a class="btn_margin waves-effect waves-light btn modal-trigger blue-grey darken-2 white-text" href="#modal1">Ver más datos.</a>

            </div> <!-- end clash-card empleado-->

        </div> <!-- end wrapper -->
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal bottom-sheet">
            <div class="modal-content">
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Sueldo deseado.</div>
                    <p class="flow-text">$10,000.</p>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Dirección actual.</div>
                    <p class="small_text_summary">Lorem ir sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt Lorem ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt</p>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Idiomas que domina.</div>
                    <p class="small_text_summary">(4) Ingles,Frances,Chino y Alemán.</p>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Nivel académico.</div>
                    <p class="flow-text">Universidad.</p>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Habilidades adicionales.</div>
                    <p class="small_text_summary">Lorem ipsum dciduntdunt Lorem em ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt Lorem ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt Lorem ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt Lorem ipsum dolor sit. Totam ipsum voluptatem eveniet inventore quis est, perspiciatis incidunt</p>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Correo electrónico.</div>
                    <p class="flow-text">correo@gmail.com.</p>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Número telefónico.</div>
                    <p class="flow-text">5545678932</p>
                </div>
                <div class="clash-card__unit-description black-text left-align">
                    <div class="clash-card__unit-name truncate">Redes sociales.</div>
                    <p class="small_text_social_media">Facebook:<span class="small_text_social_media_name"> Name_social_media</span></p>
                    <p class="small_text_social_media">Twitter:<span class="small_text_social_media_name"> Name_social_media</span></p>
                    <p class="small_text_social_media last_social_media">Skype:<span class="small_text_social_media_name"> Name_social_media</span></p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect blue darken-3 white-text btn-flat">Cerrar</a>
            </div>
        </div>
    </div>

</div>
<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>


<!--El codigo se agrego aqui porque -->
<script>
    //Cambio de los botones en SWIPE
    acepto = document.getElementById("aceptaButton");
    rechaza = document.getElementById("rechazaButton");
    rehacer = document.getElementById("rehacerButton");

    function borrar() {
        acepto.classList.add("buttonHide");
        rechaza.classList.add("buttonHide");
        rehacer.classList.remove("buttonHide");
    }

    function borrarRetorno() {
        acepto.classList.remove("buttonHide");
        rechaza.classList.remove("buttonHide");
        rehacer.classList.add("buttonHide");
    }
</script>