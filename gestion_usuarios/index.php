<?php
require 'models/usuario.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/usuariosController.php';

use usuarioController\UsuarioController;

$usuarioController = new UsuarioController();

$usuarios = $usuarioController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de usuarios</h1>
        <a href="views/form_usuario.php">Registrar usuario</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                    echo '<tr>';
                    echo '  <td>' . $usuario->getId() . '</td>';
                    echo '  <td>' . $usuario->getName() . '</td>';
                    echo '  <td>' . $usuario->getUsername() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/form_usuario.php?id=' . $usuario->getId() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_usuario.php?id=' . $usuario->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>