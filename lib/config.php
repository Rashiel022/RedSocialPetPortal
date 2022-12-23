<?php
$host = "localhost";
$dbuser = "root";
$dbpwd = "";
$db = "redsocial";


$connect = new mysqli($host, $dbuser, $dbpwd, $db);
if(!$connect){
	echo("No se ha conectado la base de datos");
} 

/*$connect = new mysqli($host, $dbuser, $dbpwd);
	if(!$connect)
		echo ("No se ha conectado a la base de datos");
	else
		mysqli_select_db($connect, $db);*/
?>