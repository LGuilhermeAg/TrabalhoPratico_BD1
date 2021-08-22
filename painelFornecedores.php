<?php
session_start();
include('validaLogin.php');


$dbh=new PDO('mysql:host=127.0.0.1;dbname=apurodb','root','');
//string base para mostrar todos os funcionarios
$sth=$dbh->prepare('SELECT * FROM `fornecedor` ORDER BY localidade DESC');
if(!empty($_GET['nomeFornecedor'])){
	$nome="%".trim($_GET['nomeFornecedor'])."%";
	$sth=$dbh->prepare('SELECT * FROM `fornecedor` WHERE `nome` LIKE :nome ORDER BY localidade');
	$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
}
if(!empty($_GET['cnpjFornecedor'])){
	$cnpj="%".trim($_GET['cnpjFornecedor'])."%";
	$sth=$dbh->prepare('SELECT * FROM `fornecedor` WHERE `cnpj` LIKE :cnpj');
	$sth->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
}
if(!empty($_GET['localFornecedor'])){
	$localidade="%".trim($_GET['localFornecedor'])."%";
	$sth=$dbh->prepare('SELECT * FROM `fornecedor` WHERE `localidade` LIKE :localidade ORDER BY id');
	$sth->bindParam(':localidade', $localidade, PDO::PARAM_STR);
}
//executa uma das tres strings ou a string padrão
$sth->execute();
//armazena todos os funcionarios resultantes de qualquer uma das consultas
$fornecedores=$sth->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<title>Apuro Limpeza - Gerenciamento de Fornecedores</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>
<header class="w3-bar w3-theme">
	<a href="painel.php" class="w3-bar-item w3-button testbtn w3-padding-16">Página Inicial</a>
	<a href="painelFuncionarios.php" class="w3-bar-item w3-button testbtn w3-padding-16" >Funcionarios</a>
    <a href="painelClientes.php" class="w3-bar-item w3-button testbtn w3-padding-16">Clientes</a>
    <a href="painelProdutos.php" class="w3-bar-item w3-button testbtn w3-padding-16">Produtos</a>
    <a href="painelFornecedores.php" class="w3-bar-item w3-button testbtn w3-padding-16"style="color:#000 !important; background-color:#f0f0f0 !important">Fornecedores</a>
</header>



<section style="padding: 100px 0 100px 0" id="funcionarios">
    <h2 class="w3-center">Gerenciamento de Fornecedores</h2><br><br>
</div>

<div class="w3-row-padding">

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
<div class="w3-half">
<div class="w3-card-4 w3-container">
    <!-- <div class="w3-dropdown-hover">
        <button class="w3-button w3-theme">Pesquisar <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
          <a href="#" class="w3-bar-item w3-button">Link 1</a>
          <a href="#" class="w3-bar-item w3-button">Link 2</a>
          <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>
      </div> -->

<!-- <ul class="w3-ul w3-margin-bottom"> 
  <li><i class="fas fa-map-marker-alt"></i>Funcionario (# ): </li>
  <li>CPF: </li>
  <li>Cargo: </li>
  <li>Telefone:</li>
</ul> 

    <div class="w3-bar w3-theme">
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</button>
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
    </div>-->

    <?php
      if(empty($fornecedores)){
      	echo '<br><ul class="w3-ul w3-margin-bottom"> 
          <li><i class="fas fa-map-marker-alt"></i>Não foram encontrados dados referentes a esta busca</li>
        </ul>';
      }else{
      	foreach($fornecedores as $fornecedor){
      		?>
      		<br><ul class="w3-ul w3-margin-bottom"> 
              <li><i class="fas fa-map-marker-alt"></i>Informações sobre <?php echo $fornecedor['nome'];?>: </li>
              <li>CNPJ: <?php echo $fornecedor['cnpj'];?></li>
              <li>Localidade: <?php echo $fornecedor['localidade'];?></li>
              <li>Contato: <?php echo $fornecedor['contato'];?></li>
              <li>Código: <?php echo $fornecedor['id'];?></li>
            </ul>
            <div class="w3-bar w3-theme">
              <a href="apagar.php?table=fornecedor&clausula=cnpj&chave=<?php echo $fornecedor['cnpj'];?>&from=painelFornecedores.php?nomeFornecedor=" class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</a>
              <button class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
            </div>
            <hr>
            <?php
      	}
      }
    ?>
    
<br>
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