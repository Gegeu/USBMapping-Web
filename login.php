<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select nome from usuario_web where usuario = '{$usuario}' and senha = sha1('{$senha}')";
$query2 = "select adm from usuario_web where usuario = '{$usuario}' and adm = 1";

$result = mysqli_query($conexao, $query);
$result2 = mysqli_query($conexao, $query2);

$row = mysqli_num_rows($result);
$row2 = mysqli_num_rows($result2);

if($row2 == 1){
	$_SESSION['administrador'] = true;
} else {
	$_SESSION['administrador'] = false;
}

if($row == 1) {
	$_SESSION['nome'] = $usuario;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}


