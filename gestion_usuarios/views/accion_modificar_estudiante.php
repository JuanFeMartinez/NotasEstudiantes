<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombres($_POST['nombres']);
$estudiante->setApellidos($_POST['apellidos']);

$estudianteController = new EstudianteController();
$resultado = $estudianteController->update($estudiante->getId(),$usuario);
if ($resultado) {
    echo '<h1>estudiante modificado</h1>';
} else {
    echo '<h1>No se pudo modificar al estudiante</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>