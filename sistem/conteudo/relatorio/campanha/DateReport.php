<?php

/**
 * rotina de captura de dados a nivel de conta adwords
 * não aceita valores por MCC com retorno nulo
 * @author Adriel Pinheiro <adriel.pinheiro@clinks.com.br>
 *
 */

  ini_set("display_errors", "1");
  error_reporting(E_ALL);

$selector = new Selector();
$selector->fields = array($sintax, 'Clicks','Impressions', 'Cost', 'AveragePosition', 'Conversions', 'ViewThroughConversions', $parcela_impressao, $parcela_impressao_orcamento, $parcela_impressao_rank,'GmailSecondaryClicks','GmailSaves','GmailForwards');
$selector->predicates[] = new Predicate('CampaignId', 'IN', $camp);
$selector->dateRange = new DateRange($startdate, $enddate);

$reportDefinition = new ReportDefinition();
$reportDefinition->selector = $selector;
$reportDefinition->reportName = 'Criteria performance report';
$reportDefinition->dateRangeType = 'CUSTOM_DATE';
$reportDefinition->reportType = 'CAMPAIGN_PERFORMANCE_REPORT';
$reportDefinition->downloadFormat = 'CSV';

$options = array('version' => ADWORDS_VERSION);
$options['skipReportHeader'] = true;
$options['skipColumnHeader'] = true;
$options['skipReportSummary'] = true;
$options['includeZeroImpressions'] = true;

$reportUtils = new ReportUtils();
$returned = $reportUtils->DownloadReport($reportDefinition, null, $user, $options);

$arr = array();
$Data = str_getcsv($returned, "\n");

foreach($Data as &$Row){
	$Row = str_getcsv($Row, ",");
	array_push($arr, $Row);
}
asort($arr);

$cliques = array();
$impressoes = array();
$investimento = array();
$posicao = array();
$conversao = array();
$conversao_de_visualizacao = array();
$parcela = array();
$gmailClique = array();
$gmailSave = array();
$gmailEnc = array();

$mes_extenso = array('01' => 'Janeiro','02' => 'Fevereiro','03' => 'Março','04' => 'Abril','05' => 'Maio','06' => 'Junho','07' => 'Julho','08' => 'Agosto','09' => 'Setembro','10' => 'Outubro','11' => 'Novembro','12' => 'Dezembro');

foreach($arr as &$Row){
	if($sintax == 'Date'){ $date = date('d', strtotime($Row[0]));} elseif($sintax == 'Month'){ $date = $mes_extenso[date('m', strtotime($Row[0]))];} else{$date = $Row[0];}
	array_push($cliques, array($date, $Row[1]));
	array_push($impressoes, array($date, $Row[2]));
	array_push($investimento, array($date, ($Row[3]/1000000)));
	array_push($posicao, array($date,  $Row[4]));
	array_push($conversao, array($date,(int)str_replace(',','',$Row[5])));
	array_push($conversao_de_visualizacao, array($date, (int)str_replace(',','',$Row[6])));

	if($Row[7] == '< 10%'){
		if($Row[9] == '> 90%'){
			array_push($parcela, array($date, (int)$Row[2], 100-(91+$Row[8])));	
		}
		array_push($parcela, array($date, (int)$Row[2], 100-($Row[8]+$Row[9])));
	}
	else{
		array_push($parcela, array($date, (int)$Row[2], (float)$Row[7]));
	}

	array_push($gmailClique, array($date, $Row[10]));
	array_push($gmailSave, array($date, $Row[11]));
	array_push($gmailEnc, array($date, $Row[12]));
}

	//parcela de impressão;

$total_de_impressoes = array();
foreach($parcela as &$a){
	array_push($total_de_impressoes, array($a[0], round(($a[1]/$a[2])*100)));
}

$cliques = array_reduce($cliques, soma);
$impressoes = array_reduce($impressoes, soma);
$investimento = array_reduce($investimento, soma);
$posicao = array_reduce($posicao, soma);
$conversao = array_reduce($conversao, soma);
$conversao_de_visualizacao = array_reduce($conversao_de_visualizacao, soma);
$total_de_impressoes = array_reduce($total_de_impressoes, soma);
$gmailClique = array_reduce($gmailClique, soma);
$gmailSave = array_reduce($gmailSave, soma);
$gmailEnc = array_reduce($gmailEnc, soma);

