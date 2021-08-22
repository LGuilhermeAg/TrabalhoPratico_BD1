<?php
session_start();
include('validaLogin.php');

// class pesquisarFuncionario{
// 	public function porNome(nome){
// 		global $pdo;
// 		$query = $pdo->prepare("SELECT * FROM funcionario WHERE nome LIKE '%{$nome}%'");
// 		$query->execute();
// 		return $query->fetch();
// 	}
// }

if(isset($_GET['nomeFuncionario'])){
	$nomeFunc="%".trim($_GET['nomeFuncionario'])."%";
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=apurodb','root','');
	$sth = $dbh->prepare('SELECT * FROM `funcionario` WHERE `nome` LIKE :nome');
	$sth->bindParam(':nome',$nome,PDO::PARAM_STR);
	$sth->execute();
	$funcionarios=$sth->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>
<title>Apuro Limpeza - Área de Funcionários</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>
<header class="w3-bar w3-theme">
	<div class="w3-dropdown-hover">
        <button class="w3-button w3-theme w3-padding-16" style="color:#000 !important; background-color:#f0f0f0 !important">Ola, <?php echo ($_SESSION['user']);?> <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border" style="margin-top: 0px">
          <a href="logout.php" class="w3-bar-item w3-button">Sair</a>
        </div>
    </div>
	<a href="painelFuncionarios.php" class="w3-bar-item w3-button testbtn w3-padding-16">Funcionarios</a>
    <a href="painelClientes.php" class="w3-bar-item w3-button testbtn w3-padding-16">Clientes</a>
    <a href="painelProdutos.php" class="w3-bar-item w3-button testbtn w3-padding-16">Produtos</a>
    <a href="painelFornecedores.php" class="w3-bar-item w3-button testbtn w3-padding-16">Fornecedores</a>
</header>



<section style="padding: 100px 0 100px 0" id="funcionarios">

<div class="w3-row-padding">

<div class="w3-half">
<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <h2>Pesquisar informações de funcionários:</h2>
  <form class="w3-section">      
    <input class="w3-input" type="text" name="nomeFuncionario" placeholder="Nome">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Nome</button>
  </form>
  <form class="w3-section" action="painelFuncionarios.php" method="GET">      
    <input class="w3-input" type="text" name="cpfFuncionario" placeholder="CPF">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por CPF</button>
  </form>
  <form class="w3-section" action="painelFuncionarios.php" method="GET">      
    <input class="w3-input" type="text" name="cargoFuncionario" placeholder="Cargo">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Cargo</button>
  </form>
</div>
</div>
<div class="w3-half">
<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <h2>Pesquisar informações de Clientes:</h2>
  <form class="w3-section" action="painelClientes.php" method="GET">      
    <input class="w3-input" type="text" name="nomeCliente" placeholder="Nome">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Nome</button>
  </form>
  <form class="w3-section" action="painelClientes.php" method="GET">      
    <input class="w3-input" type="text" name="cpfCliente" placeholder="CPF">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por CPF</button>
  </form>
  <form class="w3-section" action="painelClientes.php" method="GET">      
    <input class="w3-input" type="text" name="cidadeCliente" placeholder="Cidade">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Cidade</button>
  </form>
  <hr>
  <form class="w3-section" action="painelClientes.php" method="GET">      
  	<center><button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 15px;">Ou pesquisar por Fidelidade</button></center>
  </form>
</div>
</div>

</section>


<section style="padding: 0 0 100px 0;margin-bottom:20vh">

<div class="w3-row-padding">

<div class="w3-half">
<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <h2>Pesquisar informações de Produtos:</h2>
  <form class="w3-section" action="painelProdutos.php" method="GET">      
    <input class="w3-input" type="text" name="marcaProduto" placeholder="Marca">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Marca</button>
  </form>
  <form class="w3-section" action="painelProdutos.php" method="GET">      
    <input class="w3-input" type="text" name="rendProduto" placeholder="Rendimento">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Rendimento</button>
  </form>
  <form class="w3-section" action="painelProdutos.php" method="GET">      
    <input class="w3-input" type="text" name="descProduto" placeholder="Funcao">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Funcao</button>
  </form>
  <form class="w3-section" action="painelProdutos.php" method="GET">      
    <input class="w3-input" type="text" name="codProduto" placeholder="Codigo">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Código</button>
  </form>
  <hr>
  <form class="w3-section" action="painelProdutos.php" method="GET">      
  	<button type="submit" name="preco" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 15px;">ordenar por Preço</button>
  </form>
  <form class="w3-section" action="painelProdutos.php" method="GET">      
  	<button type="submit" name="custo" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 15px;">ordenar por Custo</button>
  </form>
</div>
</div>
<div class="w3-half">
<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <h2>Pesquisar informações de Fornecedores:</h2>
  <form class="w3-section" action="painelFornecedores.php" method="GET">      
    <input class="w3-input" type="text" name="nomeFornecedor" placeholder="Nome">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Nome</button>
  </form>
  <form class="w3-section" action="painelFornecedores.php" method="GET">      
    <input class="w3-input" type="text" name="localFornecedor" placeholder="Cidade, estado..">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por Localidade</button>
  </form>
  <form class="w3-section" action="painelFornecedores.php" method="GET">      
    <input class="w3-input" type="text" name="cnpjFornecedor" placeholder="CNPJ">
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Pesquisar por CNPJ</button>
  </form>
  
</div>
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