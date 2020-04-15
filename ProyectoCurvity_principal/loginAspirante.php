<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>


<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoSuperior.php' ?>
login.php
<?php include 'AlmacenIncludesPHP/elementosPhp/navbarRetorno/navbarInicialRetornoInferior.php' ?>

<div class="boxSubjectsInicio light-blue darken-4 centerElements">
    <div class="sizeCardInicio backgroundCardInicio centerElements borderCardInicio z-depth-3">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix white-text">account_circle</i>
                    <input id="id_usuario" type="text" class="validate white-text">
                    <label for="id_usuario" class="white-text">Id de usuario.</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix white-text">email</i>
                    <input id="email" type="email" class="validate white-text">
                    <label for="email" class="white-text">Email.</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix white-text">lock</i>
                    <input id="password" type="password" class="validate white-text">
                    <label for="password" class="white-text">Password.</label>
                </div>
            </div>
        </form>
    </div>
    <button type="submit" class="waves-effect btn-large borderButton sizeButton textButton grey lighten-5 blue-text text-darken-4">Iniciar sesi&oacute;n.</button>

</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>