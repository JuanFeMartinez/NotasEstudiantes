<?php

namespace notaController;

use baseController\BaseController;
use conexionDb\ConexionDbController;
use actividades\Actividades;

class NotaController extends BaseController
{

    function create($nota)
    {
        $sql = 'insert into actividades ';
        $sql .= '(id,descripcion,nota,codigoEstudiante) values ';
        $sql .= '(';
        $sql .= $nota->getId() . ',';
        $sql .= '"' . $nota->getDescripcion() . '",';
        $sql .= '"' . $nota->getNota() . '"';
        $sql .= '"' . $nota->getCodEst() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read()
    {
        $sql = 'select * from actividades ';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $notas = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $nota = new Nota();
            $nota->setId($registro['id']);
            $nota->setdescripcion($registro['descripcion']);
            $nota ->setNota($registro['nota']);
            $nota ->setCodEst($registro['codigoEstudiante']);
            array_push($notas, $nota);
        }
        $conexiondb->close();
        return $notas;
    }
    
    function readRow($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $nota = new Nota();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $nota->setId($registro['id']);
            $nota->setDescripcion($registro['descripcion']);
            $nota->setNota($registro['nota']);
        }
        $conexiondb->close();
        return $notas;
    }

    function update($id, $nota)
    {
        $sql = 'update actividades set ';
        $sql .= 'descripcion= "'.$nota->getDescripcion().'"';
        $sql .= 'nota= "'.$nota->getNota().'"';
        $sql .= 'codigoEstudiante= "'.$nota->getCodEst().'"';
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
