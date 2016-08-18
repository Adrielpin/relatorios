<?php

include $_SERVER['DOCUMENT_ROOT'].'/relatorio/src/connect.php';

session_start();
$_SESSION['login'] = $_POST['user'];
$_SESSION['senha'] =  $_POST['password'];


    //consulta dados internos
$sql = "SELECT usuarios.nome, acesso.nivel, contas.costumer_id FROM usuarios JOIN contas ON usuarios.id=contas.id_usuario JOIN acesso ON usuarios.acesso_id = acesso.id  WHERE usuarios.user='".$_SESSION['login']."' and usuarios.password = md5('".$_SESSION['senha']."')";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if($result->num_rows == 0) {
	$_SESSION['erro'] = 1;
	header("Location: index.php");
}

else {
	$row = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $row['nome'];
	$_SESSION['id'] = $row['costumer_id'];
	$_SESSION['nivel'] = $row['nivel'];
	$_SESSION['aberto'] = true;
	header('location: sistem');
	// $_SESSION['erro'] = 2;
	// header("Location: index.php");
}