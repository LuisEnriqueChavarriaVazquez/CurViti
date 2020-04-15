<?php include 'elementosPhp/HTMLSTRUCTURE/parteSuperior.php' ?>

<?php include 'elementosPhp/navbarRetorno/navbarSuperior.php' ?>
operacionesEmpresa.php
<?php include 'elementosPhp/navbarRetorno/navbarInferior.php' ?>


<!--Cuerpo de las secciones-->
<div class="boxSubjects blue-grey lighten-5">
    <p class="titles">Gestion sedes.</p>
    <?php include 'elementosPhp/cardGestion/cardSuperior.php'; ?>
    Agregar nueva sede.
    <?php include 'elementosPhp/cardGestion/cardInferior.php'; ?>

    <?php include 'elementosPhp/cardGestion/cardSuperior.php'; ?>
    Borrar sede.
    <?php include 'elementosPhp/cardGestion/cardInferior.php'; ?>

    <?php include 'elementosPhp/cardGestion/cardSuperior.php'; ?>
    Actualizar sede.
    <?php include 'elementosPhp/cardGestion/cardInferior.php'; ?>
</div>

<?php include 'elementosPhp/HTMLSTRUCTURE/parteInferior.php' ?>