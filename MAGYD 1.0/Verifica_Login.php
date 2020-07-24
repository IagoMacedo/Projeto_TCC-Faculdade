<?php
	session_start();
	include('conectar.php');

	$email = $_REQUEST['txtemail'];
	$senha = $_REQUEST['txtsenha'];

	$senhacript = md5($senha);

	$seleciona = "SELECT * FROM `tb_clientes` WHERE `email` = '$email'";
	$result= mysqli_query($con, $seleciona);
	while ($dado = mysqli_fetch_array($result) ) {
		$registro= $dado['Id'];
		$usuario = $dado['Nome'];
		$dataNasc = $dado['DataNasc'];
		$tele= $dado['Telefone'];
		$email = $dado['Email'];
		$senhav = $dado['Senha'];

	}
	if ($senhacript === $senhav) {
		echo "<script> alert('Login Realizado com sucesso')</script>";
		$_SESSION['usuario_autenticado'] = 'SIM';
		$_SESSION['Id'] = $registro;
		$_SESSION['usuario'] = $usuario;
		$_SESSION['email'] = $email;
		$_SESSION['fone'] = $tele;
		$_SESSION['dataNasc'] = $dataNasc;
		$_SESSION['senhav'] = $senhav;
		header('location:logado.php?'.$usuario);
		
	}
	else{

		echo "<script> alert('Senha ou E-mail invalido')</script>";
		$_GET['erro'] = 'erro1';
		header('location:index.php?'.$_GET['erro']);
		
	}
?>
