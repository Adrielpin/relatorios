<?php 

if($rede != 'SEARCH'){
	$rede = 'CONTENT';
}

if($geo == 'P'){
	$query = array('CountryCriteriaId', 'Clicks', 'Impressions', 'Cost', 'AveragePosition', 'Conversions', 'ViewThroughConversions');
}
if ($geo == 'E'){
	$query = array('CountryCriteriaId', 'RegionCriteriaId', 'Clicks', 'Impressions', 'Cost', 'AveragePosition', 'Conversions', 'ViewThroughConversions');
}
if($geo == 'C'){
	$query = array('CountryCriteriaId', 'RegionCriteriaId', 'CityCriteriaId', 'Clicks', 'Impressions', 'Cost', 'AveragePosition', 'Conversions', 'ViewThroughConversions');
}

$user->LoadService('ReportDefinitionService', ADWORDS_VERSION);

$selector = new Selector();
$selector->fields = $query;
$selector->predicates[] = new Predicate('AdGroupId', 'IN', $group);
$selector->predicates[] = new Predicate('AdNetworkType1', 'EQUALS', array($rede));

$reportDefinition = new ReportDefinition();
$reportDefinition->selector = $selector;
$reportDefinition->reportName = 'Criteria performance report #';
$reportDefinition->dateRangeType = 'CUSTOM_DATE';
$selector->dateRange = new DateRange($startdate, $enddate);
$reportDefinition->reportType = 'GEO_PERFORMANCE_REPORT';
$reportDefinition->downloadFormat = 'CSV';

$options = array('version' => ADWORDS_VERSION);
$options['skipReportHeader'] = true;
$options['skipColumnHeader'] = true;
$options['skipReportSummary'] = true;

$filePath =null;
$returned = ReportUtils::DownloadReport($reportDefinition, $filePath, $user, $options);

$arr = array();
$Data = str_getcsv($returned, "\n");
foreach($Data as &$Row){
	$Row = str_getcsv($Row, ",");
	array_push($arr, $Row);
}

$region = array();
foreach($arr as &$value){
	array_push($region, array_slice($value,(count($value)-7)));
}


include $_SERVER['DOCUMENT_ROOT'] . '/relatorio/src/connect.php';
$sql = "SELECT `id`, `nome` FROM `cidades`";
$regions = mysqli_query($conn, $sql);
mysqli_close($conn);

$names = array();

while($row = mysqli_fetch_assoc($regions)){
	$names[$row['id']] = str_replace('State of ','',$row['nome']);
}

$cidades = array();
$countC=0;
foreach($region as &$value){
	array_push($cidades, array($value[0],$value[3], $names[$value[0]]));
	$value[0] = $names[$value[0]];
	if($value[0] == null){
		$value[0] = 'Não identificado';
		$countC++;
	}
}

$cliques = array();
$impressoes = array();
$investimento = array();
$posicao = array();
$conversao = array();
$conversao_de_visualizacao = array();

foreach($region as &$Row){
	array_push($cliques, array($Row[0], $Row[1]));
	array_push($impressoes, array($Row[0], $Row[2]));
	array_push($investimento, array($Row[0], ($Row[3]/1000000)));
	array_push($posicao, array($Row[0],  $Row[4]));
	array_push($conversao, array($Row[0],(int)str_replace(',','',$Row[5])));
	array_push($conversao_de_visualizacao, array($Row[0], (int)str_replace(',','',$Row[6])));
}

$cliques = array_reduce($cliques, soma);
$impressoes = array_reduce($impressoes, soma);
$investimento = array_reduce($investimento, soma);
$posicao = array_reduce($posicao, soma);
$conversao = array_reduce($conversao, soma);
$conversao_de_visualizacao = array_reduce($conversao_de_visualizacao, soma);

foreach ($posicao as &$k) {
	if($k[0] == 'Não identificado'){
		$k[1] = $k[1]/$countC;
	}
}

