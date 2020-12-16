<?php 
	session_start(); 
	$hostname = "localhost";
	$user = "root";
	$password = "";
	$database = "bd_informarisco";

	$conexao = mysqli_connect($hostname,$user,$password,$database,"3306");


	if(!$conexao){
		die('Não foi possível conectar: '.mysql_error());
	}
	
?>