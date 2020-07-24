<?php  

	include('conectar.php');

	$Id_Alterar = $_REQUEST['Altera_id'];
	$Name_Alterar = $_REQUEST['alterar_nome'];
	$DataNasc_Alterar = $_REQUEST['alterar_nascimento'];
	$Telefone_Alterar = $_REQUEST['alterar_fone'];
	$Email_Alterar = $_REQUEST['alterar_email'];
	$Password_Alterar = $_REQUEST['alterar_senha'];
	$PasswordCript = md5($Password_Alterar);


	if($Email_Alterar==""){
	echo " ERROR. Preenchar o campo do CÓDIGO por favor.";
	echo'<button style="background:yellow;"><a href="logado.php">VOLTAR</a></button>';
}
else{
	header('location:logado.php');
}

mysqli_query($con,"update tb_clientes set Nome='$Name_Alterar',DataNasc  
 ='$DataNasc_Alterar', Telefone='$Telefone_Alterar',Email ='$Email_Alterar',Senha ='$PasswordCript' where Id  = '$Id_Alterar'");	

?>