<?php
include('conectar.php');

	$Id_Deleta = $_REQUEST['Deleta_id'];

		mysqli_query($con,"DELETE from tb_clientes WHERE Id ='$Id_Deleta'");	
			header('location:index.php');
			echo "<script> alert('Conta excluida com sucesso')";
?>