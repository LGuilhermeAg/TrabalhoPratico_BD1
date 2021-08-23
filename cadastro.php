<?php
session_start();
include("conect.php");
if(isset($_POST['nomeFuncionario'])){
	$nome=mysqli_real_escape_string($conexao, trim($_POST['nomeFuncionario']));
	$cpf=mysqli_real_escape_string($conexao, trim($_POST['cpfFuncionario']));
	$cargo=mysqli_real_escape_string($conexao, trim($_POST['cargoFuncionario']));
	$telefone=mysqli_real_escape_string($conexao, trim($_POST['telFuncionario']));
	$endereco=mysqli_real_escape_string($conexao, trim($_POST['endFuncionario']));
	$email=mysqli_real_escape_string($conexao, trim($_POST['email']));
	$senha=mysqli_real_escape_string($conexao, trim($_POST['senha']));
	$nivel=mysqli_real_escape_string($conexao, trim($_POST['nivelAcesso']));
	print_r($_POST);

	$sql="SELECT COUNT(*) AS TOTAL FROM funcionario WHERE cpf = ".$cpf;
	$result=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row['TOTAL']==1){
		$_SESSION['usuarioJaExiste']=true;
		header('Location: painel.php');
		exit;
	}
	$sql="INSERT INTO funcionario (cpf,nome,cargo,telefone,endereco,email,senha,nivel_acesso,data_admissao) VALUES ($cpf,'$nome','$cargo','$telefone','$endereco','$email','$senha',$nivel,NOW())";
	if($conexao->query($sql)===TRUE){
		$_SESSION['statusCadastro']=true;
	}
	//$conexao->close();
	header('Location: painel.php');
	exit;
}
//---------------------------------------------
if(isset($_POST['marcaProduto'])){
	$marca=mysqli_real_escape_string($conexao, trim($_POST['marcaProduto']));
	$desc=mysqli_real_escape_string($conexao, trim($_POST['descProduto']));
	$rendimento=mysqli_real_escape_string($conexao, trim($_POST['rendProduto']));
	$custo=mysqli_real_escape_string($conexao, trim($_POST['custoProduto']));
	$preco=mysqli_real_escape_string($conexao, trim($_POST['precoProduto']));
	print_r($_POST);

	$sql="SELECT COUNT(*) AS TOTAL FROM produto WHERE marca = '".$marca."'";
	$result=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row['TOTAL']==1){
		$_SESSION['produtoJaCadastrado']=true;
		header('Location: painel.php');
		exit;
	}
	$sql="INSERT INTO produto (marca,descricao,rendimento,custo,preco_venda,id_fornecedor) VALUES ('$marca','$desc','$rendimento',$custo,$preco,2)";
	if($conexao->query($sql)===TRUE){
		$_SESSION['statusCadastro']=true;
	}
	//$conexao->close();
	header('Location: painel.php');
	exit;
}
//---------------------------------
if(isset($_POST['cnpjFornecedor'])){
	$cnpj=mysqli_real_escape_string($conexao, trim($_POST['cnpjFornecedor']));
	$nomeFornecedor=mysqli_real_escape_string($conexao, trim($_POST['nomeFornecedor']));
	$local=mysqli_real_escape_string($conexao, trim($_POST['localFornecedor']));
	$contato=mysqli_real_escape_string($conexao, trim($_POST['contatoFornecedor']));
	print_r($_POST);

	$sql="SELECT COUNT(*) AS TOTAL FROM fornecedor WHERE cnpj = ".$cnpj;
	$result=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row['TOTAL']==1){
		$_SESSION['fornecedorJaCadastrado']=true;
		header('Location: painel.php');
		exit;
	}
	$sql="INSERT INTO fornecedor (cnpj,nome,localidade,contato) VALUES ($cnpj,'$nomeFornecedor','$local','$contato')";
	if($conexao->query($sql)===TRUE){
		$_SESSION['statusCadastro']=true;
	}
	//$conexao->close();
	header('Location: painel.php');
	exit;
}

//---------------------------------
if(isset($_POST['cpfVendedor'])){
	$cpfc=mysqli_real_escape_string($conexao, trim($_POST['cpfCliente']));
	$cpfv=mysqli_real_escape_string($conexao, trim($_POST['cpfVendedor']));
	$cod=mysqli_real_escape_string($conexao, trim($_POST['codigoProduto']));
	print_r($_POST);

	$sql="INSERT INTO venda (cpf_cliente,cpf_vendedor,codigo_produto) VALUES (1990809685,1234567891,$cod)";
	if($conexao->query($sql)===TRUE){
		$_SESSION['statusCadastro']=true;
	}
	//$conexao->close();
	header('Location: painel.php');
	exit;
}


?>