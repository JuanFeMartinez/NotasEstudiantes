<?php

namespace notaController;

use baseController\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;
use actividades\Actividades;

class NotaController
{

    function create($actividades)
    {
        $sql = 'insert into actividades ';
        $sql .= '(id,descripcion,nota,codigoEstudiante) values ';
        $sql .= '(';
        $sql .= $actividades->getId() . ',';
        $sql .= '"' . $actividades->getDescripcion() . '",';
        $sql .= '"' . $actividades->getNota() . '",';
        $sql .= '"' . $actividades->getCodEst() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read($codigo)
    {
        $sql = 'select * from actividades where codigoEstudiante = '.$codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividad = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividades = new Actividades();
            $actividades->setId($registro['id']);
            $actividades->setdescripcion($registro['descripcion']);
            $actividades ->setNota($registro['nota']);
            $actividades ->setCodEst($registro['codigoEstudiante']);
            array_push($actividad, $actividades);
        }
        $conexiondb->close();
        return $actividad;
    }
    
    function readRow($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = new Actividades();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividades->setId($registro['id']);
            $actividades->setDescripcion($registro['descripcion']);
            $actividades->setNota($registro['nota']);
        }
        $conexiondb->close();
        return $actividad;
    }

    function update($id, $actividades)
    {
        $sql = 'update actividades set ';
        $sql .= 'descripcion= "'.$actividades->getDescripcion().'",';
        $sql .= 'nota= "'.$actividades->getNota().'"';
        $sql .= ' where Id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
