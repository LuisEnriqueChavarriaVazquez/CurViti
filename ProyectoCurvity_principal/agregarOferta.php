<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
gestionOfertas.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>


<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Nueva oferta.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Escriba el nombre de la nueva oferta." id="nombre_oferta" type="text" class="truncate validate white-text">
                    <label for="nombre_oferta">Nombre oferta.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba el pago oferta." id="pago_ofertado" type="text" class="truncate validate white-text">
                    <label for="pago_ofertado">Pago ofertado.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Semanal, Mensual, Por proyecto, por hora,etc." id="modalidad_de_pago" type="email" class="truncate validate white-text">
                    <label for="modalidad_de_pago">Modalidad de pago.</label>
                </div>
                <div class="input-field col s12">
                    <textarea placeholder="Escriba los requerimientos básicos" id="requerimientos_basicos" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="requerimientos_basicos">Requerimientos básicos.</label>
                </div>
                <div class="input-field col s12">
                    <textarea placeholder="Escriba las prestaciones" id="prestaciones_oferta" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="prestaciones_oferta">Prestaciones ofertadas de la empresa.</label>
                </div>
            </div>
        </form>
    </div>
    <a href="#modal1" class="modal-trigger"><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Agregar la oferta.</button></a>
</div>

<!--Aqui tenemos el mensaje emergente que sale en la pantalla-->
<?php include 'AlmacenIncludesPHP/elementosPhp/popUps/advertenciaCambiosAgregarOferta.php'?>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>