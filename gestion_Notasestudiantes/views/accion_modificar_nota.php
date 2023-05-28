<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notaController.php';

use actividades\Actividades;
use notaController\NotaController;

$actividades = new Actividades();
$actividades->setId($_POST['id']);
$actividades->setDescripcion($_POST['descripcion']);
$actividades->setNota($_POST['nota']);

$notaController = new NotaController();
$resultado = $notaController->update($actividades->getId(),$actividades);
if ($resultado) {
    echo '<h1>nota modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la nota</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>