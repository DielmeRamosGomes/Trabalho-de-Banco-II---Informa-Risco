<?php 

include_once("conexao.php");
//include_once("login_vai.php");

$codRisco = $_POST['codRisco'];
$hora = $_POST['hora'];
$data = $_POST['data'];
$codusuario = $_SESSION['usuario_sessao'];

$sql = "CALL CADASTRO_BOLETIM_OCORRENCIA('$codRisco','$codusuario','$hora','$data');" ;

$salvar = mysqli_query($conexao,$sql) ;
$row_total = mysqli_fetch_array($salvar);

if ($row_total > 0){
  $_SESSION['codBoletim_sessao'] = $row_total['codBoletim'] ;
  $codBoletim_sessao = $_SESSION['codBoletim_sessao'] ;
}

mysqli_next_result($conexao);

$nome = $_POST['name'];
$endereco = $_POST['address'];
$latitude =  $_POST['lat'];
$longitude =  $_POST['lng'];
$tipo = $_POST['type'];

$sql = "CALL CADASTRO_MARKERS('$nome','$endereco', '$latitude', '$longitude', '$tipo');" ;

$salvar = mysqli_query($conexao,$sql);
$row_total = mysqli_fetch_array($salvar);

if ($row_total > 0){
  $_SESSION['codEndereco_sessao'] = $row_total['id'] ;
  $codEndereco_sessao = $_SESSION['codEndereco_sessao'] ;
}

mysqli_next_result($conexao);

$genero = $_POST['genero'];
$fezBO = $_POST['fezBO'];
$objRoubado = $_POST['objRoubado'];

$sql = "CALL CADASTRO_INFORMACOES_ADICIONAIS('$codBoletim_sessao','$genero','$fezBO','$objRoubado','$codEndereco_sessao');" ;

$salvar = mysqli_query($conexao,$sql);
$row_total = mysqli_fetch_array($salvar);


if($salvar){
          echo"<script language='javascript' type='text/javascript'>alert('Denuncia cadastrada com sucesso!!');window.location.href='denuncia.php'</script>";
          header("Location: denuncia.php?resp=sucesso");

}else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa Denuncia!!');window.location.href='denuncia.php'</script>";
        }

mysqli_close($conexao);


?>

