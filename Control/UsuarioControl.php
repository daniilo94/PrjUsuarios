<?php
namespace Control;
/**
 * Created by PhpStorm.
 * User: danilo.silva
 * Date: 09/08/2017
 * Time: 14:14
 */
use DAO\UsuarioDAO;
use Model\Usuario;
class UsuarioControl{
    private $usuario;
    private $usuarioDAO;
    private $usuarios;

    function __construct(){
        $this->usuario = new Usuario();
        $this->usuarioDAO = new UsuarioDAO();
        $this->carregarUsuarios();
    }

    public function carregarUsuarios(){
        $this->usuarios = $this->usuarioDAO->buscarTodos();
    }

    public function atualizar(){
        $result = $this->usuarioDAO->update($this->usuario);
        $this->carregarUsuarios();
        return $result;
    }

    public function adicionar(){
        $result = $this->usuarioDAO->adicionar($this->usuario);
        $this->carregarUsuarios();
        return $result;
    }

    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return UsuarioDAO
     */
    public function getUsuarioDAO()
    {
        return $this->usuarioDAO;
    }

    /**
     * @param UsuarioDAO $usuarioDAO
     */
    public function setUsuarioDAO($usuarioDAO)
    {
        $this->usuarioDAO = $usuarioDAO;
    }

    /**
     * @return mixed
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * @param mixed $usuarios
     */
    public function setUsuarios($usuarios)
    {
        $this->usuarios = $usuarios;
    }
}