usort($cliques, function($a, $b) { if ($a[1] == $b[1]) {return 0;} return ($a[1] > $b[1]) ? -1 : 1;});
usort($impressoes, function($a, $b) { if ($a[1] == $b[1]) {return 0;} return ($a[1] > $b[1]) ? -1 : 1;});
usort($investimento, function($a, $b) { if ($a[1] == $b[1]) {return 0;} return ($a[1] > $b[1]) ? -1 : 1;});
usort($posicao, function($a, $b) { if ($a[1] == $b[1]) {return 0;} return ($a[1] > $b[1]) ? -1 : 1;});
usort($conversao, function($a, $b) { if ($a[1] == $b[1]) {return 0;} return ($a[1] > $b[1]) ? -1 : 1;});
usort($conversao_de_visualizacao, function($a, $b) { if ($a[1] == $b[1]) {return 0;} return ($a[1] > $b[1]) ? -1 : 1;});

$cpc = array();
$ctr = array();
$taxa_de_conversao_total = array();
$taxa_de_conversao = array();
$custo_por_conversao = array();
$conversao_total = array();
$custo_por_conversao_total = array();

foreach($conversao as &$a){
	foreach($investimento as &$b){
		if($a[0] == $b[0]){
			array_push($custo_por_conversao, array($a[0], round(($a[1]/$b[1]), 2)));
		} 
	}

	foreach($conversao_de_visualizacao as &$b){
		if($a[0] == $b[0]){
			array_push($conversao_total, array($a[0], ($a[1]+$b[1])));
		} 
	}
}

foreach($cliques as &$a){
	foreach($investimento as &$b){
		if($b[0] == $a[0]){
			array_push($cpc, array($a[0], round($a[1]/$b[1], 2)));
		}
	}	

	foreach($impressoes as &$b){
		if($b[0] == $a[0]){
			array_push($ctr, array($a[0], round(((float)$a[1]/(float)$b[1])*100, 2)));
		} 
	}

	foreach($conversao as &$b){
		if($b[0] == $a[0]){
			array_push($taxa_de_conversao, array($a[0], round(($b[1]/$a[1])*100, 2)));
		} 
	}

	foreach($conversao_total as &$b){
		if($b[0] == $a[0]){
			array_push($taxa_de_conversao_total, array($a[0], round(($a[1]/$b[1])*100, 2)));
		} 
	}
}



foreach($investimento as &$a){
	foreach($conversao_total as &$b){
		if($a[0] == $b[0]){
			array_push($custo_por_conversao_total, array($a[0], round(($a[1]/$b[1]), 2)));
		} 
	}
}





$cliques_tabela = array(array('Data', 'Cliques',array(type => 'string', role =>'annotation')));
$c = 0;
foreach($cliques as &$Row){
	$c++;
	array_push($cliques_tabela, array($Row[0], (int)$Row[1], number_format((int)$Row[1],0,',','.')));
	if($c == 30){
		break;
	}
}


