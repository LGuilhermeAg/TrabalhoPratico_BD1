<?php
session_start();
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


<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none;background-image: linear-gradient(to bottom right, cyan, violet);" id="mySidebar">
  <button class="" onclick="w3_close()" style="background: none; margin-top: -5%;margin-left: 80%;cursor: pointer;position: absolute; outline: none; background-color: rgba(250,250,250,.75);border-radius:5px !important;font-size: .75em !important; border: none; padding: 5px 10px 5px 10px">Fechar <i class="fa fa-remove"></i></button>
  <center><h1 class="w3-xxxlarge w3-text-theme">Apuro Limpeza</h1><hr style="width: 50vw;">
  
  
  <a href="#" class="w3-bar-item w3-button" style="background: none;text-align: center;">Link 3</a>
  <a  onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button" style="background: none;text-align: center;">Área Restrita</a></center>
</nav>




<header class="w3-container w3-theme w3-padding" id="myHeader" style="background-image: linear-gradient(to bottom right, cyan, violet);">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button" style="opacity: .25;"></i> 
  <div class="w3-center">
  <h4>A Escolha de Quem Entende de Limpeza</h4>
  <h1 class="w3-xxxlarge w3-animate-bottom">Apuro Limpeza</h1>
    <div class="w3-padding-32">
      <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" style="background-image: linear-gradient(to bottom left, pink, violet) !important; font-weight: 800;">Encomende Agora!</button>
    </div>
  </div>
</header>


<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:40vw;">
      <form action="login.php" method="POST" style="background-image: linear-gradient(to bottom right, cyan, violet">
      <header class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: rgba(250,250,250,.25) !important;"> 
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright" style="color: rgba(0,0,0,.75); background-color: rgba(250,250,250,.25);">×</span>
        <h3 style=" color: black !important">Login</h3>
        <h5 style=" color: black !important">Insira os seus dados de e-mail e senha cadastrados:</h5>
        <?php if(isset($_SESSION['msg_erro_login'])){
          echo $_SESSION['msg_erro_login'];
          $_SESSION['msg_erro_login']="";
        }?>
      </header>
      <div class="" style="padding: 5% 20% 5% 20%">
        
          <center>
          <input type="email" name="email" placeholder="e-mail" style="display:block; padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          <input type="password" name="senha" placeholder="senha" style="display:block; padding: 10px; margin: 10px; border-radius: 50px; width: 100%; border: 1px solid grey">
          </center>
        
      </div>
      <footer class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: none !important">
        <center><button type="submit" style="width: 80%;border-radius: 50px;border: 1px solid grey;padding: 10px;">Entrar</button></center>
      </footer>
      </form>
    </div>
</div>

<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Entrega Rápida</h3><br>
  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="-200 -100 1040 812" class="svg-inline--fa fa-shipping-fast fa-w-20 fa-3x"><path fill="currentColor" d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z" class=""></path></svg>
  <p style="margin-top: -10%;">Entrega até no mesmo dia para todo o<br>Médio-Piracicaba, na porta da sua<br><span style="font-size: 1.16rem">casa ou empresa!</span></p>
  </div>
</div>

<div class="w3-third">
    <div class="w3-card w3-container" style="min-height:460px">
    <h3>Variedade</h3><br>
    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="-200 -100 1040 812" class="svg-inline--fa fa-shipping-fast fa-w-20 fa-3x"><path fill="currentColor" d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z" class=""></path></svg>
    <p style="margin-top: -10%;">Produtos para qualquer limpeza completa e bem feita de diversos fornecedores!</p>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card w3-container" style="min-height:460px">
    <h3>Preço Justo</h3><br>
    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="-200 -100 1040 812" class="svg-inline--fa fa-shipping-fast fa-w-20 fa-3x"><path fill="currentColor" d="M271.06,144.3l54.27,14.3a8.59,8.59,0,0,1,6.63,8.1c0,4.6-4.09,8.4-9.12,8.4h-35.6a30,30,0,0,1-11.19-2.2c-5.24-2.2-11.28-1.7-15.3,2l-19,17.5a11.68,11.68,0,0,0-2.25,2.66,11.42,11.42,0,0,0,3.88,15.74,83.77,83.77,0,0,0,34.51,11.5V240c0,8.8,7.83,16,17.37,16h17.37c9.55,0,17.38-7.2,17.38-16V222.4c32.93-3.6,57.84-31,53.5-63-3.15-23-22.46-41.3-46.56-47.7L282.68,97.4a8.59,8.59,0,0,1-6.63-8.1c0-4.6,4.09-8.4,9.12-8.4h35.6A30,30,0,0,1,332,83.1c5.23,2.2,11.28,1.7,15.3-2l19-17.5A11.31,11.31,0,0,0,368.47,61a11.43,11.43,0,0,0-3.84-15.78,83.82,83.82,0,0,0-34.52-11.5V16c0-8.8-7.82-16-17.37-16H295.37C285.82,0,278,7.2,278,16V33.6c-32.89,3.6-57.85,31-53.51,63C227.63,119.6,247,137.9,271.06,144.3ZM565.27,328.1c-11.8-10.7-30.2-10-42.6,0L430.27,402a63.64,63.64,0,0,1-40,14H272a16,16,0,0,1,0-32h78.29c15.9,0,30.71-10.9,33.25-26.6a31.2,31.2,0,0,0,.46-5.46A32,32,0,0,0,352,320H192a117.66,117.66,0,0,0-74.1,26.29L71.4,384H16A16,16,0,0,0,0,400v96a16,16,0,0,0,16,16H372.77a64,64,0,0,0,40-14L564,377a32,32,0,0,0,1.28-48.9Z" class=""></path></svg>
    <p style="margin-top: -10%;">Produtos concentrados de alto rendimento são mais baratos e eficientes que produtos comuns!</p>
    </div>
  </div>
