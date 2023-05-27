<?php
require '../models/estudiante.php';
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;
use nota\Nota;

$estudiante = new Estudiante();
$nota = new Nota();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombres($_POST['nombres']);
$estudiante->setApellidos($_POST['apellidos']);


$estudianteController = new EstudianteController();
$resultado = $estudianteController->create($estudiante);
if ($resultado) {
    echo '<h1>estudiante registrado</h1>';
} else {
    echo '<h1>No se pudo registrar al estudiante</h1>';
}
