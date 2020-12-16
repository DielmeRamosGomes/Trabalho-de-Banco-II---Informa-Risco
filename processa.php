<?php 

include_once("conexao.php");
	
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nomecidade = $_POST['nomecidade'];
$nomeorgao = $_POST['nomeorgao'];

$sql = "CALL CADASTRO_USUARIO('$nome','$senha','$email');" ;
$salvar = mysqli_query($conexao,$sql);
$row_total = mysqli_fetch_array($salvar);

if($salvar){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='cadastro.php'</script>";
          header("Location: cadastro.php?respCad=sucesso");

}else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.php'</script>";
        }

mysqli_close($conexao);


?>

