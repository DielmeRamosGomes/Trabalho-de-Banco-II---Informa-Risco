<?php
	if (session_status() !== PHP_SESSION_ACTIVE){  //Verificar se a sessão já está aberta.
		session_start();
	} 
	$hostname = "localhost";
	$user = "root";
	$password = "";
	$database = "bd_informarisco";

	$conexao = mysqli_connect($hostname,$user,$password,$database,"3306");


	if(!$conexao){
		die('Não foi possível conectar: '.mysql_error());
	}
	
?>