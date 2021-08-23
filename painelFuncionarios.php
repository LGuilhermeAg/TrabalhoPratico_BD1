<?php
session_start();
include('validaLogin.php');

if(!isset($_GET)){
	header('Location: painel.php');
	exit;
}
$dbh=new PDO('mysql:host=127.0.0.1;dbname=apurodb','root','');
//string base para mostrar todos os funcionarios
$sth=$dbh->prepare('SELECT * FROM `funcionario` ORDER BY data_admissao');
if(!empty($_GET['nomeFuncionario'])){
	$nome="%".trim($_GET['nomeFuncionario'])."%";
	$sth=$dbh->prepare('SELECT * FROM `funcionario` WHERE `nome` LIKE :nome ORDER BY cargo');
	$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
}
if(!empty($_GET['cpfFuncionario'])){
	$cpf="%".trim($_GET['cpfFuncionario'])."%";
	$sth=$dbh->prepare('SELECT * FROM `funcionario` WHERE `cpf` LIKE :cpf ORDER BY cargo');
	$sth->bindParam(':cpf', $cpf, PDO::PARAM_STR);
}
if(!empty($_GET['cargoFuncionario'])){
	$cargo="%".trim($_GET['cargoFuncionario'])."%";
	$sth=$dbh->prepare('SELECT * FROM `funcionario` WHERE `cargo` LIKE :cargo ORDER BY cargo');
	$sth->bindParam(':cargo', $cargo, PDO::PARAM_STR);
}
//executa uma das tres strings ou a string padrão
$sth->execute();
//armazena todos os funcionarios resultantes de qualquer uma das consultas
$funcionarios=$sth->fetchAll(PDO::FETCH_ASSOC);

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
	<a href="painel.php" class="w3-bar-item w3-button testbtn w3-padding-16">Página Inicial</a>
	<a href="painelFuncionarios.php" class="w3-bar-item w3-button testbtn w3-padding-16" style="color:#000 !important; background-color:#f0f0f0 !important">Funcionarios</a>
    <a href="painelClientes.php" class="w3-bar-item w3-button testbtn w3-padding-16">Clientes</a>
    <a href="painelProdutos.php" class="w3-bar-item w3-button testbtn w3-padding-16">Produtos</a>
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
<center><a  onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 0 0 15px 15px;">Cadastrar novo funcionário</a></center>

<div id="id01" class="w3-modal" style="padding: 1px 1px 1px 1px">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:60vw;">
      <form action="cadastro.php" method="POST" style="background-image: linear-gradient(to bottom right, cyan, violet">
      <header class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: rgba(250,250,250,.25) !important;"> 
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright" style="color: rgba(0,0,0,.75); background-color: rgba(250,250,250,.25);">×</span>
        <h3 style=" color: black !important">Cadastro</h3>
        <h5 style=" color: black !important">Insira os dados do(a) funcionário(a) a ser cadastrado:</h5>
        
      </header>
      <div class="" style="padding: 5% 20% 5% 20%">
        
          <input type="text" name="nomeFuncionario" placeholder="Nome" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="cpfFuncionario" placeholder="CPF" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey" data-mask="000.000.000-00" maxlength="11" autocomplete="off">
          <input type="text" name="cargoFuncionario" placeholder="Cargo" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="telFuncionario" placeholder="Telefone pessoal" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="text" name="endFuncionario" placeholder="Endereço" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="email" name="email" placeholder="e-mail" style="padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="password" name="senha" placeholder="senha" style=" padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <select name="nivelAcesso" style=" padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          	<option value="0">Nível de Acesso: Baixo</option>
          	<option value="1">Nível de Acesso: Alto</option>
          </select>
        
      </div>
      <footer class="w3-container w3-theme-l1" style="padding: 0rem 2rem 5rem 2rem; background: none !important">
        <center><button type="submit" style="width: 80%;border-radius: 50px;border: 1px solid grey;padding: 10px;">Salvar</button></center>
      </footer>
      </form>
    </div>
</div>

</header>



<section style="padding: 50px 0 100px 0" id="funcionarios">
    <h2 class="w3-center">Gerenciamento de Funcionários</h2><br><br>
</div>

<div class="w3-row-padding">

<div class="w3-half">

