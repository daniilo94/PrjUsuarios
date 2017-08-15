<?php
namespace DAO;
/**
 * Created by PhpStorm.
 * User: danilo.silva
 * Date: 08/08/2017
 * Time: 17:05
 */
use Model\Usuario;

class UsuarioDAO{
    private $conection;

    function __construct(){
        $this->conection = mysqli_connect('localhost', 'root', '', 'usuarios');
        mysqli_query($this->conection, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    }

    public function buscarTodos(){
        $stmt = mysqli_prepare($this->conection, "SELECT * FROM usuarios");
        $stmt->execute();
        $resultado = $stmt->get_result();
        while($usr = $resultado->fetch_assoc()){
            $usuarios[] = new Usuario($usr['id'], $usr['nome'], $usr['senha'], $usr['data_de_nascimento'], $usr['cpf'], $usr['sexo'], $usr['tipo_de_acesso']);
        }
        return $usuarios;
    }

    public function update($usuario){
        $stmt = mysqli_prepare($this->conection, "UPDATE usuarios SET nome = ?, senha = ?, data_de_nascimento = ?, cpf = ?, sexo = ?, tipo_de_acesso = ? WHERE id = ?");
        $nome = $usuario->getNome();
        $senha = $usuario->getSenha();
        $dataDeNascimento = $usuario->getDataDeNascimento();
        $cpf = $usuario->getCpf();
        $sexo = $usuario->getSexo();
        $tipoDeAcesso = $usuario->getTipoDeAcesso();
        $id = $usuario->getId();
        $stmt->bind_param("ssssssi", $nome, $senha, $dataDeNascimento, $cpf, $sexo, $tipoDeAcesso, $id);
        return $stmt->execute();
    }

public function adicionar($usuario){
        $stmt = mysqli_prepare($this->conection, "INSERT INTO usuarios (nome , senha , data_de_nascimento , cpf , sexo , tipo_de_acesso) VALUES(?,?,?,?,?,?)");
        $nome = $usuario->getNome();
        $senha = $usuario->getSenha();
        $dataDeNascimento = $usuario->getDataDeNascimento();
        $cpf = $usuario->getCpf();
        $sexo = $usuario->getSexo();
        $tipoDeAcesso = $usuario->getTipoDeAcesso();
        $stmt->bind_param("ssssss", $nome, $senha, $dataDeNascimento, $cpf, $sexo, $tipoDeAcesso);
        return $stmt->execute();
    }

}