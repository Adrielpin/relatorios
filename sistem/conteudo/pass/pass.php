<?php
	include '../connect.php';
	session_start();

	$sql = "UPDATE usuarios SET password = md5('".$_POST['senhaNova']."') WHERE user='".$_SESSION['login']."' and password = md5('".$_POST['senhaAntiga']."')";
	
	mysqli_query($conn, $sql);
	
	mysqli_close($conn);
?>