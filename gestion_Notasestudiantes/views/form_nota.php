<?php
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notaController.php';
require '../models/actividad.php';

use notaController\NotaController;
use actividades\Actividades;

$notas = new Actividades();
$id= empty($_GET['id']) ? '' : $_GET['id'];
$titulo= 'Registrar Nota';
$urlAction = "accion_registro_nota.php?codigoEstudiante=". $notas->getCodEst();


if (!empty($id)){
    $titulo ='Modificar Nota';
    $urlAction = "accion_modificar_nota.php";
    $notaController = new NotaController();
    $notas = $notaController->readRow($id);
}else {$codigo = $_GET['codigo'];}
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
            <input type="number" name="id" min="1" value="<?php echo $notas->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $notas->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="text" name="nota" value="<?php echo $notas->getNota(); ?>" min="0" max="50" required>
        </label>
        <br>
        <label>
            <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" required>
        </label>
        
        <button type="submit">Guardar</button>
    </form>
</body>

</html>