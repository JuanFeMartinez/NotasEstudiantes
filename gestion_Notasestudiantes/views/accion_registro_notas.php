<?php
require '../models/actividad.php';
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notaController.php';

use actividades\Actividades;
use notaController\NotaController;

$actividades = new Actividades();
$actividades->setId($_POST['id']);
$actividades->setDescripcion($_POST['descripcion']);
$actividades->setNota($_POST['nota']);
$actividades->setCodEst($_POST['codigo']);

$estudianteController = new NotaController();
$resultado = $estudianteController->create($$actividades);
if ($resultado) {
    echo '<h1>Nota registrada</h1>';
} else {
    echo '<h1>No se pudo registrar la nota</h1>';
}
?>

<a href="../index.php">Volver a inicio</a>