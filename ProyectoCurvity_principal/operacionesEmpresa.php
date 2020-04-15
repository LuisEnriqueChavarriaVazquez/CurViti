<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'AlmacenIncludesPHP/elementosPhp/navbars/navbarEmpresa.php' ?>

<!--Cuerpo de las secciones-->
<div class="boxSubjects blue-grey lighten-5">
    <p class="titles">Operaciones empresa.</p>

    <a href="gestionSedes.php">
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesSuperior.php'; ?>
        Gestionar sedes.
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesInferior.php'; ?>
    </a>

    <a href="#">
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesSuperior.php'; ?>
        Modificar datos del perfil.
        <?php include 'AlmacenIncludesPHP/elementosPhp/cardOperaciones/cardOperacionesInferior.php'; ?>
    </a>
</div>

<?php include 'AlmacenIncludesPHP/elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>