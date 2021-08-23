<?php
session_start();
include('validaLogin.php');

$dbh=new PDO('mysql:host=127.0.0.1;dbname=apurodb','root','');
//string base para mostrar todos os funcionarios
$sth=$dbh->prepare('SELECT * FROM `cliente` ORDER BY fidelidade DESC');
if(!empty($_GET['nomeCliente'])){
	$nome="%".trim($_GET['nomeCliente'])."%";
	$sth=$dbh->prepare('SELECT * FROM `cliente` WHERE `nome` LIKE :nome ORDER BY cidade');
	$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
}
if(!empty($_GET['cpfCliente'])){
	$cpf="%".trim($_GET['cpfCliente'])."%";
	$sth=$dbh->prepare('SELECT * FROM `cliente` WHERE `cpf` LIKE :cpf ORDER BY cidade');
	$sth->bindParam(':cpf', $cpf, PDO::PARAM_STR);
}
if(!empty($_GET['cidadeCliente'])){
	$cidade="%".trim($_GET['cidadeCliente'])."%";
	$sth=$dbh->prepare('SELECT * FROM `cliente` WHERE `cidade` LIKE :cidade ORDER BY fidelidade');
	$sth->bindParam(':cidade', $cidade, PDO::PARAM_STR);
}
//executa uma das tres strings ou a string padrão
$sth->execute();
//armazena todos os funcionarios resultantes de qualquer uma das consultas
$clientes=$sth->fetchAll(PDO::FETCH_ASSOC);





?>
<!DOCTYPE html>
<html>
<title>Apuro Limpeza - Painel de Clientes</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>
<header class="w3-bar w3-theme">
	<a href="painel.php" class="w3-bar-item w3-button testbtn w3-padding-16">Página Inicial</a>
	<a href="painelFuncionarios.php" class="w3-bar-item w3-button testbtn w3-padding-16">Funcionarios</a>
    <a href="painelClientes.php" class="w3-bar-item w3-button testbtn w3-padding-16"style="color:#000 !important; background-color:#f0f0f0 !important">Clientes</a>
    <a href="painelProdutos.php" class="w3-bar-item w3-button testbtn w3-padding-16">Produtos</a>
    <a href="painelFornecedores.php" class="w3-bar-item w3-button testbtn w3-padding-16">Fornecedores</a>
</header>



<section style="padding: 100px 0 100px 0">
    <h2 class="w3-center">Gerenciamento de Clientes</h2><br><br>
</div>

<div class="w3-row-padding">

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
<div class="w3-half">
<div class="w3-card-4 w3-container">
   

    <?php
      if(empty($clientes)){
      	echo '<br><ul class="w3-ul w3-margin-bottom"> 
          <li><i class="fas fa-map-marker-alt"></i>Não foram encontrados dados referentes a esta busca</li>
        </ul>';
      }else{
      	foreach($clientes as $cliente){
      		?>
      		<br><ul class="w3-ul w3-margin-bottom"> 
              <li><i class="fas fa-map-marker-alt"></i>Cliente <?php echo $cliente['nome'];?>: </li>
              <li>CPF: <?php echo $cliente['cpf'];?></li>
              <li>Nível de fidelidade: <?php echo $cliente['fidelidade'];?></li>
              <li>Telefone: <?php echo $cliente['telefone'];?></li>
              <li>Cidade: <?php echo $cliente['cidade'];?></li>
            </ul>
            <div class="w3-bar w3-theme">
              <a href="apagar.php?table=cliente&clausula=cpf&chave=<?php echo $cliente['cpf'];?>&from=painelClientes.php?nomeCliente=" class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</a>
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