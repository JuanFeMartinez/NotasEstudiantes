<?php
require '../models/actividad.php';
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notaController.php';

use actividades\Actividades;
use notaController\NotaController;

$nota = new Usuario();
$nota->setId($_POST['id']);
$nota->setDescripcion($_POST['descripcion']);
$nota->setNota($_POST['nota']);
$nota->setCodEst($_POST['codigo']);

$estudianteController = new NotaController();
$resultado = $estudianteController->create($notas);
if ($resultado) {
    echo '<h1>Nota registrada</h1>';
} else {
    echo '<h1>No se pudo registrar la nota</h1>';
}
?>

<a href="../index.php">Volver a inicio</a>