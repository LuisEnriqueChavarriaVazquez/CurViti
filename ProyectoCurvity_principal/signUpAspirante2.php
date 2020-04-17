<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
signUpAspirante.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>


<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Datos adicionales.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12">
            <div class="row">
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
                <br>

                <!--Describe tus habilidades-->
                <div class="input-field col s12">
                    <textarea placeholder="Habilidades con que cuenta" id="habilidades_aspirante" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="habilidades_aspirante">Habilidades.</label>
                </div>

                <div class="input-field col s12">
                    <textarea placeholder="Experiencia laboral." id="experiencia_laboral" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="experiencia_laboral">Experiencia laboral.</label>
                </div>


                <!--Idiomas que domina-->
                <div class="input-field col s6">
                    <input placeholder="Idioma aprendido." id="idioma_dominado_uno" type="text" class="validate white-text truncate">
                    <label for="idioma_dominado_uno">(Opcional) Idioma 1.</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Porcentaje." id="porcenta_idioma_uno" type="text" class="validate white-text">
                    <label for="porcenta_idioma_uno">% Idioma.</label>
                </div>

                <div class="input-field col s6">
                    <input placeholder="Idioma aprendido." id="idioma_dominado_dos" type="text" class="validate white-text truncate">
                    <label for="idioma_dominado_dos">(Opcional) Idioma 2.</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Porcentaje." id="porcenta_idioma_dos" type="text" class="validate white-text">
                    <label for="porcenta_idioma_dos">% Idioma.</label>
                </div>

                <div class="input-field col s6">
                    <input placeholder="Idioma aprendido." id="idioma_dominado_tres" type="text" class="validate white-text truncate">
                    <label for="idioma_dominado_tres">(Opcional) Idioma 3.</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Porcentaje." id="porcenta_idioma_tres" type="text" class="validate white-text">
                    <label for="porcenta_idioma_tres">% Idioma.</label>
                </div>

                <!--Sueldo ideal-->
                <div class="input-field col s12">
                    <input placeholder="Ejemplo 30500" id="sueldo_ideal" type="text" class="validate white-text truncate">
                    <label for="sueldo_ideal">Sueldo ideal.</label>
                </div>
            </div>
        </form>
    </div>
    <a href="finalizarProcesoSignUp.php"><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
</div>


<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>