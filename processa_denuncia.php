<?php 

include_once("conexao.php");
include_once("login_vai.php");

$codRisco = $_POST['codRisco'];
$hora = $_POST['hora'];
$data = $_POST['data'];
$codusuario = (int) $_SESSION['usuario_sessao'];

$sql = "CALL CADASTRO_BOLETIM_OCORRENCIA('$codRisco','$codusuario','$hora','$data');" ;

$salvar = mysqli_query($conexao,$sql);
$row_total = mysqli_fetch_array($salvar);

if ($row_total > 0){
	$_SESSION['codBoletim_sessao'] = $row_total['codBoletim'] ;
}

$genero = $_POST['genero'];
$fezBO = $_POST['fezBO'];
$objRoubado = $_POST['objRoubado'];
$codigoBoletim_sessao = (int) $_SESSION['codBoletim_sessao'] ;

$sql = "CALL CADASTRO_INFORMACOES_ADICIONAIS('$codBoletim_sessao','$genero','$fezBO','$objRoubado');" ;

$salvar = mysqli_query($conexao,$sql);
$row_total = mysqli_fetch_array($salvar);


if($salvar){
          echo"<script language='javascript' type='text/javascript'>alert('Denuncia cadastrada com sucesso!');window.location.href='cadastro.php'</script>";
          header("Location: cadastro.php?respCad=sucesso");

}else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar essa Denuncia');window.location.href='cadastro.php'</script>";
        }

mysqli_close($conexao);


?>

