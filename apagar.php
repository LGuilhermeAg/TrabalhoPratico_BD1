<?php
include("conect.php");
session_start();
$table=$_GET['table'];
$clausula=$_GET['clausula'];
$chave=$_GET['chave'];
$from=$_GET['from'];
// $sql="DELETE FROM `$table` WHERE `$clausula` = `$chave`";
$sql="DELETE FROM ".trim($_GET['table'])." WHERE ".trim($_GET['clausula'])." = ".trim($_GET['chave']);
if($conexao->query($sql)===TRUE){
	$_SESSION['delete_status']=1;
	header('Location: '.$from);
}else{
	?>

<!DOCTYPE html>
<html>
<title>Apuro Limpeza - Painel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>
<header class="w3-bar w3-theme">
	<a href="painel.php" class="w3-bar-item w3-button testbtn w3-padding-16">Página Inicial</a>
	<a href="painelFuncionarios.php" class="w3-bar-item w3-button testbtn w3-padding-16">Funcionarios</a>
    <a href="painelClientes.php" class="w3-bar-item w3-button testbtn w3-padding-16">Clientes</a>
    <a href="painelProdutos.php" class="w3-bar-item w3-button testbtn w3-padding-16">Produtos</a>
    <a href="painelFornecedores.php" class="w3-bar-item w3-button testbtn w3-padding-16">Fornecedores</a>
</header>



<section style="padding: 100px 0 100px 0;min-height: 100vh;">
    <h2 class="w3-center">Houve um erro inesperado.</h2><br><br>
    <footer class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: none !important">
        <center><a href="<?php echo($from);?>" style="width: 80%;border-radius: 50px;border: 1px solid grey;padding: 10px;color: black;font-size: 1.25rem;text-decoration: none;font-family: inherit; padding: .75rem 5rem">Retornar</a></center>
      </footer>
</div>

</section>







<footer class="w3-container w3-theme-dark w3-padding-16" style="background-image: linear-gradient(to top right, cyan, violet);color: black !important;">
    <center><h3>Apuro Limpeza</h3></center>
  <center><p>A Escolha de Quem Entende de Limpeza.<a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a></p></center>
  <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
    
    <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
  <center><a href="w3css_references.asp" class="w3-btn w3-theme-light" target="_blank" style="margin-right: -2.25%">Faça um Pedido Agora</a></center>
</footer>


	<?php
}

?>