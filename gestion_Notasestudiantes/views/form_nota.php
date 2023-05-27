<?php
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';
require '../models/actividad.php';

use notaController\NotaController;
use actividades\Actividades;

$codigo = $_GET['codigo'];
$id= empty($_GET['id']) ? '' : $_GET['id'];
$titulo= 'Registrar Nota';
$urlAction = "accion_registro_nota.php";
$nota = new Nota();
if (!empty($id)){
    $titulo ='Modificar Nota';
    $urlAction = "accion_modificar_nota.php";
    $notaController = new NotaController();
    $nota = $notaController->readRow($id);
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
            <input type="number" name="id" min="1" value="<?php echo $nota->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $nota->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="text" name="nota" value="<?php echo $nota->getNota(); ?>" required>
        </label>
        <label>
            <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>