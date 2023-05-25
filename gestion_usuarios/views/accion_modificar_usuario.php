<?php
require '../models/usuario.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use usuario\Usuario;
use usuarioController\UsuarioController;

$usuario = new Usuario();
$usuario->setId($_POST['id']);
$usuario->setName($_POST['name']);
$usuario->setUsername($_POST['username']);
$usuario->setPassword($_POST['password']);

$usuarioController = new UsuarioController();
$resultado = $usuarioController->update($usuario->getId(),$usuario);
if ($resultado) {
    echo '<h1>Usuarios modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>