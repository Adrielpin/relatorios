<?php

/*
 *
 * Seção de analytcs por dia da semana
 * @author Adriel Pinheiro <adriel.pinheiro@clinks.com.br>
 *
 *
 */

include 'Service.php';
	
$hour_roi = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>$ponteiro.',ga:hour','filters'=>$ga));
$hour_ad_total = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>'ga:hour'));

$hour_roi = $hour_roi->getRows();

$sum = array();

	if($camp != null){
		foreach($camp as $c){
			foreach($hour_roi as &$row){
				if($c == $row[0]){
					array_push($sum, array((int)$row[1],(float)$row[2]));
				}	
			}
		}
	}

$hour_roi = array_reduce($sum, soma);
$hour_ad_total = $hour_ad_total->getRows();

asort($hour_roi);
asort($hour_ad_total);

$ad_hour_tabela = array(array('Data','Faturamento AdWords', array(type => 'string', role =>'annotation')));
$hour_roi_tabela = array(array('Data','ROI', array(type => 'string', role =>'annotation')));
$ad_hour_x_parcela = array(array('Data','Faturamento', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));

$hour_ad_total_tabela = array(array('Data','Faturamento total', array(type => 'string', role =>'annotation')));
$hour_ad_total_x_ad_tabela = array(array('Data','Faturamento Total', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));

	foreach ($hour_roi as $row) {
		array_push($ad_hour_tabela, array((int)$row[0].'h', (float)$row[1], 'R$ '.number_format((float)$row[1], 2, ',', '.')));
		foreach($investimento_x_parcela_hour as $b){
			if($row[0] == $b[0]){
				$ROI = round(($row[1]-$b[1])/$b[1],2);
				array_push($hour_roi_tabela, array($row[0].'h', $ROI, $ROI));
			}
		}
	}

	foreach ($hour_ad_total as $row) {
		array_push($hour_ad_total_tabela, array((int)$row[0].'h', (float)$row[1], 'R$ '.number_format((float)$row[1],2,',','.')));
	}

foreach($ad_hour_tabela as &$ad){
	foreach($hour_roi_tabela as &$a){
		if($ad[0] == $a[0] && $ad[0] != 'Data'){			
			foreach($investimento_x_parcela_hour as &$b){		
				if($a[0] == $b[0] && $a[0] != 'Data'){
					$q = round(($a[1]*$b[3])+$b[3],2);
					array_push($ad_hour_x_parcela, array((int)$a[0].'h', $ad[1], 'R$ '.number_format((float)$ad[1], 2, ',', '.'), $q, 'R$ '.number_format((float)$q, 2, ',', '.')));
				} 
			}		
		}
	}
}


foreach($hour_ad_total_tabela as &$a){
	foreach($ad_hour_tabela as &$b){
		if($a[0] == $b[0] && $a[0] != 'Data'){
			foreach($ad_hour_x_parcela as &$c){
				if($b[0] == $c[0] && $b[0] != 'Data'){
					$v = round(($a[1]-$b[1])+$c[3],2);
					array_push($hour_ad_total_x_ad_tabela, array($a[0], $a[1], 'R$ '.number_format($a[1],2,',','.'), $v, 'R$ '.number_format($v,2,',','.')));
				} 
			}
		}
	}
}

print "<script>
var data = google.visualization.arrayToDataTable(".json_encode($hour_ad_total_tabela).");
new google.visualization.BarChart(document.getElementById('chart_faturamento_total_hour')).draw(data, optionsFaturamentoTotal);
document.getElementById('t_faturamento_total_hour').innerHTML = '<h5>Total R$: ".number_format($t_faturamento_total, 2, ',', '.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($hour_roi_tabela).");
new google.visualization.BarChart(document.getElementById('chart_roi_hour')).draw(data, optionsRoi);
document.getElementById('t_faturamento_adwords_hour').innerHTML = '<h5>Total R$: ".number_format($t_faturamento_ad, 2, ',', '.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($ad_hour_tabela).");
new google.visualization.BarChart(document.getElementById('chart_faturamento_adwords_hour')).draw(data, optionsFaturamentoAd);
document.getElementById('t_roi_hour').innerHTML = '<h5> ROI : ".number_format($t_roi, 2, ',', '.')."</h5>';

var data = google.visualization.arrayToDataTable(".json_encode($ad_hour_x_parcela).");
new google.visualization.BarChart(document.getElementById('projecao_faturamento_adwords_hour')).draw(data, optionsprogecaoFaturamentoAd);
document.getElementById('t_projecao_faturamento_adwords_hour').innerHTML = '<h5> Total faturamento AdWords R$: ".number_format($t_faturamento_ad, 2, ',', '.')." - Projeção R$: ".number_format($t_faturamento_ad_proj, 2, ',', '.')."</h5>';


var data = google.visualization.arrayToDataTable(".json_encode($hour_ad_total_x_ad_tabela).");
new google.visualization.BarChart(document.getElementById('projecao_faturamento_total_hour')).draw(data, optionsprogecaoFaturamentototal);
document.getElementById('t_projecao_faturamento_total_hour').innerHTML = '<h5> Total faturamento R$: ".number_format($t_faturamento_total, 2, ',', '.')." - Projeção R$: ".number_format($t_faturamento_total_proj, 2, ',', '.')."</h5>';
</script>";