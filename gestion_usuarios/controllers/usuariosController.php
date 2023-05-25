<?php

namespace usuarioController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use usuario\Usuario;

class UsuarioController extends BaseController
{

    function create($usuario)
    {
        $sql = 'insert into usuarios ';
        $sql .= '(id,name,username,password) values ';
        $sql .= '(';
        $sql .= $usuario->getId() . ',';
        $sql .= '"' . $usuario->getName() . '",';
        $sql .= '"' . $usuario->getUsername() . '",';
        $sql .= '"' . $usuario->getPassword() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read()
    {
        $sql = 'select * from usuarios';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $usuarios = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->setId($registro['id']);
            $usuario->setName($registro['name']);
            $usuario->setUsername($registro['username']);
            $usuario->setPassword('');
            array_push($usuarios, $usuario);
        }
        $conexiondb->close();
        return $usuarios;
    }
    
    function readRow($id)
    {
        $sql = 'select * from usuarios';
        $sql .= ' where id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $usuario = new Usuario();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $usuario->setId($registro['id']);
            $usuario->setName($registro['name']);
            $usuario->setUsername($registro['username']);
            $usuario->setPassword('');
        }
        $conexiondb->close();
        return $usuario;
    }

    function update($id, $usuario)
    {
        $sql = 'update usuarios set ';
        $sql .= 'name='.$usuario->getName().'",';
        $sql .= 'username='.$usuario->getUsername().'",';
        $sql .= 'password='.$usuario->getPassword().'" ';
        $sql .= ' where id='.$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($id)
    {
        $sql = 'delete from usuarios where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
