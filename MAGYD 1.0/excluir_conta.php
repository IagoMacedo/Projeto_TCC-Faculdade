<?php
   session_start();
   if (!isset($_SESSION['usuario_autenticado']) or $_SESSION['usuario_autenticado'] != 'SIM') {
    header('location:logado.php');
   }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alerta de Login</title>
	<meta charset="utf8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	// <!-- Link BOOTSTRAP-4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- // Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>


<body class="bg-dark d-flex justify-content-center">
	<div  class="bg-warning rounded p-4 text-center " style="width:500px;margin:50px;">
		<H1 class="titulo"> Excluir Conta</H1>
		<p class="p1">Voce ira excluir sua conta definitivamente.</p><br>
		<p class="p2">Voce tem certeza disso?</p>
		<form method="POST" action="delete_conta.php">
			<input type="number" hidden name="Deleta_id" value="<?php echo $_SESSION['Id'] ?>"readonly>
			<button type="submit" class="btn btn-danger">Excluir conta</button>
		</form>

		<a href="http://localhost/MAGYD%201.0/logado.php" class="btn btn-info mt-4">VOLTAR</a></br></br></br></br>
		
    </div>
</body>
</html>