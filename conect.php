<?php
define('HOST', '127.0.0.1');
define('USER', 'root');
define('SENHA', '');
define('BD', 'apurodb');

$conexao=mysqli_connect(HOST, USER, SENHA, BD) or die ('Não foi possível conectar ao banco de dados!');