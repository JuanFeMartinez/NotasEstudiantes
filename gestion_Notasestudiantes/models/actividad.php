<?php

namespace actividades;

class Actividades
{
    private $id;
    private $descripcion;
    private $nota;
    private $codigoEstudiantes;

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id = $value;
    }
    
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($value)
    {
        $this->descripcion = $value;
    }

    public function getNota()
    {
        return $this->nota;
    }
    public function setNota($value)
    {
        $this->nota = $value;
    }

    public function getCodEst()
    {
        return $this->codigoEstudiantes;
    }
    public function setCodEst($value)
    {
        $this->codigoEstudiantes = $value;
    }
}