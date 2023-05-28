<?php
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/notaController.php';

use actividades\Actividades;
use notaController\NotaController;
$codigo = $_GET['codigo'];

$notaController = new NotaController();

$notas = $notaController->read($codigo);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de Notas</h1>
        <a href="views/form_nota.php">Registrar Nota</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $prom=0;
                $cont=0;
                $sumaN=0;
                foreach ($notas as $nota) {
                    echo '<tr>';
                    echo '  <td>' . $nota->getId() . '</td>';
                    echo '  <td>' . $nota->getDescripcion() . '</td>';
                    echo '  <td>' . $nota->getNota() . '</td>';
                    echo '  <td>' . $nota->getCodEst() . '</td>';
                    echo '  <td>';
                    $sumaN=$nota->getNota()+$sumaN;
                    $prom=$sumaN/$cont;
                    echo '      <a href="views/form_nota.php?codigo=' . $nota->getId() . '">modificar</a>';
                    echo '      <a href="views/form_estudiante.php?codigo=' . $nota->getCodEst() . '"></a>';
                    echo '      <a href="views/accion_borrar_estudiante.php?codigo=' . $nota->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <h3>
            <?php
                    if ($prom !=0){
                        echo '<p>El promedio es '.$promedio.'</p>';
                        }
                        if($prom<3 && $prom>0){
                            echo '<h1 style="color: red">No aprobaste</h1>';
                        }else if ($prom==0){
                            echo '<h1 style="color: purple">Registre notas primero</h1>';
                        }else{
                            echo '<h1 style="color: green">Felicidades, aprobaste</h1>';
                        }
           /*if($prom>3){
                echo '<h1 style="color: green">PASATES, t felisito </h1>';
            } else if ($prom=0){
                echo '<h1 style="color: purple">primero ingrese notas </h1>';
            }else{
                echo '<h1 style="color: red">PERDITES, bobo </h1>';
            }*/
            ?>
        </h3>
    </main>
</body>

</html>