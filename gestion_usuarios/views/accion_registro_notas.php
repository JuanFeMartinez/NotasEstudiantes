<?php
require '../models/usuario.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use estudiantes\Estudiantes;
use estudiantesController\estudiantesController;

$usuario = new Usuario();
$usuario->setId($_POST['id']);
$usuario->setName($_POST['name']);
$usuario->setUsername($_POST['username']);
$usuario->setPassword($_POST['password']);

$usuarioController = new UsuarioController();
$resultado = $usuarioController->create($usuario);
if ($resultado) {
    echo '<h1>Usuarios registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el usuario</h1>';
}