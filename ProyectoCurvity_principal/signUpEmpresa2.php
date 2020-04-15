<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
signUpEmpresa.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>


<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">M&aacute;s datos empresa.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12">
            <div class="row">
                <!--Direccion-->
                <div class="input-field col s12">
                    <textarea placeholder="Escriba descripci&oacute;n de la empresa" id="descripcion_empresa" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="descripcion_empresa">Descripci&oacute;n.</label>
                </div>
                <!--Foto de perfil-->
                <div class="file-field input-field">
                    <div class="btn white blue-text text-darken-4">
                        <span>Foto de perfil</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <!--Telefonos y redes sociales.-->
                <div class="input-field col s12">
                    <input placeholder="Escriba el telefono de la empresa." id="telefono_uno" type="tel" class="validate white-text">
                    <label for="telefono_uno">Tel&eacute;fono 1.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba el telefono de la empresa." id="telefono_dos" type="tel" class="validate white-text">
                    <label for="telefono_dos">(Opcional) Tel&eacute;fono 2.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="facebook" type="text" class="validate white-text">
                    <label for="facebook">(Opcional) Facebook.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="skype" type="text" class="validate white-text">
                    <label for="skype">(Opcional) Skype.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="twitter" type="text" class="validate white-text">
                    <label for="twitter">(Opcional) Twitter.</label>
                </div>
            </div>
        </form>
    </div>
    <a href="operacionesEmpresa.php"><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Finalizar.</button></a>
</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>