<?php  

	include('conectar.php');

	$Name = $_REQUEST['txtnome'];
	$Email = $_REQUEST['txtemail'];
	$Telefone = $_REQUEST['txttelefone'];
	$DataNasc = $_REQUEST['txtDataNasc'];
	$Password = $_REQUEST['txtsenha'];
	$PasswordCript = md5($Password);


	$seleciona = "SELECT * FROM `tb_clientes` WHERE `Email` = '$Email'";
	$result= mysqli_query($con, $seleciona);
	while ($dado = mysqli_fetch_array($result) ) {
		$registro= $dado['Id'];
		$usuario = $dado['Nome'];
		$dataNasc = $dado['DataNasc'];
		$tele= $dado['Telefone'];
		$email = $dado['Email'];
		$senhav = $dado['Senha'];
		}
	if ($Email === $email) {
		echo  "<script> alert('O Email ultilizado ja existe por favor tentar novamente ultilizando outro Email')</script>";
		$_GET['erro'] = 'erro2';
		header('location:index.php?'.$_GET['erro']);
	}
	else{
	$inserir = "INSERT INTO `tb_clientes` (`Id`, `Nome`, `DataNasc`, `Telefone`, `Email`, `Senha`) VALUES (NULL, '$Name', '$DataNasc', '$Telefone', '$Email', '$PasswordCript');";
	mysqli_query($con, $inserir );
	header('location:index.php');
	}
	?>