$cpc = array();
foreach($investimento as &$a){
	foreach($cliques as &$b){
		if($a[0] == $b[0]){
			array_push($cpc, array($a[0], round($a[1]/$b[1], 2)));
		}
	}	
}

$ctr = array();
foreach($cliques as &$a){
	foreach($impressoes as &$b){
		if($a[0] == $b[0]){
			array_push($ctr, array($a[0], round(($a[1]/$b[1])*100, 2)));
		} 
	}
}

$custo_por_conversao = array();
foreach($investimento as &$a){
	foreach($conversao as &$b){
		if($a[0] == $b[0]){
			array_push($custo_por_conversao, array($a[0], round(($a[1]/$b[1]), 2)));
		} 
	}
}

$conversao_total = array();
foreach($conversao_de_visualizacao as &$a){
	foreach($conversao as &$b){
		if($a[0] == $b[0]){
			array_push($conversao_total, array($a[0], ($a[1]+$b[1])));
		} 
	}
}

$custo_por_conversao_total = array();
foreach($investimento as &$a){
	foreach($conversao_total as &$b){
		if($a[0] == $b[0]){
			array_push($custo_por_conversao_total, array($a[0], round(($a[1]/$b[1]), 2)));
		} 
	}
}

$taxa_de_conversao = array();
foreach($cliques as &$a){
	foreach($conversao as &$b){
		if($a[0] == $b[0]){
			array_push($taxa_de_conversao, array($a[0], round(($b[1]/$a[1])*100, 2)));
		} 
	}
}

$taxa_de_conversao_total = array();
foreach($cliques as &$a){
	foreach($conversao_total as &$b){
		if($a[0] == $b[0]){
			array_push($taxa_de_conversao_total, array($a[0], round(($b[1]/$a[1])*100, 2)));
		} 
	}
}

$total_parcela = array();
$t_impressoes = 0;
$t_parcela = 0;
foreach($impressoes as &$a){
	foreach($total_de_impressoes as &$b){
		if($a[0] == $b[0]){
			array_push($total_parcela, array($a[0], round(($a[1]/$b[1])*100, 2)));
			$t_impressoes += $a[1];
			$t_parcela += $b[1];
		} 
	}
}
$t_parcela_de_impresao = ($t_impressoes/$t_parcela)*100;

	//este bloco constroi arrays individuais da consulta para graficos
	//author adriel Pinheiro

$cliques_tabela = array(array('Data', 'Cliques',array(type => 'string', role =>'annotation')));
$t_cliques = 0;
foreach($cliques as &$Row){
	array_push($cliques_tabela, array($Row[0], (int)$Row[1], number_format((int)$Row[1],0,',','.')));
	$t_cliques += $Row[1];
}


$impressoes_tabela = array(array('Data', 'Impressões', array(type => 'string', role =>'annotation')));
$t_impressoes = 0;
foreach($impressoes as &$Row){
	array_push($impressoes_tabela, array($Row[0], (int)$Row[1], number_format((int)$Row[1],0,',','.')));
	$t_impressoes += $Row[1];
}

$investimento_tabela = array(array('Data', 'Investimento', array(type => 'string', role =>'annotation')));
$t_investimento = 0;
foreach($investimento as &$Row){
	array_push($investimento_tabela, array($Row[0], (float)$Row[1], 'R$ '.number_format((float)$Row[1],2,',','.')));
	$t_investimento += $Row[1];
}

$cpc_tabela = array(array('Data', 'CPC', array(type => 'string', role =>'annotation')));
$t_cpc = $t_investimento/$t_cliques;
foreach($cpc as &$Row){
	array_push($cpc_tabela, array($Row[0], (float)$Row[1], 'R$ '.number_format((float)$Row[1],2,',','.')));
}

$ctr_tabela = array(array('Data', 'CTR %', array(type => 'string', role =>'annotation')));
$t_ctr = ($t_cliques/$t_impressoes)*100;
foreach($ctr as &$Row){
	array_push($ctr_tabela, array($Row[0], (float)$Row[1], number_format((float)$Row[1],2,',','.').' %'));
}

