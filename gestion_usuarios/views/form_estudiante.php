<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';
require '../models/notas.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;
use nota\Nota;

$codigo= empty($_GET['codigo']) ? '' : $_GET['codigo'];
$titulo= 'Registrar Estudiante';
$urlAction = "accion_registro_estudiante.php";
$estudiante = new Estudiante();
if (!empty($codigo)){
    $titulo ='Modificar Estudiante';
    $urlAction = "accion_modificar_estudiante.php";
    $estudianteController = new EstudianteController();
    $estudiante = $estudianteController->readRow($codigo);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Id:</span>
            <input type="number" name="id" min="1" value="<?php echo $usuario->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="name" value="<?php echo $usuario->getName(); ?>" required>
        </label>
        <br>
        <label>
            <span>Usuario:</span>
            <input type="text" name="username" value="<?php echo $usuario->getUsername(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>