<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notaController.php';

use notaController\NotaController;

$notaController = new NotaController();
$resultado = $notaController->delete($_GET['id']);
if ($resultado) {
    echo '<h1>Nota borrada</h1>';
} else {
    echo '<h1>No se pudo borrar la nota</h1>';
}
?>
<br>
<a href="../index.php">Volver a inicio</a>
