<?php

/* include './lib/conexion.php';
  include './lib/usuario.php'; */
$PATH = 'lib/';
include $PATH . 'conexion.php';
include $PATH . 'usuario.php';
session_start();
var_dump($_SESSION);
$oUsr = new Usuario();
$oUsr->nombre = $_POST['nombre'];
$oUsr->clave = $_POST['clave'];
if ($oUsr->VerificaUsuario()) {
    $_SESSION['USR'] = $oUsr;
}

