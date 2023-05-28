<?php
require '../models/actividad.php';
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/notaController.php';

use actividades\Actividades;
use notaController\NotaController;


$actividades = new Actividades();
$id= empty($_GET['id']) ? '' : $_GET['id'];
$titulo= 'Registrar Nota';
$urlAction = "accion_registro_notas.php?codigoEstudiante=". $actividades->getCodEst();


if (!empty($id)){
    $titulo ='Modificar Nota';
    $urlAction = "accion_modificar_nota.php";
    $notaController = new NotaController();
    $actividades = $notaController->readRow($id);
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
            <input type="number" name="id" min="1" value="<?php echo $actividades->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $actividades->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="text" name="nota" value="<?php echo $actividades->getNota(); ?>" min="" max="50" required>
        </label>
        <br>
        <label>
            <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" required>
        </label>
        
        <button type="submit">Guardar</button>
    </form>
</body>

</html>