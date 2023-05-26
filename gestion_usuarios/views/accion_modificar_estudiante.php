<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$usuario = new Estudiante();
$usuario->setId($_POST['codigo']);
$usuario->setName($_POST['nombres']);
$usuario->setUsername($_POST['apellidos']);

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