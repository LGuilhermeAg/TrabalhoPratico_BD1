<?php
session_start();
include('validaLogin.php');

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

<div id="id03" class="w3-modal" style="padding: 1px 1px 1px 1px">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:60vw;">
      <form action="cadastro.php" method="POST" style="background-image: linear-gradient(to bottom right, cyan, violet">
      <header class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: rgba(250,250,250,.25) !important;"> 
        <span onclick="document.getElementById('id03').style.display='none'"
        class="w3-button w3-display-topright" style="color: rgba(0,0,0,.75); background-color: rgba(250,250,250,.25);">×</span>
        <h3 style=" color: black !important">Cadastro</h3>
        <h5 style=" color: black !important">Insira os dados do produto a ser cadastrado:</h5>
        
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


	

   

<section style="padding: 50px 0 100px 0" id="funcionarios">

<div class="w3-row-padding">

<div class="w3-half">
	<a  onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 15px 15px 0 0;">Cadastrar novo funcionário</a>
<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <button onclick="myAccFunc('Demo1')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align" style="text-align: center !important; background-color: white !important; color: black !important;font-family: inherit; font-size: 1.5em">Pesquisar informações de funcionários <i class="fa fa-caret-down"></i></button>
  <div id="Demo1" class="w3-hide">
  <div class="w3-container">
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
</div></div>
</div>
</div>


<div class="w3-half">
	<button class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 15px 15px 0 0;width: 100px;color:rgba(0,0,0,0);" disabled>x</button>
<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <button onclick="myAccFunc('Demo2')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align" style="text-align: center !important; background-color: white !important; color: black !important;font-family: inherit; font-size: 1.5em">Pesquisar informações de Clientes <i class="fa fa-caret-down"></i></button>
  <div id="Demo2" class="w3-hide">
  <div class="w3-container">
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
  </form></div></div>
</div>
</div>

</section>


<section style="padding: 0 0 100px 0;margin-bottom:20vh">

<div class="w3-row-padding">

<div class="w3-half">
	<a  onclick="document.getElementById('id02').style.display='block'" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 15px 15px 0 0;">Cadastrar novo Produto</a>
<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <button onclick="myAccFunc('Demo3')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align" style="text-align: center !important; background-color: white !important; color: black !important;font-family: inherit; font-size: 1.5em">Pesquisar informações de Produtos <i class="fa fa-caret-down"></i></button>
  <div id="Demo3" class="w3-hide">
  <div class="w3-container">
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
  </form></div></div>
</div>
</div>


<div class="w3-half">
	<a  onclick="document.getElementById('id03').style.display='block'" class="w3-bar-item w3-button testbtn w3-padding-16" style="background-color:rgba(0,0,0,.9);color: white; border-radius: 15px 15px 0 0;">Cadastrar novo fornecedor</a>
<div class="w3-container w3-card-4" style="padding-bottom: 2rem">
  <button onclick="myAccFunc('Demo4')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align" style="text-align: center !important; background-color: white !important; color: black !important;font-family: inherit; font-size: 1.5em">Pesquisar informações de Fornecedores <i class="fa fa-caret-down"></i></button>
  <div id="Demo4" class="w3-hide">
  <div class="w3-container">
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
  </form></div></div>
  
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

<script type="text/javascript">
	
	function myAccFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</body></html>