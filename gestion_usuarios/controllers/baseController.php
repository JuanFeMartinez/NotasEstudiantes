<?php namespace baseControler;

abstract class BaseController
{
    abstract function create($model);
    abstract function read();
    abstract function update($codigo, $estudiante);
    abstract function delete($codigo);
    //abstract function readRow($id);

}
