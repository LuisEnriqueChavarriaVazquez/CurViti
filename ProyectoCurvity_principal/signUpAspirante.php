<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
index.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>


<div class="boxSubjectsInicioExtended light-blue darken-4 centerElements">
    <div class="sizeCardInicioSmall backgroundCardInicio borderCardInicio z-depth-3">
        <p class="white-text textCardInicioSamll centerElements">Datos b&aacute;sicos.</p>
    </div>
    <div class="sizeCardForm backgroundCardForm borderCardInicio z-depth-3">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Escriba su nombre." id="nombre_aspirante" type="text" class="validate white-text">
                    <label for="nombre_aspirante">Nombre.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba el apellido paterno." id="apellido_paterno" type="text" class="validate white-text">
                    <label for="apellido_paterno">Apellido paterno.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba el apellido materno." id="apellido_materno" type="text" class="validate white-text">
                    <label for="apellido_materno">Apellido paterno.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba su email." id="first_name" type="email" class="validate white-text">
                    <label for="first_name">Email.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Cree su passoword de CURVITY." id="password" type="password" class="validate white-text">
                    <label for="password">Passoword.</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" placeholder="Seleccione su fecha de nacimiento." id="fecha_nac" class="validate datepicker white-text">
                    <label for="fecha_nac">Fecha de nacimiento.</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba su nacionalidad." id="nacionalidad" type="text" class="validate white-text">
                    <label for="nacionalidad">Nacionalidad.</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba su escuela de procedencia." id="alama_mater" type="text" class="validate white-text">
                    <label for="alma_mater">Alma mater.</label>
                </div>

                <div class="input-field col s12">
                    <select class="white-text">
                        <option value="" selected>Nivel Acad&eacute;mico.</option>
                        <option value="1">Universidad.</option>
                        <option value="2">Carrera t&eacute;cnica.</option>
                        <option value="2">Preparatoria.</option>
                        <option value="3">Secundaria</option>
                    </select>
                    <label>Nivel Acad&eacute;mico</label>
                </div>

                <div class="input-field col s12">
                    <textarea placeholder="Escriba la dirección" id="direccion_aspirante" class="materialize-textarea white-text" data-length="200"></textarea>
                    <label for="direccion_aspirante">Direccion donde recide.</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba su n&uacute;mero tel&eacute;fono." id="tel_aspirante" type="tel" class="validate white-text">
                    <label for="tel_aspirante">N&uacute;mero de tel&eacute;fono.</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="facebook" type="text" class="validate white-text">
                    <label for="facebook_aspirante">(Opcional) Facebook.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="skype" type="text" class="validate white-text">
                    <label for="skype_aspirante">(Opcional) Skype.</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Escriba la red social" id="twitter" type="text" class="validate white-text">
                    <label for="twitter_aspirante">(Opcional) Twitter.</label>
                </div>
            </div>
        </form>
    </div>
    <a href="signUpAspirante2.php"><button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Siguiente.</button></a>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>