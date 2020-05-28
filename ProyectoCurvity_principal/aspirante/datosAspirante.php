<?php 

require_once "../../includes/Conexion.php";
require_once "../../includes/Aspirante.php";

$obj= new aspirante();

echo json_encode($obj->obtenDatosAspirante($_POST['idcliente']));

?>

