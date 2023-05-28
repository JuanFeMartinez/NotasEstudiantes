<?php
require '../models/estudiante.php';
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;
use actividades\Actividades;

$estudiante = new Estudiante();
$actividades = new Actividades();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombres($_POST['nombres']);
$estudiante->setApellidos($_POST['apellidos']);
$actividades->setCodEst($_POST['codigo']);


$estudianteController = new EstudianteController();
$resultado = $estudianteController->create($estudiante,$nota);
if ($resultado) {
    echo '<h1>estudiante registrado</h1>';
} else {
    echo '<h1>No se pudo registrar al estudiante</h1>';
}
?>
<a href="../index.php">Volver a inicio</a>