$posicao_tabela = array(array('Data', 'Posisão média', array(type => 'string', role =>'annotation')));
$count=0;
$t_posicao = 0;
foreach($posicao as &$Row){
	array_push($posicao_tabela, array($Row[0], (float)($Row[1]/sizeof($camp)), number_format((float)($Row[1]/sizeof($camp)),1,',','.')));
	$t_posicao += $Row[1];
	$count ++;
}
$t_posicao = ($t_posicao/$count)/sizeof($camp);

$conversao_tabela = array(array('Data','Conversões', array(type => 'string', role =>'annotation')));
$t_conversao = 0;
foreach($conversao as $Row){
	array_push($conversao_tabela, array($Row[0], (int)$Row[1], number_format(((int)$Row[1]),0,',','.')));
	$t_conversao += $Row[1];
}

$custo_por_conversao_tabela = array(array('Data','Custo por conversão total', array(type => 'string', role =>'annotation')));
$t_custo_por_conversao  = $t_investimento/$t_conversao;
foreach($custo_por_conversao as &$Row){
	array_push($custo_por_conversao_tabela, array($Row[0], (float)$Row[1], 'R$ '.number_format((float)$Row[1],2,',','.')));
}

$taxa_de_conversao_tabela = array(array('Data','Taxa de conversão %', array(type => 'string', role =>'annotation')));
$t_taxa_de_conversao = ($t_conversao/$t_cliques)*100;
foreach($taxa_de_conversao as &$Row){
	array_push($taxa_de_conversao_tabela, array($Row[0], (float)$Row[1], number_format((float)$Row[1],2,',','.').' %'));
}

$conversao_de_visualizacao_tabela = array(array('Data','Conversões de visualização', array(type => 'string', role =>'annotation')));
$t_conversao_visualizacao = 0;
foreach($conversao_de_visualizacao as &$Row){
	array_push($conversao_de_visualizacao_tabela, array($Row[0], (float)$Row[1], number_format((float)$Row[1],0,',','.')));
	$t_conversao_visualizacao += $Row[1];
}

$conversao_total_tabela = array(array('Data','Total de conversões', array(type => 'string', role =>'annotation')));
$t_conversao_total = 0;
foreach($conversao_total as &$Row){
	array_push($conversao_total_tabela, array($Row[0], $Row[1], number_format((float)$Row[1],0,',','.')));
	$t_conversao_total += $Row[1];
}

$taxa_de_conversao_total_tabela = array(array('Data','Taxa de conversão total %', array(type => 'string', role =>'annotation')));
$t_taxa_de_conversao_total = ($t_conversao_total/$t_cliques)*100;
foreach($taxa_de_conversao_total as &$Row){
	array_push($taxa_de_conversao_total_tabela, array($Row[0], (float)$Row[1], number_format((float)$Row[1],2,',','.').' %'));
}

$custo_por_conversao_total_tabela = array(array('Data','Custo por conversão total', array(type => 'string', role =>'annotation')));
$t_custo_por_conversao_total  = $t_investimento/$t_conversao_total;
foreach($investimento as &$a){
	foreach($conversao_total as &$b){
		if($a[0] == $b[0]){
			$v = round(($a[1]/$b[1]),2);
			array_push($custo_por_conversao_total_tabela, array($a[0], $v, 'R$ '.number_format((float)$v,2,',','.')));
		} 
	}
}

$gmailClique_tabela = array(array('Data', 'Cliques Gmail',array(type => 'string', role =>'annotation')));
$t_gmailClique = 0;
foreach($gmailClique as &$Row){
	array_push($gmailClique_tabela, array($Row[0], (int)$Row[1], number_format((int)$Row[1],0,',','.')));
	$t_gmailClique += $Row[1];
}


$gmailSave_tabela = array(array('Data', 'Gmail salvos',array(type => 'string', role =>'annotation')));
$t_gmailSave = 0;
foreach($gmailSave as &$Row){
	array_push($gmailSave_tabela, array($Row[0], (int)$Row[1], number_format((int)$Row[1],0,',','.')));
	$t_gmailSave += $Row[1];
}

$gmailEnc_tabela = array(array('Data', 'Gmail encaminhados',array(type => 'string', role =>'annotation')));
$t_gmailEnc = 0;
foreach($gmailEnc as &$Row){
	array_push($gmailEnc_tabela, array($Row[0], (int)$Row[1], number_format((int)$Row[1],0,',','.')));
	$t_gmailEnc += $Row[1];
}

	//projeção 

