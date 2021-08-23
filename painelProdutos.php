<?php
session_start();
include('validaLogin.php');
include("conect.php");
if(isset($_POST['codProduto'])){
	$cod=mysqli_real_escape_string($conexao, trim($_POST['codProduto']));
	$marca=mysqli_real_escape_string($conexao, trim($_POST['marcaProduto']));
	$descricao=mysqli_real_escape_string($conexao, trim($_POST['descProduto']));
	$custoproduto=mysqli_real_escape_string($conexao, trim($_POST['custoProduto']));
	$precoproduto=mysqli_real_escape_string($conexao, trim($_POST['precoProduto']));
	$rendproduto=mysqli_real_escape_string($conexao, trim($_POST['rendProduto']));
	print_r($_POST);

	$sql="UPDATE produto SET marca='$marca', descricao='$descricao', rendimento='$rendproduto', custo=$custoproduto, preco_venda=$precoproduto WHERE codigo_prod=$cod";
	if($conexao->query($sql)===TRUE){
		$_SESSION['statusCadastro']=true;
	}
	//$conexao->close();
	header('Location: painelProdutos.php');
	exit;
}
$dbh=new PDO('mysql:host=127.0.0.1;dbname=apurodb','root','');
//string base para mostrar todos os funcionarios
$sth=$dbh->prepare('SELECT * FROM `produto` ORDER BY preco_venda DESC');
if(!empty($_GET['preco'])){
	$sth=$dbh->prepare('SELECT * FROM `produto` ORDER BY preco_venda DESC');
}
if(!empty($_GET['custo'])){
	$sth=$dbh->prepare('SELECT * FROM `produto` ORDER BY custo ASC');
}
if(!empty($_GET['marcaProduto'])){
	$marca="%".trim($_GET['marcaProduto'])."%";
	$sth=$dbh->prepare('SELECT * FROM `produto` WHERE `marca` LIKE :marca ORDER BY rendimento');
	$sth->bindParam(':marca', $marca, PDO::PARAM_STR);
}
if(!empty($_GET['descProduto'])){
	$descr="%".trim($_GET['descProduto'])."%";
	$sth=$dbh->prepare('SELECT * FROM `produto` WHERE `descricao` LIKE :descr ORDER BY marca');
	$sth->bindParam(':descr', $descr, PDO::PARAM_STR);
}
if(!empty($_GET['rendProduto'])){
	$rendimento="%".trim($_GET['rendProduto'])."%";
	$sth=$dbh->prepare('SELECT * FROM `produto` WHERE `rendimento` LIKE :rendimento ORDER BY marca');
	$sth->bindParam(':rendimento', $rendimento, PDO::PARAM_STR);
}
//executa uma das tres strings ou a string padrão
$sth->execute();
//armazena todos os funcionarios resultantes de qualquer uma das consultas
$produtos=$sth->fetchAll(PDO::FETCH_ASSOC);

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
    <?php if(isset($_SESSION['usuarioJaExiste'])){
          if($_SESSION['usuarioJaExiste']){
          echo '<a href="painelFuncionarios.php" style="background-color: darkred !important;" class="w3-bar-item w3-button testbtn w3-padding-16">Funcionário já existe!!</a>';
          $_SESSION['usuarioJaExiste']=null;}
    }
    if(isset($_SESSION['produtoJaCadastrado'])){
          if($_SESSION['produtoJaCadastrado']){
          echo '<a href="painelProdutos.php" style="background-color: darkred !important;" class="w3-bar-item w3-button testbtn w3-padding-16">Produto já cadastrado!!</a>';
          $_SESSION['usuarioJaExiste']=null;}
    }
if(isset($_SESSION['statusCadastro'])){
          if($_SESSION['statusCadastro']){
          echo '<a href="#" style="background-color: darkgreen !important;" class="w3-bar-item w3-button testbtn w3-padding-16">Cadastro realizado com sucesso!</a>';
          $_SESSION['statusCadastro']=null;}
    }
    ?>
</header>
<center><a  onclick="document.getElementById('id02').style.display='block'" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Cadastrar novo produto</a></center>

