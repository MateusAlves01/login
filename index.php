<?php 
//Conexão
require_once 'db_connect.php';

//Sessão
session_start();
//Botão Enviar
if (isset($_POST['btn-entrar']));{ 
		$erros = array();
		$login = mysqli_escape_string($connect, $_POST['login']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);
		{	
		if (empty($login) or empty($senha)):
		$erros[] = "<li> O campo login senha precisa ser preenchido</li>";
		$sql = "SELECT login FROM alunos WHERE login = '$login' ";
		$resultado = mysqli_query($connect, $sql);

		if(mysqli_num_rows($resultado) > 0):
		$senha = md5($senha);
		$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
		$resultado = mysqli_query($connect, $sql);

		if (mysqli_num_rows($resultado) == 1):
			$dados = mysqli_fetch_array($resultado);
			mysql_close($resultado);
			$_SESSION['logado'] = true;
			$_SESSION['id_aluno'] = $dados['id'];
			header ('Location: home.php');
		else: 
			$erros[] = "<li>Usuário e senha não conferem</li>";
			$erros[] = "<li> Usuário inexistente</li>";
		endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1> Login</h1>
<?php
	if(!empty($erros)):{
		foreach($erros as $erro):
			echo $erro;{
?>
	<hr>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?> method="POST">"
	LOGIN: <input type="text" name="login"><br>
	SENHA: <input type="password" name="senha"><br>
	<button type="submit" name="btn-entrar"></button>
	</form>
</body>
</html>