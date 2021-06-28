<?php 
//Conexão
require_once 'db_connect.php';

//Sessão
session_start();
//Verificação
if(!isset($_SESSION['logado'])):
	header('Location: index.php')
endif;
//Dados
$id = $_SESSION['id_aluno'];
$sql = "SELECT * FROM usuarios WHERE id =  '$id' ";
$resultado = mysql_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PAGINA RESTRITA</title>
	<link rel="stylesheet" href="">
</head>
<body>
<h1> Olá <?php echo $_SESSION['nome']; ?></h1>
<a href="logout.php"></a>
	
</body>
</html>