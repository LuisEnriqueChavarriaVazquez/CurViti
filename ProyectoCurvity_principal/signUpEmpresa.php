<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
index.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>


<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Datos b&aacute;sicos empresa.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Escriba el nombre de la empresa." id="nombre_empresa" type="text" class="validate white-text">
                    <label for="nombre_empresa">Nombre empresa.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la razon social de la empresa." id="first_name" type="text" class="validate white-text">
                    <label for="first_name">Razón social de la empresa.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Email del admin de empresa." id="first_name" type="email" class="validate white-text">
                    <label for="first_name">Email.</label>
                </div>
                <div class="input-field col s12">
                    <textarea placeholder="Escriba la dirección" id="direccion_sede" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="direccion_sede">Direccion principal de la empresa.</label>
                </div>
                <div class="input-field col s12">
                    <select class="white-text">
                        <option value="" selected>Tipo de empresa.</option>
                        <option value="1">Sociedad civil.</option>
                        <option value="2">Sociedad an&oacute;nima.</option>
                        <option value="3">ETC</option>
                    </select>
                    <label>Tipo de empresa</label>
                </div>
            </div>
        </form>
    </div>
    <a href="signUpEmpresa2.php"><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>