</div>

<div class="w3-container">
<hr><br><br>
<div class="w3-center">
  <h2>Fornecedores</h2>
</div>

<div class="w3-row">
  <center><div class="w3-col w3-container m2" style="border-right: 1px solid black;"><p>MRINA</p></div></center>
  <center><div class="w3-col w3-container m2" style="border-right: 1px solid black;"><p>DESPROL</p></div></center>
  <center><div class="w3-col w3-container m2" style="border-right: 1px solid black;"><p>QOTIMO</p></div></center>
  <center><div class="w3-col w3-container m2" style="border-right: 1px solid black;"><p>LIMPA PISO</p></div></center>
  <center><div class="w3-col w3-container m2" style="border-right: 1px solid black;"><p>RENOVA</p></div></center>
  <center><div class="w3-col w3-container m2"><p>E Muito Mais!!</p></div></center>
</div>
<br><br><br>
<br><br>
<h2 class="w3-center">Perguntas Frequentes</h2>
<button onclick="myAccFunc('Demo1')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align" style="box-shadow: 0px 0 5px  lightgrey; text-align: center !important; background-color: white !important; color: black !important">Os produtos são de procedência?</button>
<div id="Demo1" class="w3-hide">
  <div class="w3-container">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>
</div>
<button onclick="myAccFunc('Demo2')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align"  style="text-align: center !important; box-shadow: 0px 0 5px  lightgrey;background-color: white !important; color: black !important">Os produtos são de fabricação própria ou revenda?</button>
<div id="Demo2" class="w3-hide">
  <a href="#" class="w3-button w3-block w3-left-align">Link 1</a>
  <a href="#" class="w3-button w3-block w3-left-align">Link 2</a>
  <a href="#" class="w3-button w3-block w3-left-align">Link 3</a>
</div>
<button onclick="myAccFunc('Demo3')" class="w3-padding-16 w3-theme w3-button w3-block w3-left-align" style="text-align: center !important; box-shadow: 0px 0 5px  lightgrey;background-color: white !important; color: black !important">Em que região a Apuro Limpeza atende?</button>
<div id="Demo3" class="w3-hide w3-black">
  <div class="w3-container">
    <p>Accordion with Images:</p>
    <img src="img_snowtops.jpg" style="width:30%;" class="w3-animate-zoom">
    <p>French Alps</p>
  </div>
</div>
<center><button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" style="background-image: linear-gradient(to bottom right, pink, violet) !important; font-weight: 100;padding: 5px 25px 5px 25px;margin-top: 50px">Ver Mais</button></center>
<br>
<br>

<br><br>
<h2 class="w3-center">Alguma dúvida?</h2>
</div>

<div class="w3-row-padding">

<div class="w3-half">
<form class="w3-container w3-card-4">
  <h2>Entre em contato!</h2>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>Nome</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>Email</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="text" required>
    <label>Assunto</label>
  </div><br><br>

  
</form>
</div>
<div class="w3-half" style="margin-top: 4%;">
<div class="w3-card-4 w3-container">
<h2>Ou atravéz de nossos endereços e contato:</h2>
<ul class="w3-ul w3-margin-bottom"> 
  <li><i class="fas fa-map-marker-alt"></i>🚩 Rua Doná Guiguita, 127 - Bairro Santa Bárbara, João Monlevade - MG</li>
  <li>🕗 8h - 18h, de domingo a sábado!</li>
  <li>📞 (31) 99457-6780</li>
</ul>
<br>

<br>
</div>
</div>
</div>
  <br><br>
<hr>
<h2 class="w3-center">Nos Acompanhe!</h2>
<div class="w3-center">
  <br>
  <a class="w3-button " style="border-bottom: 2px solid lightblue;">Facebook</a>
  <a class="w3-button" href="https://instagram.com/apurolimpeza" target="_blank" style="border-bottom: 2px solid violet;">Instagram</a>
  <br><br>
  </div>
<br>


</div>

<br>

<!-- Footer -->
<footer class="w3-container w3-theme-dark w3-padding-16" style="background-image: linear-gradient(to top right, cyan, violet);color: black !important;">
    <center><h3>Apuro Limpeza</h3></center>
  <center><p>A Escolha de Quem Entende de Limpeza.<a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a></p></center>
  <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
    
    <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
  <center><a href="w3css_references.asp" class="w3-btn w3-theme-light" target="_blank" style="margin-right: -2.25%">Faça um Pedido Agora</a></center>
</footer>






<script>

function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "100%";
  x.style.fontSize = "40px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}


function openCity(evt, cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  var activebtn = document.getElementsByClassName("testbtn");
  for (i = 0; i < x.length; i++) {
    activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-dark-grey";
}

var mybtn = document.getElementsByClassName("testbtn")[0];
mybtn.click();


function myAccFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}


var slideIndex = 1;

function plusDivs(n) {
  slideIndex = slideIndex + n;
  showDivs(slideIndex);
}

function showDivs(n) {
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

showDivs(1);


function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 10);
  function frame() {
    if (width == 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}
</script>

</body>
</html>
