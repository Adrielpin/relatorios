<html>
<?php

	session_start();
	if($_SESSION['aberto'] != true){
		header('Location: ../index.php');
	}

	include 'conteudo/header.php';
	include 'conteudo/content.php';

	if($_SESSION['nivel'] == 'administrador'){
		echo '<script type="text/javascript">$("#relatorio-cliente").show();</script>';
	}
?>

</html>