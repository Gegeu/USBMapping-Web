<?php
session_start();
include('conexao.php');

$id_maquina = $_GET["id"];

$query = "DELETE FROM maquina WHERE id_maquina = '$id_maquina'";

$result = mysqli_query($conexao, $query);

if($conexao->query($query) === TRUE) {
	$_SESSION['maquina_excluida'] = true;
}

header('Location: painel.php');
exit;

$conexao->close();
?>