<?php

if(!$_SESSION['administrador']) {
	header('Location: painel.php');
	exit();
} 
?>