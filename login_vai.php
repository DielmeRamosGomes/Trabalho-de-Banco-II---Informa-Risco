<?php 

include_once("conexao.php");



$login = $_POST['email'];
$senha = $_POST['senha'];

//echo ("$login".$login."".$senha);

if (!isset($_POST['email']) || !isset($_POST['senha'])){
	echo "Forneça um login e uma senha!";
}else{
	echo "login: $login | senha: $senha |";
}



$sql = "CALL VERIFICA_LOGIN('$senha','$login')";

$salvar = mysqli_query($conexao,$sql);
$total = mysqli_num_rows($salvar); 
$row_total = mysqli_fetch_array($salvar);

if ($row_total > 0){
	$_SESSION['usuario_sessao'] = $row_total['codUsuario'] ;
	header("Location: denuncia.php?respLogin=sucesso");	
}else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o login');window.location.href='cadastro.php'</script>";
        }

//var_dump($row_total['COD_USUARIO']);

//if ($total) {
//	echo "LOGIN FEITO COM SUCESSO!";}
//else { echo "ERRO";}
mysqli_close($conexao);


?>