<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <h2>Pesquisar informações de funcionários:</h2>
  <form class="w3-section" action="painelFuncionarios.php" method="GET">      
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
  <hr>
  <form class="w3-section" action="painelFuncionarios.php" method="GET">      
  	<center><button type="submit" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 15px;">Ou pesquisar por Tempo na Empresa</button></center>
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
      if(empty($funcionarios)){
      	echo '<br><ul class="w3-ul w3-margin-bottom"> 
          <li><i class="fas fa-map-marker-alt"></i>Não foram encontrados dados referentes a esta busca</li>
        </ul>';
      }else{
      	foreach($funcionarios as $funcionario){
      		?>
      		<br><ul class="w3-ul w3-margin-bottom"> 
              <li><i class="fas fa-map-marker-alt"></i>Informações sobre <?php echo $funcionario['nome'];?>: </li>
              <li>CPF: <?php echo $funcionario['cpf'];?></li>
              <li>Cargo: <?php echo $funcionario['cargo'];?></li>
              <li>Telefone: <?php echo $funcionario['telefone'];?></li>
              <li>Endereço: <?php echo $funcionario['endereco'];?></li>
              <?php  
              	$sth_aux=$dbh->prepare('SELECT nome FROM `funcionario` WHERE cpf = '.$funcionario['cpf_supervisor']);
				$sth_aux->execute();
				$supervisor=$sth_aux->fetch(PDO::FETCH_ASSOC);
				if($supervisor['nome']!=null){
					echo("<li>Supervisor: ".$supervisor['nome']."</li>");
				}
              ?>
              <li>Data de admissão: <?php echo $funcionario['data_admissao'];?></li>
            </ul>
            <div class="w3-bar w3-theme">
              <a href="apagar.php?table=funcionario&clausula=cpf&chave=<?php echo $funcionario['cpf'];?>&from=painelFuncionarios.php?nomeFuncionario=" class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</a>
              <button class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
            </div>
            <hr>
            <?php
      	}
      }
    ?>
    
<br>
</section>

<!-- <section style="padding: 100px 0 100px 0">
    <h2 class="w3-center">Gerenciamento de Clientes</h2><br><br>
</div>

<div class="w3-row-padding">

<div class="w3-half">
<form class="w3-container w3-card-4">
  <h2>Pesquise o Cliente desejado:</h2>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>Nome</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>cpf</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>Cidade</label>
  </div><br><br>

  
</form>
</div>
<div class="w3-half">
<div class="w3-card-4 w3-container">
    <div class="w3-dropdown-hover">
        <button class="w3-button w3-theme">Pesquisar <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
          <a href="#" class="w3-bar-item w3-button">Link 1</a>
          <a href="#" class="w3-bar-item w3-button">Link 2</a>
          <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>
      </div>
<ul class="w3-ul w3-margin-bottom"> 
  <li><i class="fas fa-map-marker-alt"></i>Cliente: (# ): </li>
  <li>CPF: </li>
  <li>Fidelidade: </li>
  <li>Telefone:</li>
</ul>

    <div class="w3-bar w3-theme">
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</button>
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Cadastrar</button>
    </div>
    
<br>
</section>


<section style="padding: 100px 0 100px 0">
    <h2 class="w3-center">Gerenciamento de Produtos</h2><br><br>
</div>

<div class="w3-row-padding">

<div class="w3-half">
<form class="w3-container w3-card-4">
  <h2>Pesquise o produto desejado:</h2>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>Nome</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>Marca</label>
  </div>
  <br><br>

  
</form>
</div>
<div class="w3-half">
<div class="w3-card-4 w3-container">
    <div class="w3-dropdown-hover">
        <button class="w3-button w3-theme">Pesquisar <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
          <a href="#" class="w3-bar-item w3-button">Link 1</a>
          <a href="#" class="w3-bar-item w3-button">Link 2</a>
          <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>
      </div>
<ul class="w3-ul w3-margin-bottom"> 
  <li><i class="fas fa-map-marker-alt"></i>Produto (# ): </li>
  <li>Nome: </li>
  <li>Marca: </li>
  <li>Rendimento:</li>
</ul>

    <div class="w3-bar w3-theme">
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</button>
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Cadastrar</button>
    </div>
    
<br>
</section>



<section style="padding: 100px 0 300px 0">
    <h2 class="w3-center">Gerenciamento de Fornecedores</h2><br><br>
</div>

<div class="w3-row-padding">

<div class="w3-half">
<form class="w3-container w3-card-4">
  <h2>Pesquise o fornecedor desejado:</h2>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>Nome</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>CNPJ</label>
  </div>
  <br><br>

  
</form>
</div>
<div class="w3-half">
<div class="w3-card-4 w3-container">
    <div class="w3-dropdown-hover">
        <button class="w3-button w3-theme">Pesquisar <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
          <a href="#" class="w3-bar-item w3-button">Link 1</a>
          <a href="#" class="w3-bar-item w3-button">Link 2</a>
          <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>
      </div>
<ul class="w3-ul w3-margin-bottom"> 
  <li><i class="fas fa-map-marker-alt"></i>Fornecedor (# ): </li>
  <li>CNPJ: </li>
  <li>Contato: </li>
</ul>

    <div class="w3-bar w3-theme">
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Apagar</button>
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Modificar</button>
      <button class="w3-bar-item w3-button testbtn w3-padding-16">Cadastrar</button>
    </div>
    
<br>
</section> -->

















<footer class="w3-container w3-theme-dark w3-padding-16" style="background-image: linear-gradient(to top right, cyan, violet);color: black !important;">
    <center><h3>Apuro Limpeza</h3></center>
  <center><p>A Escolha de Quem Entende de Limpeza.<a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a></p></center>
  <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
    
    <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
  <center><a href="w3css_references.asp" class="w3-btn w3-theme-light" target="_blank" style="margin-right: -2.25%">Faça um Pedido Agora</a></center>
</footer>