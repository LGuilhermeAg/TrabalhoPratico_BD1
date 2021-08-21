<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>Apuro Limpeza - Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>
<div id="id01" class="w3-modal" style="display:block;background-image: linear-gradient(to top left, cyan, violet);">
    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:40vw;box-shadow: 0px 50px 1000px 0px rgba(0,0,0,.5);">
      <form action="login.php" method="POST" style="background-image: linear-gradient(to bottom right, cyan, violet);">
      <header class="w3-container w3-theme-l1" style="padding: 1rem 2rem 1rem 2rem; background: rgba(250,250,250,.25) !important;"> 
        <a href="index.php"
        class="w3-button w3-display-topright" style="color: rgba(0,0,0,.75); background-color: rgba(250,250,250,.25);">×</a>
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
</body>
</html>