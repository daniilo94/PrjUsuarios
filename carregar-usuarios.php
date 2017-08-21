<?php

require_once 'autoload.php';

use Control\UsuarioControl;

$usuarioControl = new UsuarioControl();

$usuarios = $usuarioControl->getUsuarios();

//print_r($usuarioControl->getUsuarios());

foreach ($usuarios as $usuario) {
    $users['id'] = $usuario->getId();
    $users['nome'] = $usuario->getNome();
    $users['senha'] = $usuario->getSenha();
    $users['birthday'] = $usuario->getDataDeNascimento();
    $users['cpf'] = $usuario->getCpf();
    $users['sexo'] = $usuario->getSexo();
    $users['acesso'] = $usuario->getTipoDeAcesso();
    $users['botao'] = '<button class="excluir">Click!</button>';

    $rows["data"][] = $users;
}


echo json_encode($rows);





