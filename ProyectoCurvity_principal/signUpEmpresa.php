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
                    <input placeholder="Escriba su passoword." id="password" type="password" class="validate white-text">
                    <label for="password">Passoword.</label>
                </div>
                <div class="input-field col s12">
                    <textarea placeholder="Escriba la dirección" id="direccion_sede" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="direccion_sede">Direccion principal de la empresa.</label>
                </div>
                <div class="input-field col s12">
                    <select class="white-text">
                        <option value="" selected>Tipo de empresa.</option>
                        <option value="1">Empresario individual (autónomo).</option>
                        <option value="1">Emprendedor de Responsabilidad Limitada.</option>
                        <option value="2">Comunidad de bienes.</option>
                        <option value="3">Sociedad Civil.</option>
                        <option value="3">Sociedad Colectiva.</option>
                        <option value="3">Sociedad Comanditaria Simple.</option>
                        <option value="3">Sociedad de Responsabilidad Limitada.</option>
                        <option value="3">Sociedad limitada de formación sucesiva.</option>
                        <option value="3">Sociedad limitada Nueva empresa.</option>
                        <option value="3">Sociedad Anónima.</option>
                        <option value="3">Sociedad Comanditaria por acciones.</option>
                        <option value="3">Sociedad de responsabilidad limitada laboral.</option>
                        <option value="3">Sociedad anónima laboral.</option>
                        <option value="3">Sociedad cooperativa.</option>
                        <option value="3">Sociedad cooperativa de trabajo asociado.</option>
                        <option value="3">Sociedades profesionales.</option>
                        <option value="3">Sociedad agraria de transformación.</option>
                        <option value="3">Sociedad de garantía recíproca.</option>
                        <option value="3">Entidades de capital riesgo.</option>
                        <option value="3">Agrupación de interés económico.</option>
                    </select>
                    <label>Tipo de empresa</label>
                </div>
            </div>
        </form>
    </div>
    <a href="signUpEmpresa2.php"><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>