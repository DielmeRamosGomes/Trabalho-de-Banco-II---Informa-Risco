<!DOCTYPE html>
<html>
  <head>
    <title>Denúncia</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">


  <!-- INCLUINDO JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <!-- INCLUINDO ANIMATE CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
  <!-- INCLUINDO MATERIALIZE CSS-->
  <link rel="stylesheet" href="assets/css/materialize.min.css">
  <!-- INCLUINDO WOW JavaScript -->
  <script src="assets/js/wow.min.js" type="text/javascript"></script>
  <!-- INCLUINDO MATERIALIZE JavaScript -->
  <script src="assets/js/materialize.min.js"></script>
  <!--ICONES MATERIALIZE -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Meus imports -->
  <!-- INCLUINDO  CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- INCUINDO JavaScript -->
  <script type="text/javascript" src="assets/js/function.js"></script>


    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>


    <!-- COMEÇO DO MENU -->

  <div class="navbar-fixed cover">
    <nav>
      <div class="nav-wrapper" id="menu">
        <div class="conj-texto-imagem">
          <a href="" class="brand-logo">
            <b class="txt">InformaRisco</b>
          </a>
        </div>
        <a href="#" class="sidenav-trigger" data-target="mobile-nav">
                <i class="material-icons">menu</i>
            </a>
        <ul class="right hide-on-med-and-down">
          <li><a class="item-menu" href="#red-sobrenos"><b>COMO FUNCIONA</b></a></li>
          <li><a class="item-menu" href="#red-sobrenos"><b>DENÚNCIA</b></a></li>
          <li><a class="item-menu" href="#red-contato"><b>CONTATO</b></a></li>
        </ul>
      </div>
    </nav>  
  </div>
  <!-- FIM DO MENU -->

<br>
<br>
<br>
<br>
<br>
<br>


<div>
<h5  class="center">ENTRE</h5>

<br><br>
 <form method="POST" action="login_vai.php">


  Email: <input type="email" name="email" class="campo" maxlenght="50"><br>

  Senha: <input type="password" name="senha" class="campo" maxlenght="40" <br>

  <input type="submit" value="ENTRAR" class="btn">
  </form>
</div>


<div>
    <h5  class="center">OU CRIE UMA CONTA</h5>
  
    <form method="post" action="processa.php">

    Nome: <input type="text" name="nome" class="campo" maxlenght="50" required=""><br>
          
    Email: <input type="email" name="email" class="campo" maxlenght="50" required=""><br>

    Senha: <input type="password" name="senha" class="campo" maxlenght="40" required=""><br>

    <input type="submit" value="SALVAR" class="btn">
      </form>
      
    </div>


    <!-- COMEÇO DO RODAPÉ -->
  
  <footer class="page-footer" id="red-contato">
  
    <div class="footer-copyright">
      <div class="container">
        <center>Desenvolvido por Dielme e Paulo</center>
      </div>
    </div>
  </footer>
  <!-- FIM DO RODAPÉ -->


  </body>
</html>


<?php
  if (isset($_GET['respCad'])){
   if($_GET['respCad'] == 'sucesso'){

?>
<script type="text/javascript">
  alert("Cadastro realizado com sucesso!");
</script>

<?php } }


/* 

Nome: <input type="text" name="nome" class="campo" maxlenght="50" required><br>
          
          Email: <input type="email" name="email" class="campo" maxlenght="50" required><br>

          Senha: <input type="password" name="senha" class="campo" maxlenght="40" required><br>

          <input type="submit" value="Salvar" class="btn">
*/

 ?>
