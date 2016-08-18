<form id='valores' name='valores'>
	<div class='acoes_filtro'>
		<div class="form-group">
			<label for='contas'>Conta:</label>
			<select id="contas" name="contas" class="form-control">
				<?php include 'acoes/GetAccountHierarchy.php'; ?>
			</select>

			<script type="text/javascript">
				$("#contas").select2({theme:'Bootstrap',dropdownAutoWidth: 'true'});
			</script>

			<label for='tipo'>Tipo de campanha: </label>
			<select id='tipo' name='tipo' class="form-control">
				<option value='SEARCH'>Search</option>
				<option value='DISPLAY'>Display</option>
				<option value='SHOPPING'>Shopping</option>
				<option value='GMAIL'>Gmail</option>
				<option value='VIDEO'>Video</option>
				<!-- <option value='MULTI_CHANNEL'>Mobile</option> -->
			</select>

			<label for='range'>Periodo:</label>
			<select id='range' name='range' onchange='showRange(this.value)' class="form-control">
				<option value='TODAY'>Hoje</option>
				<option value='YESTERDAY'>Ontem</option>
				<option value='THIS_WEEK_SUN_TODAY'>Esta semana (dom- hoje)</option>
				<option value='THIS_WEEK_MON_TODAY'>Esta semana (seg- hoje)</option>
				<option value='LAST_7_DAYS'>Ultimos 7 Dias</option>
				<option value='LAST_WEEK'>Semana passada (seg - dom)</option>
				<option value='LAST_WEEK_SUN_SAT'>Semana passada (dom - sab)</option>
				<option value='LAST_BUSINESS_WEEK'>Ultima semana útil (seg - sex)</option>
				<option value='LAST_14_DAYS'>Ultimos 14 dias</option>
				<option value='THIS_MONTH'>Este mês</option>
				<option value='LAST_30_DAYS'>Ultimos 30 dias</option>
				<option value='LAST_MONTH'>Mês anterior</option>                
				<option value='ALL'>Ano atual</option>
				<option value='LAST_YEAR'>Ano anterior</option>
				<!-- <option value='LAST_3_YEAR'>Ultimos 3 anos</option> -->
				<option value='PERSONALIZADO'>Personalizado</option>
			</select>

			<div id='personalisado' name='personalisado' hidden=true style='padding: 7px 7px 7px 7px; margin-bottom: 7px;'>
				<label>Data inicial:</label>
				<input type='date' id='dt_inicial' name='dt_inicial' class="form-control">
				<label>Data final:</label>
				<input type='date' id='dt_final' name='dt_final' class="form-control">
			</div>
			<script>
			function showRange(value){
				(value == 'PERSONALIZADO') ? document.getElementById('personalisado').hidden = false : document.getElementById('personalisado').hidden = true;
			}
			</script>

			<label for='geo'>Localidade: </label>
			<select id='geo' name='geo' class="form-control">
				<option value='P'>Países 30+</option>
				<option value='E'>Estados 30+</option>
				<option value='C'>Cidades 30+</option>
			</select>
		</div>

		<div class='footer'>
			<div style='width: 84px; float: left;'>
				<button type='button' class='action button-action' id='camp-show'> + Campanha</button>
				<button type='button' class='action button-action' id='group-show'> + Grupo</button>
				<button type='button' class='action button-action' id='word-show'> + Palavra</button>
			</div>

			<div style='width: 88px; float: left;'>
				<button type='button' class='submit button-go' id='gerar'>Gerar</button>
			</div>

			<div style='background-color: #87868A; width:100%; height: 1px; float: left;'></div>
			<div style='width: 100%; float: left; margin-top: 7px'>
				<button type='button' class='action button-proj' id='show-Proj'>Relatório de Projeção</button>
				<button type='button' class='action button-Des' id='show-Des'> Relatório de Desempenho</button>
				<button type='button' class='action button-print' id='print-report' onclick="window.print();">Imprimir</button>

				<div style='width: 100%; float: left; margin: 7px auto 0 auto;' id='anchor' hidden>
					<button type='button' class='action button-action' id='go-data' style='width: 23%;'>data</button>
					<button type='button' class='action button-action' id='go-week' style='width: 23%;'>semana</button>
					<button type='button' class='action button-action' id='go-hour' style='width: 23%;'>hora</button>
					<button type='button' class='action button-action' id='go-geo' style='width: 23%;'>geo</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Seleção de campanhas -->
	<div id='drag-camp' class='pop' hidden>
		<div class='left-right'>
			<div class='left-right-title'>
				<h1>campanhas<button type='button' id='fecha-camp' class=fechar-drag>X</button></h1>
			</div>

			<div class='filter'><label>Buscar: <input type='text' id='camp-filter' width='100px'></label></div>

			<div class='div-all'>
				<div class='div-select'>
					<select id="camp-from" multiple>
					</select>
				</div>	

				<div class='div-button'>
					<button type='button' class='action button-action' id='one-camp-to-right'> > </button>
					<button type='button' class='action button-action' id='all-camp-to-right'> >> </button>
					<button type='button' class='action button-action' id='one-camp-to-left'> < </button>
					<button type='button' class='action button-action' id='all-camp-to-left'> << </button>
				</div>

				<div class='div-select'>
					<select id="camp-to" name="camp[]" multiple></select>
				</div>
			</div>

			<div class='close'>	
				<button type='button' id='camp-hide' class='close-action'>Aplicar</button>
			</div>
		</div>
	</div>

	<!-- Seleção de grupos -->
	<div id='drag-group' class='pop' hidden>
		<div class='left-right'>
			<div class='left-right-title'>
				<h1>Grupo de Anuncio<button type='button' id='fecha-group' class=fechar-drag>X</button></h1>
			</div>
			<div class='filter'><label>Buscar: <input type='text' id='group-filter' width='100px'></label></div>

			<div class='div-all'>
				<div class='div-select'>
					<select id="group-from" multiple>
					</select>
				</div>

				<div class='div-button'>
					<button type='button' class='action button-action' id='one-group-to-right'> > </button>
					<button type='button' class='action button-action' id='all-group-to-right'> >> </button>
					<button type='button' class='action button-action' id='one-group-to-left'> < </button>
					<button type='button' class='action button-action' id='all-group-to-left'> << </button>
				</div>

				<div class='div-select'>
					<select id="group-to" name="group[]" multiple></select>
				</div>
			</div>
			<div class='close'>	
				<button type='button' id='group-hide' class='close-action'>Aplicar</button>
			</div>
		</div>
	</div>

	<!-- Seleção de palavras -->
	<div id='drag-word' class='pop' hidden>
		<div class='left-right'>
			<div class='left-right-title'>
				<h1>Palavras<button type='button' id='fecha-word' class=fechar-drag>X</button></h1>
			</div>
			<div class='filter'><label>Buscar: <input type='text' id='word-filter' width='100px'></label></div>

			<div class='div-all'>
				<div class='div-select' style='height: 30px;'>
					<select id="word-from">
					</select>
				</div>

				<div class='div-button'>
					<button type='button' class='action button-action' id='one-word-to-right'> > </button>
					<button type='button' class='action button-action' id='one-word-to-left'> < </button>
				</div>

				<div class='div-select' style='height: 30px;'>
					<select id="word-to" name="word"></select>
				</div>
			</div>
			<div class='close'>	
				<button type='button' id='word-hide' class='close-action'>Aplicar</button>
			</div>
		</div>
	</div>
</form>

<script src="../theme/js/config-camp.js"></script>
<script src="../theme/js/config-group.js"></script>
<script src="../theme/js/config-word.js"></script>