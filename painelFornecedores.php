<?php
session_start();
include('validaLogin.php');
include("conect.php");
if(isset($_POST['cnpjFornecedor1'])){
	$cnpj=mysqli_real_escape_string($conexao, trim($_POST['cnpjFornecedor1']));
	$nome=mysqli_real_escape_string($conexao, trim($_POST['nomeFornecedor1']));
	$local=mysqli_real_escape_string($conexao, trim($_POST['localFornecedor1']));
	$contato=mysqli_real_escape_string($conexao, trim($_POST['contatoFornecedor1']));
	print_r($_POST);

	$sql="UPDATE fornecedor SET nome='$nome', localidade='$local', contato='$contato' WHERE cnpj=$cnpj";
	if($conexao->query($sql)===TRUE){
		$_SESSION['statusCadastro']=true;
	}
	//$conexao->close();
	header('Location: painelFornecedores.php');
	exit;
}


$dbh=new PDO('mysql:host=127.0.0.1;dbname=apurodb','root','');
$sth=$dbh->prepare('SELECT * FROM `fornecedor` ORDER BY localidade DESC');
$sth->execute();
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
<center><a  onclick="document.getElementById('id03').style.display='block'" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Cadastrar novo fornecedor</a></center>
<div id="id03" class="w3-modal" style="padding: 1px 1px 1px 1px">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:60vw;">
      <form action="cadastro.php" method="POST" style="background-image: linear-gradient(to bottom right, cyan, violet">
      <header class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: rgba(250,250,250,.25) !important;"> 
        <span onclick="document.getElementById('id03').style.display='none'"
        class="w3-button w3-display-topright" style="color: rgba(0,0,0,.75); background-color: rgba(250,250,250,.25);">×</span>
        <h3 style=" color: black !important">Cadastro</h3>
        <h5 style=" color: black !important">Insira os dados do fornecedor a ser cadastrado:</h5>
        
      </header>
      <div class="" style="padding: 5% 20% 5% 20%">
        
          <input type="text" name="cnpjFornecedor" placeholder="CNPJ" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="nomeFornecedor" placeholder="Razão Social" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey" data-mask="000.000.000-00" maxlength="11" autocomplete="off">
          <input type="text" name="localFornecedor" placeholder="Localidade" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="contatoFornecedor" placeholder="Contato" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          
        
      </div>
      <footer class="w3-container w3-theme-l1" style="padding: 0rem 2rem 5rem 2rem; background: none !important">
        <center><button type="submit" style="width: 80%;border-radius: 50px;border: 1px solid grey;padding: 10px;">Salvar</button></center>
      </footer>
      </form>
    </div>
</div>


<div id="id07" class="w3-modal" style="padding: 1px 1px 1px 1px">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:60vw;">
      <form action="painelFornecedores.php" method="POST" style="background-image: linear-gradient(to bottom right, cyan, violet">
      <header class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: rgba(250,250,250,.25) !important;"> 
        <span onclick="document.getElementById('id07').style.display='none'"
        class="w3-button w3-display-topright" style="color: rgba(0,0,0,.75); background-color: rgba(250,250,250,.25);">×</span>
        <h3 style=" color: black !important">Modificar</h3>
        <h5 style=" color: black !important">Insira os dados do fornecedor a ser alterado:</h5>
        
      </header>
      <div class="" style="padding: 5% 20% 5% 20%">
        
          <input type="text" name="cnpjFornecedor1" placeholder="CNPJ" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="nomeFornecedor1" placeholder="Razão Social" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey" >
          <input type="text" name="localFornecedor1" placeholder="Localidade" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="contatoFornecedor1" placeholder="Contato" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          
        
      </div>
      <footer class="w3-container w3-theme-l1" style="padding: 0rem 2rem 5rem 2rem; background: none !important">
        <center><button type="submit" style="width: 80%;border-radius: 50px;border: 1px solid grey;padding: 10px;">Salvar</button></center>
      </footer>
      </form>
    </div>
</div>


</header>



<section style="padding: 50px 0 100px 0" id="funcionarios">
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
              <button onclick="document.getElementById('id07').style.display='block'" class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
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