$parcela_de_impresao = array(array('Data','Cobertura de demanda (%)', array(type => 'string', role =>'annotation')));
$investimento_x_parcela_date = array(array('Data','Investimento', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));
$cliques_x_parcela = array(array('Data','Cliques', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));
$impressoes_x_parcela = array(array('Data','Impressões', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));
$conversao_x_parcela = array(array('Data','Conversões', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));
$conversao_total_x_parcela = array(array('Data','Conversões totais', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));

$t_investimento_x_parcela = 0;
$t_cliques_x_parcela = 0;
$t_impressoes_x_parcela = 0;
$t_conversao_x_parcela = 0;
$t_conversao_total_x_parcela = 0;

foreach($total_parcela as &$b){
	array_push($parcela_de_impresao, array($b[0], (float)$b[1], number_format((float)$b[1],2,',','.').' %'));

	foreach($investimento as &$a){
		if($a[0] == $b[0]){
			$v = round(($a[1]/$b[1])*100,2);
			array_push($investimento_x_parcela_date, array($a[0], $a[1], 'R$ '.number_format($a[1],2,',','.'), $v, 'R$ '.number_format((float)$v,2,',','.')));
			$t_investimento_x_parcela += $v;
		} 
	}

	foreach($cliques as &$a){
		if($a[0] == $b[0]){
			$v = round(($a[1]/$b[1])*100);
			array_push($cliques_x_parcela, array($a[0], (int)$a[1], number_format($a[1],0,',','.'), (int)$v , number_format($v,0,',','.')));
			$t_cliques_x_parcela += $v;
		} 
	}

	foreach($impressoes as &$a){
		if($a[0] == $b[0]){
			$v = round(($a[1]/$b[1])*100);
			array_push($impressoes_x_parcela, array($a[0], (int)$a[1], number_format($a[1],0,',','.'), (int)$v , number_format($v,0,',','.')));
			$t_impressoes_x_parcela += $v;
		} 
	}

	foreach($conversao as &$a){
		if($a[0] == $b[0]){
			$v = round(($a[1]/$b[1])*100);
			array_push($conversao_x_parcela, array($a[0], (int)$a[1], number_format($a[1],0,',','.'), (int)$v , number_format($v,0,',','.')));
			$t_conversao_x_parcela += $v;
		} 
	}

	foreach($conversao_total as &$a){
		if($a[0] == $b[0]){
			$v = round(($a[1]/$b[1])*100);
			array_push($conversao_total_x_parcela, array($a[0], (int)$a[1], number_format($a[1],0,',','.'), (int)$v , number_format($v,0,',','.')));
			$t_conversao_total_x_parcela += $v;
		} 
	}
}

