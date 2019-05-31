<?php
define('HOST', 'testebanco.c40hxkoyiz9i.us-east-2.rds.amazonaws.com');
define('USUARIO', 'root');
define('SENHA', 'testeteste');
define('DB', 'testebanco');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
mysqli_set_charset( $conexao, 'utf8');

?>
