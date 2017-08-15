<?php
namespace Model;
/**
 * Created by PhpStorm.
 * User: danilo.silva
 * Date: 08/08/2017
 * Time: 16:59
 */
class Usuario{
    private $id;
    private $nome;
    private $senha;
    private $data_de_nascimento;
    private $cpf;
    private $sexo;
    private $tipo_de_acesso;
    
    function __construct($id = null, $nome = null, $senha = null, $data_de_nascimento = null, $cpf = null, $sexo = null, $tipo_de_acesso = null){
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->data_de_nascimento = $data_de_nascimento;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->tipo_de_acesso = $tipo_de_acesso;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getDataDeNascimento()
    {
        return $this->data_de_nascimento;
    }

    /**
     * @param mixed $data_de_nascimento
     */
    public function setDataDeNascimento($data_de_nascimento)
    {
        $this->data_de_nascimento = $data_de_nascimento;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getTipoDeAcesso()
    {
        return $this->tipo_de_acesso;
    }

    /**
     * @param mixed $tipo_de_acesso
     */
    public function setTipoDeAcesso($tipo_de_acesso)
    {
        $this->tipo_de_acesso = $tipo_de_acesso;
    }
}