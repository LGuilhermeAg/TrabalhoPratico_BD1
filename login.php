<?php
session_start();
include('conect.php');
if(empty($_POST['email']) || empty($_POST['senha'])){
	$_SESSION['msg_erro_login']='<p style="background-color: rgba(200,50,50,.75); padding: .5em 1em .5em 1em;border-radius: 5px">As informações de e-mail e senha são inválidas!</p>';
	header('Location: loginForm.php');
	exit();
}
$user = mysqli_real_escape_string($conexao,$_POST['email']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

//$query="SELECT * FROM USER WHERE EMAIL=? AND SENHA=MD5(?)"
$query="SELECT * FROM funcionario WHERE email='{$user}' AND senha='{$senha}'";
$result=mysqli_query($conexao,$query);
$row=mysqli_num_rows($result);
if($row==1){
	$usuario=mysqli_fetch_assoc($result);
	$_SESSION['user']=$usuario['nome'];
	$_SESSION['msg']="";
	// $_SESSION['nome']=$result['nome'];
	// $_SESSION['nivel']=$result['nivel_acesso'];
	header('Location: painel.php');
	exit();
}else{
	$_SESSION['msg_erro_login']='<p style="background-color: rgba(200,50,50,.75); padding: .5em 1em .5em 1em;border-radius: 5px">As informações de e-mail e senha são inválidas!</p>';
	header('Location: loginForm.php');
	exit();
}