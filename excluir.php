<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/errors_log.txt');
error_reporting(E_ALL);

include 'autoload.php';

use Control\UsuarioControl;

$usuarioControl = new UsuarioControl();

echo $usuarioControl->excluir($_POST['id']);