print "<script>
var data = google.visualization.arrayToDataTable(".json_encode($cliques_tabela).");
new google.visualization.BarChart(document.getElementById('chart_cliques')).draw(data, optionsCliquesData);
document.getElementById('t_cliques').innerHTML='<h5> Total: ".number_format($t_cliques,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($impressoes_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Impressoes')).draw(data, optionsImpressoesData);
document.getElementById('t_impressoes').innerHTML='<h5> Total: ".number_format($t_impressoes,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($investimento_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Cost')).draw(data, optionsCostData);
document.getElementById('t_investimento').innerHTML='<h5> Total R$: ".number_format($t_investimento,2,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($cpc_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Cpc')).draw(data, optionsCpcData);
document.getElementById('t_cpc').innerHTML='<h5> Média R$: ".number_format($t_cpc,2,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($ctr_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Ctr')).draw(data, optionsCtrData);
document.getElementById('t_ctr').innerHTML='<h5> Média: ".number_format($t_ctr,2,',','.')."%</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($posicao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Posicao')).draw(data, optionsPosisaoData);
document.getElementById('t_posicao').innerHTML='<h5>Média: ".number_format($t_posicao,1,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($conversao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Conversao')).draw(data, optionsConversaoData);
document.getElementById('t_conversao').innerHTML='<h5>Total: ".number_format($t_conversao,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($custo_por_conversao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_Custo_coversao')).draw(data, optionsConversaoCostData);
document.getElementById('t_custo_por_conversao').innerHTML='<h5> Média: ".number_format($t_custo_por_conversao,2,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($taxa_de_conversao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_taxa_conversao')).draw(data, optionstaxaConversaoData);
document.getElementById('t_taxa_conversao').innerHTML='<h5>Média: ".number_format($t_taxa_de_conversao,2,',','.')."%</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($conversao_de_visualizacao_tabela).");
new google.visualization.BarChart(document.getElementById('chart_visualisacao')).draw(data, optionsVisualisacaoData);
document.getElementById('t_conversao_visualizacao').innerHTML='<h5> Total: ".number_format($t_conversao_visualizacao,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($conversao_total_tabela).");
new google.visualization.BarChart(document.getElementById('chart_conversao_total')).draw(data, optionsConversaoTotalData);
document.getElementById('t_conversao_total').innerHTML='<h5> Total: ".number_format($t_conversao_total,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($taxa_de_conversao_total_tabela).");
new google.visualization.BarChart(document.getElementById('chart_taxa_conversao_total')).draw(data, optionsTaxaConversaoTotalData);
document.getElementById('t_taxa_conversao_total').innerHTML='<h5> Média: ".number_format($t_taxa_de_conversao_total,2,',','.')."%</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($custo_por_conversao_total_tabela).");
new google.visualization.BarChart(document.getElementById('chart_custo_conversao_total')).draw(data, optionsCustoConversaoTotalData);
document.getElementById('t_custo_conversao_total').innerHTML='<h5> Média R$: ".number_format($t_custo_por_conversao_total,2,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($gmailClique_tabela).");
new google.visualization.BarChart(document.getElementById('chart_gmail_cliques')).draw(data, optionsCliquesGmailData);
document.getElementById('t_gmailClique').innerHTML='<h5> Total: ".number_format($t_gmailClique,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($gmailSave_tabela).");
new google.visualization.BarChart(document.getElementById('chart_gmail_save')).draw(data, optionsGmailSalvosData);
document.getElementById('t_gmailSave').innerHTML='<h5> Total: ".number_format($t_gmailSave,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($gmailEnc_tabela).");
new google.visualization.BarChart(document.getElementById('chart_gmail_enc')).draw(data, optionsEncaminhadosData);
document.getElementById('t_gmailEnc').innerHTML='<h5> Total: ".number_format($t_gmailEnc,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($parcela_de_impresao).");
new google.visualization.BarChart(document.getElementById('chart_parcela_impresao')).draw(data, optionsParcelaImpresaoData);
document.getElementById('t_parcela_impresao').innerHTML='<h5> Média: ".number_format($t_parcela_de_impresao,2,',','.')."%</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($investimento_x_parcela_date)."); 	
new google.visualization.BarChart(document.getElementById('chart_progecao')).draw(data, optionsprogecaoData);
document.getElementById('t_progecao').innerHTML='<h5> Total investimento R$: ".number_format($t_investimento,2,',','.')." - Projeção R$: ".number_format($t_investimento_x_parcela,2,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($cliques_x_parcela).");
new google.visualization.BarChart(document.getElementById('chart_progecao_cliques')).draw(data, optionsprogecaoCliquesData);
document.getElementById('t_progecao_cliques').innerHTML='<h5> Total Cliques: ".number_format($t_cliques,0,',','.')."  - Projeção: ".number_format($t_cliques_x_parcela,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($impressoes_x_parcela).");
new google.visualization.BarChart(document.getElementById('chart_progecao_impressoes')).draw(data, optionsprogecaoImpressoesData);
document.getElementById('t_progecao_impressoes').innerHTML='<h5>Total impressões: ".number_format($t_impressoes,0,',','.')." - Projeção: ".number_format($t_impressoes_x_parcela,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($conversao_x_parcela).");
new google.visualization.BarChart(document.getElementById('chart_progecao_conversoes')).draw(data, optionsprogecaoConversoesData);
document.getElementById('t_progecao_conversoes').innerHTML='<h5>Total conversões: ".number_format($t_conversao,0,',','.')." - Projeção: ".number_format($t_conversao_x_parcela,0,',','.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($conversao_total_x_parcela).");
new google.visualization.BarChart(document.getElementById('chart_progecao_conversao_total')).draw(data, optionsprogecaoConversoesData);
document.getElementById('t_progecao_conversao_total').innerHTML='<h5>Total conversões: ".number_format($t_conversao_total,0,',','.')." - Projeção: ".number_format($t_conversao_total_x_parcela,0,',','.')."</h5>';

</script>";
?>