<div id="id02" class="w3-modal" style="padding: 1px 1px 1px 1px">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:60vw;">
      <form action="cadastro.php" method="POST" style="background-image: linear-gradient(to bottom right, cyan, violet">
      <header class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: rgba(250,250,250,.25) !important;"> 
        <span onclick="document.getElementById('id02').style.display='none'"
        class="w3-button w3-display-topright" style="color: rgba(0,0,0,.75); background-color: rgba(250,250,250,.25);">×</span>
        <h3 style=" color: black !important">Cadastro</h3>
        <h5 style=" color: black !important">Insira os dados do produto a ser cadastrado:</h5>
        
      </header>
      <div class="" style="padding: 5% 20% 5% 20%">
        
          <input type="text" name="marcaProduto" placeholder="Marca" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="descProduto" placeholder="Descrição/Função" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="rendProduto" placeholder="Rendimento" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="custoProduto" placeholder="Custo Aquisição" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="precoProduto" placeholder="Preço de Venda" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          
        
      </div>
      <footer class="w3-container w3-theme-l1" style="padding: 0rem 2rem 5rem 2rem; background: none !important">
        <center><button type="submit" style="width: 80%;border-radius: 50px;border: 1px solid grey;padding: 10px;">Salvar</button></center>
      </footer>
      </form>
    </div>
</div>

<div id="id06" class="w3-modal" style="padding: 1px 1px 1px 1px">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:60vw;">
      <form action="painelProdutos.php" method="POST" style="background-image: linear-gradient(to bottom right, cyan, violet">
      <header class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: rgba(250,250,250,.25) !important;"> 
        <span onclick="document.getElementById('id06').style.display='none'"
        class="w3-button w3-display-topright" style="color: rgba(0,0,0,.75); background-color: rgba(250,250,250,.25);">×</span>
        <h3 style=" color: black !important">Modificar</h3>
        <h5 style=" color: black !important">Insira os dados do produto a ser alterado:</h5>
        
      </header>
      <div class="" style="padding: 5% 20% 5% 20%">
        
          <input type="number" name="codProduto" placeholder="Código do produto" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="marcaProduto" placeholder="Marca" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="descProduto" placeholder="Descrição/Função" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey" data-mask="000.000.000-00" maxlength="11" autocomplete="off">
          <input type="text" name="rendProduto" placeholder="Rendimento" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="custoProduto" placeholder="Custo Aquisição" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="precoProduto" placeholder="Preço de Venda" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          
        
      </div>
      <footer class="w3-container w3-theme-l1" style="padding: 0rem 2rem 5rem 2rem; background: none !important">
        <center><button type="submit" style="width: 80%;border-radius: 50px;border: 1px solid grey;padding: 10px;">Salvar</button></center>
      </footer>
      </form>
    </div>
</div>



</header>



<section style="padding: 50px 0 100px 0" id="funcionarios">
    <h2 class="w3-center">Gerenciamento de Produtos</h2><br><br>
</div>

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
              <li>Descricao: <?php echo utf8_encode($produto['descricao']);?></li>
              <li>Rendimento: <?php echo $produto['rendimento'];?></li>
              <li>Código: <?php echo $produto['codigo_prod'];?></li>
              <li>Custo: R$<?php echo $produto['custo'];?></li>
              <li>Venda: R$<?php echo $produto['preco_venda'];?></li>
              <?php  
              	$sth_aux=$dbh->prepare('SELECT nome FROM `fornecedor` WHERE id = '.$produto['id_fornecedor']);
				$sth_aux->execute();
				$fornecedor=$sth_aux->fetch(PDO::FETCH_ASSOC);
				
					echo("<li>Supervisor: ".$fornecedor['nome']."</li>");
				
              ?>
            </ul>
            <div class="w3-bar w3-theme">
              <a href="apagar.php?table=produto&clausula=codigo_prod&chave=<?php echo $produto['codigo_prod'];?>&from=painelProdutos.php?nomeProduto=" class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</a>
              <button onclick="document.getElementById('id06').style.display='block'" class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
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