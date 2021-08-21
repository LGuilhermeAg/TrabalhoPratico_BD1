<?php
session_start();
include('conect.php');
if(empty($_POST['email']) || empty($_POST['senha'])){
	header('Location: index.php');
	exit();
}
$user = mysqli_real_escape_string($conexao,$_POST['email']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

//$query="SELECT * FROM USER WHERE EMAIL=? AND SENHA=MD5(?)"
$query="SELECT id, email FROM user WHERE email='{$user}' AND senha='{$senha}'";
$result=mysqli_query($conexao,$query);
$row=mysqli_num_rows($result);
if($row==1){
	$_SESSION['user']=$user;
	$_SESSION['msg']="";
	header('Location: painel.php');
	exit();
}else{
	$_SESSION['msg_erro_login']='<p style="background-color: rgba(200,50,50,.75); padding: .5em 1em .5em 1em;border-radius: 5px">As informações de e-mail e senha são inválidas!</p>';
	header('Location: index.php');
	exit();
}