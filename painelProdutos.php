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

if(isset($_GET['nomeProduto'])){
	$nome="%".trim($_GET['nomeProduto'])."%";
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=apurodb','root','');
	$sth = $dbh->prepare('SELECT * FROM `produto` WHERE `marca` LIKE :nome');
	$sth->bindParam(':nome',$nome,PDO::PARAM_STR);
	$sth->execute();
	$produtos=$sth->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>
<title>Apuro Limpeza - Gerenciamento de Produtos</title>
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
    <a href="painelProdutos.php" class="w3-bar-item w3-button testbtn w3-padding-16"style="color:#000 !important; background-color:#f0f0f0 !important">Produtos</a>
    <a href="painelFornecedores.php" class="w3-bar-item w3-button testbtn w3-padding-16">Fornecedores</a>
</header>



<section style="padding: 100px 0 100px 0" id="funcionarios">
    <h2 class="w3-center">Gerenciamento de Produtos</h2><br><br>
</div>

<div class="w3-row-padding">

<div class="w3-half">
<form class="w3-container w3-card-4" action="painelProdutos.php" method="GET">
  <h2>Pesquisar informações de Produtos:</h2>
  <div class="w3-section">      
    <input class="w3-input" type="text" name="nomeProduto">
    <label>Nome</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="text" name="marcaProduto">
    <label>Marca</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="text" name="rendimentoProduto">
    <label>Rendimento</label>
  </div>
  <button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white">Pesquisar</button>
  <br><br>

  
</form>
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
      if(empty($produtos)){
      	echo '<br><ul class="w3-ul w3-margin-bottom"> 
          <li><i class="fas fa-map-marker-alt"></i>Não foram encontrados dados referentes a esta busca</li>
        </ul>';
      }else{
      	foreach($produtos as $produto){
      		?>
      		<br><ul class="w3-ul w3-margin-bottom"> 
              <li><i class="fas fa-map-marker-alt"></i>Informações sobre <?php echo $produto['marca'];?>: </li>
              <li>Descricao: <?php echo $produto['descricao'];?></li>
              <li>Rendimento: <?php echo $produto['rendimento'];?></li>
              <li>Código: <?php echo $produto['codigo_prod'];?></li>
            </ul>
            <div class="w3-bar w3-theme">
              <a href="apagar.php?table=produto&clausula=codigo_prod&chave=<?php echo $produto['codigo_prod'];?>&from=painelProdutos.php?nomeProduto=" class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</a>
              <button class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
            </div><hr>
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