$impressoes_tabela = array(array('Data', 'Impressões', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($impressoes as &$Row){
	$c++;
	array_push($impressoes_tabela, array($Row[0], (int)$Row[1], number_format((int)$Row[1],0,',','.')));
	if($c == 30){
		break;
	}
}

$investimento_tabela = array(array('Data', 'Investimento', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($investimento as &$Row){
	$c++;
	array_push($investimento_tabela, array($Row[0], (float)$Row[1], 'R$ '.number_format((float)$Row[1],2,',','.')));
	if($c == 30){
		break;
	}
}

$cpc_tabela = array(array('Data', 'CPC', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($cpc as &$Row){
	$c++;
	array_push($cpc_tabela, array($Row[0], (float)$Row[1], 'R$ '.number_format((float)$Row[1],2,',','.')));
	if($c == 30){
		break;
	}
}

$ctr_tabela = array(array('Data', 'CTR %', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($ctr as &$Row){
	$c++;
	array_push($ctr_tabela, array($Row[0], (float)$Row[1], number_format((float)$Row[1],2,',','.').' %'));
	if($c == 30){
		break;
	}
}

$posicao_tabela = array(array('Data', 'Posisão média', array(type => 'string', role =>'annotation')));
foreach($impressoes_tabela as &$a){
	foreach($posicao as &$b){
		if($b[0] == $a[0]){
			array_push($posicao_tabela, array($b[0], (float)$b[1], number_format((float)$b[1],1,',','.')));
		}
	}
}

$conversao_tabela = array(array('Data','Conversões', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($conversao as &$Row){
	$c++;
	array_push($conversao_tabela, array($Row[0], (int)$Row[1], number_format(((int)$Row[1]),0,',','.')));
	if($c == 30){
		break;
	}
}

$custo_por_conversao_tabela = array(array('Data','Custo por conversão total', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($custo_por_conversao as &$Row){
	$c++;
	array_push($custo_por_conversao_tabela, array($Row[0], (float)$Row[1], 'R$ '.number_format((float)$Row[1],2,',','.')));
	if($c == 30){
		break;
	}
}

$taxa_de_conversao_tabela = array(array('Data','Taxa de conversão %', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($taxa_de_conversao as &$Row){
	$c++;
	array_push($taxa_de_conversao_tabela, array($Row[0], (float)$Row[1], number_format((float)$Row[1],2,',','.').' %'));
	if($c == 30){
		break;
	}
}

$conversao_de_visualizacao_tabela = array(array('Data','Conversões de visualização', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($conversao_de_visualizacao as &$Row){
	$c++;
	array_push($conversao_de_visualizacao_tabela, array($Row[0], (float)$Row[1], number_format((float)$Row[1],0,',','.')));
	if($c == 30){
		break;
	}
}

$conversao_total_tabela = array(array('Data','Total de conversões', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($conversao_total as &$Row){
	$c++;
	array_push($conversao_total_tabela, array($Row[0], $Row[1], number_format((float)$Row[1],0,',','.')));
	if($c == 30){
		break;
	}
}

$taxa_de_conversao_total_tabela = array(array('Data','Taxa de conversão total %', array(type => 'string', role =>'annotation')));
$c = 0;
foreach($taxa_de_conversao_total as &$Row){
	$c++;
	array_push($taxa_de_conversao_total_tabela, array($Row[0], (float)$Row[1], number_format((float)$Row[1],2,',','.').' %'));
	if($c == 30){
		break;
	}
}

$custo_por_conversao_total_tabela = array(array('Data','Custo por conversão total', array(type => 'string', role =>'annotation')));
foreach($investimento_tabela as &$a){
	foreach($conversao_total as &$b){
		if($a[0] == $b[0]){
			$v = round(($a[1]/$b[1]),2);
			array_push($custo_por_conversao_total_tabela, array($a[0], $v, 'R$ '.number_format((float)$v,2,',','.')));
		} 
	}
}

print "<script>
var data = google.visualization.arrayToDataTable(".json_encode($cliques_tabela).");
new google.visualization.BarChart(document.getElementById('chart_cliques_geo')).draw(data, optionsCliquesGeo);

var data = google.visualization.arrayToDataTable(".json_encode($impressoes_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Impressoes_geo')).draw(data, optionsImpressoesGeo);

var data = google.visualization.arrayToDataTable(".json_encode($investimento_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Cost_geo')).draw(data, optionsCostGeo);

var data = google.visualization.arrayToDataTable(".json_encode($cpc_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Cpc_geo')).draw(data, optionsCpcGeo);

var data = google.visualization.arrayToDataTable(".json_encode($ctr_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Ctr_geo')).draw(data, optionsCtrGeo);

var data = google.visualization.arrayToDataTable(".json_encode($posicao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Posicao_geo')).draw(data, optionsPosisaoGeo);

var data = google.visualization.arrayToDataTable(".json_encode($conversao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Conversao_geo')).draw(data, optionsConversaoGeo);

var data = google.visualization.arrayToDataTable(".json_encode($custo_por_conversao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Custo_coversao_geo')).draw(data, optionsConversaoCostGeo);

var data = google.visualization.arrayToDataTable(".json_encode($taxa_de_conversao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_taxa_conversao_geo')).draw(data, optionstaxaConversaoGeo);

var data = google.visualization.arrayToDataTable(".json_encode($conversao_de_visualizacao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_visualisacao_geo')).draw(data, optionsVisualisacaoGeo);

var data = google.visualization.arrayToDataTable(".json_encode($conversao_total_tabela).");
new google.visualization.BarChart(document.getElementById('chart_conversao_total_geo')).draw(data, optionsConversaoTotalGeo);

var data = google.visualization.arrayToDataTable(".json_encode($taxa_de_conversao_total_tabela).");
new google.visualization.BarChart(document.getElementById('chart_taxa_conversao_total_geo')).draw(data, optionsTaxaConversaoTotalGeo);

var data = google.visualization.arrayToDataTable(".json_encode($custo_por_conversao_total_tabela).");
new google.visualization.BarChart(document.getElementById('chart_custo_conversao_total_geo')).draw(data, optionsCustoConversaoTotalGeo);
</script>";
?>