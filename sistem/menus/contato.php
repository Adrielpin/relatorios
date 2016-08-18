<div class='usuarios_filtro'>

	<form id='user-pass' action='../pass' method='post'>
		<label for='senha-antiga'>Senha Atual:</label>
		<input type="password" id='senha-antiga' name='senha-antiga'>

		<label for='senha-nova'>Nova senha:</label>
		<input type="password" id='senha-nova' name='senha-nova'/>

		<label for='confirma-nova'>Confirmar:</label>
		<input type="password" id='confirma-nova' name='confirma-nova'/>

		<button type="button" class='button-print' id='redefinir'>Redefinir</button>
	</form>
</div>

<div class='usuarios_filtro' id='relatorio-cliente' hidden=true>
	<h5>Relatorio comercial</h5>
	<form id='user-pass' action='../pass' method='post'>

		<label for='Logo-Cliente'>logo Cliente 1:</label>
		<input type="file" id='Logo-Cliente' onchange='document.getElementById("remove-logo").checked = false' multiple/>
		<br>

		<label>Remover logo:
			<input type="checkbox" id='remove-logo' style='width:20px; heigth:20px;' onclick='document.getElementById("Logo-Cliente").value =""'/>
		</label>

		<button type="button" class='button-print' onclick='document.getElementById("Logo-Cliente").value =""; document.getElementById("remove-logo").checked = false'>limpar</button>
	</form>
</div>

<script src="../theme/js/config-actions.js"></script>
