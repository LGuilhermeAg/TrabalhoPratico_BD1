<?php
session_start();
include('validaLogin.php');
?>
<!DOCTYPE html>
<html>
<title>Apuro Limpeza</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>



<h2>Ola, <?php echo ($_SESSION['user']);?></h2>
<a href="logout.php"><button>sair</button></a>


<section style="padding: 100px 0 100px 0">
    <h2 class="w3-center">Gerenciamento de Funcionários</h2><br><br>
</div>

<div class="w3-row-padding">

<div class="w3-half">
<form class="w3-container w3-card-4">
  <h2>Pesquise o funcionário desejado:</h2>
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
    <label>cargo</label>
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
  <li><i class="fas fa-map-marker-alt"></i>Funcionario (# ): </li>
  <li>CPF: </li>
  <li>Cargo: </li>
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