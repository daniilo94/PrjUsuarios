<?php
require_once 'autoload.php';

use Control\UsuarioControl;

$usuarioControl = new UsuarioControl();

if (isset($_POST)) {
    $usuarioControl->getUsuario()->setNome($_POST['nome']);
    $usuarioControl->getUsuario()->setSenha($_POST['senha']);
    $usuarioControl->getUsuario()->setDataDeNascimento($_POST['birthday']);
    $usuarioControl->getUsuario()->setCpf($_POST['cpf']);
    $usuarioControl->getUsuario()->setSexo($_POST['sexo']);
    $usuarioControl->getUsuario()->setTipoDeAcesso($_POST['acesso']);

    $usuarioControl->adicionar();
}


print_r($usuarioControl->getUsuarios());