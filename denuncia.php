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
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .campo{
        width: 300px;
        height: 20px;
        border: 1px solid #ddd;
        margin-top: 5px;
        box-sizing: border-box;
        padding-left: 10px;
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

<h5  class="center">1) Endereço do Crime</h5>

    <div id="map"></div>
    <script type="text/javascript">
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -22.118568, lng: -51.409165},
          zoom: 8,
          streetViewControl: false
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLQ9tQtFBR_zUM5tyBNh6JX3z-PuCVUg&callback=initMap"
    async defer></script>


  <div>

    

    <div>
      
      <h5  class="center">2) Dados</h5>
        <br><br>
        <form method="post" action="processa_denuncia.php?resp=cadastrado">

          Hora da Ocorrência: <input type="time" name="hora" class="campo" maxlenght="50" required><br>

          Data da Ocorrência: <input type="date" name="data" class="campo" maxlenght="50" required><br>

        </form>
    </div>

    <div>
      
      <h5  class="center">3) Informações Adicionais </h5>

      <form method="post" action="processa_denuncia.php?resp=cadastrado">

        Genero da Vítima:   <br> <br>       
        
        
        <label class="container">
        <input type="radio" name="genero" value="1">
        <span class="checkmark"></span>
        </label>Feminino<br>   

        
        <label class="container">
        <input type="radio" name="genero" value="0" >
        <span class="checkmark"></span>
        </label>Masculino<br>   

        
        <label class="container">
        <input type="radio" name="genero" value="NULL" >
        <span class="checkmark"></span>
        </label>Outro

        <BR>
        <BR>
        <BR>


        Fez Boletim de Ocorrência? <br><br>

        <label class="container">
        <input type="radio" name="fezBO" value="1">
        <span class="checkmark"></span>
        </label>Sim<br>   

        
        <label class="container">
        <input type="radio" name="fezBO" value="0">
        <span class="checkmark"></span>
        </label>Não<br>   


        <BR>
        <BR>
        Se foi roubo, objeto roubado: <br><Br>

        <label class="container">
        <input type="checkbox" name="objRoubado" value="1">
        <span class="checkmark"></span>
        </label>Bolsa<br>

        
        <label class="container">
        <input type="checkbox" name="objRoubado" value="2">
        <span class="checkmark"></span>
        </label>Carteira<br>

        
        <label class="container">
        <input type="checkbox" name="objRoubado" value="3">
        <span class="checkmark"></span>
        </label>Documentos<br>

        
        <label class="container">
        <input type="checkbox" name="objRoubado" value="4">
        <span class="checkmark"></span>
        </label>Celular<br>

        
        <label class="container">
        <input type="checkbox" name="objRoubado" value="5">
        <span class="checkmark"></span>
        </label>Relógio<br>

        
        <label class="container">
        <input type="checkbox" name="objRoubado" value="6">
        <span class="checkmark"></span>
        </label>Carro<br>

        <BR>
        <BR>
        
        Tipo de Risco: <br><Br>

        <label class="container">
        <input type="checkbox" name="codRisco" value="1">
        <span class="checkmark"></span>
        </label>Crime<br>

        
        <!--<label class="container">
        <input type="checkbox" name="codRisco" value="2">
        <span class="checkmark"></span>
        </label>Acidente<br>-->

         <input type="submit" value="Salvar" class="btn">
      </form>



    </div>


  </div>

    <!-- COMEÇO DO RODAPÉ -->
  
  <footer class="page-footer" id="red-contato">
  
    <div class="footer-copyright">
      <div class="container">
        <center>Desenvolvido por Dielme</center>
      </div>
    </div>
  </footer>
  <!-- FIM DO RODAPÉ -->


  </body>
</html>


<?php
  if (isset($_GET['respLogin'])){
   if($_GET['respLogin'] == 'sucesso'){

?>
<script type="text/javascript">
  alert("Login realizado com sucesso!");
</script>

<?php } }
 if (isset($_GET['respCadastro'])){
   if($_GET['respCadastro'] == 'sucesso'){

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
