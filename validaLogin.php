<?php

//session_start();
if(!$_SESSION['user']){
	$_SESSION['msg_erro_login']='<p style="background-color: rgba(200,50,50,.75); padding: .5em 1em .5em 1em;border-radius: 5px">Você precisa ser um funcionário autenticado para acessar esta página</p>';
	header('Location: loginForm.php');
}

?>