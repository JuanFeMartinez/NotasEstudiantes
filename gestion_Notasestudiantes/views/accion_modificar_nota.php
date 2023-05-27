<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notaController.php';

use nota\Nota;
use notaController\NotaController;

$nota = new Nota();
$nota->setId($_POST['id']);
$nota->setDescripcion($_POST['descripcion']);
$nota->setNota($_POST['nota']);
$nota->setCodEst($_POST['codEstudiante']);

$notaController = new NotaController();
$resultado = $notaController->update($nota->getId(),$nota);
if ($resultado) {
    echo '<h1>nota modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la nota</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>