<?php 
//Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "sistema";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()) 
echo "FALHA NA CONECXÃO ". mysqli_connect_error();


?>