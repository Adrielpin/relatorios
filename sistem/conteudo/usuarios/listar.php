<?php 
include '../connect.php';

//consulta dados internos
$sql = "SELECT usuarios.id, usuarios.nome, acesso.nivel, contas.costumer_id FROM usuarios JOIN contas ON usuarios.id=contas.id_usuario JOIN acesso ON usuarios.acesso_id = acesso.id";
$result = mysqli_query($conn, $sql);
print '<div class="table-responsive">';
print '<table class="table">';
print '<thead>';
print '<tr>';
print '<th></th>';
print '<th>Nome</th>';
print '<th>Nivel</th>';
print '<th>Conta</th>';
print '</tr>';
print '</thead>';
print '<tbody>';


while($row = mysqli_fetch_assoc($result)){
	print '<tr>';
	print '<td>'.$row['id'].'</td>';
	print '<td contenteditable>'.$row['nome'].'</td>';
	print '<td contenteditable>'.$row['nivel'].'</td>';
	print '<td contenteditable>'.$row['costumer_id'].'</td>';
	print '</tr>';
}
print '</tbody>';
print '</table>';
?>
