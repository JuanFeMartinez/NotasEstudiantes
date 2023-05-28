<?php
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/notaController.php';

use actividades\Actividades;
use notaController\NotaController;
$codigo = $_GET['codigo'];

$estudianteController = new NotaController();

$actividad = $estudianteController->read($codigo);
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
        <a href="views/form_nota.php?codigo=<?php echo $codigo; ?>">Registrar Nota</a>
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
                foreach ($actividad as $actividades) {
                    $cont=1+$cont;
                    echo '<tr>';
                    echo '  <td>' . $actividades->getId() . '</td>';
                    echo '  <td>' . $actividades->getDescripcion() . '</td>';
                    echo '  <td>' . $actividades->getNota() . '</td>';
                    echo '  <td>' . $actividades->getCodEst() . '</td>';
                    echo '  <td>';
                    $sumaN=$actividades->getNota()+$sumaN;
                    $prom=$sumaN/$cont;
                    echo '      <a href="views/form_nota.php?codigo=' . $actividades->getId() . '">modificar</a>';
                    echo '      <a href="views/form_estudiante.php?codigo=' . $actividades->getCodEst() . '"></a>';
                    echo '      <a href="views/accion_borrar_estudiante.php?codigo=' . $actividades->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <h3>
            <?php
                    if ($prom !=0){
                        echo '<p>El promedio es '.$prom.'</p>';
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