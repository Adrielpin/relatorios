<?php
/*
 *
 * Seção de analytcs
 * @author Adriel Pinheiro <adriel.pinheiro@clinks.com.br>
 *
 *
 */

include 'Service.php';

if($camp != null){
	$ponteiro = 'ga:adwordsCampaignID';
	$ga = 'ga:transactionRevenue>0';
}

if($group != null){
	$ponteiro = 'ga:adwordsAdGroupID';
	$ga = array();
	foreach ($group as $c){
		array_push($ga,$ponteiro.'=='.$c);
	}
	$ga = implode(",", $ga);
}

if($wordlabel != null){
	$ponteiro = 'ga:keyword';
	$ga = $ponteiro.'=='.$wordlabel;
}

if($sintax == 'Date'){
	$adRoi = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>$ponteiro.',ga:date','filters'=>$ga));
	$adTotal = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>'ga:date'));
	$adRoi = $adRoi->getRows();
	asort($adRoi);
	asort($adTotal);
	$sum = array();

	if($camp != null){
		foreach($camp as $c){
			foreach($adRoi as &$row){
				if($c == $row[0]){
					array_push($sum, array(date("d", strtotime($row[1])),(float)$row[2]));
				}	
			}
		}
	}

	else{
		foreach($adRoi as &$row){
			array_push($sum, array(date("d", strtotime($row[1])),(float)$row[2]));
		}
	}

	$adRoi = array_reduce($sum, soma);
	$adTotal = $adTotal->getRows();

	foreach($adTotal as &$row){
		$row[0] = date("d", strtotime($row[0]));
	}
}

if($sintax == 'Month'){
	$adRoi = $analytics->data_ga->get($p_analitycs, $startdate,$enddate, 'ga:transactionRevenue', array('dimensions'=>$ponteiro.',ga:month', 'filters'=>$ga));
	$adTotal = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>'ga:month'));
	$adRoi = $adRoi->getRows();

	$sum = array();
	if($camp != null){
		foreach($camp as $c){
			foreach($adRoi as &$row){
				if($c == $row[0]){
					array_push($sum, array($row[1],(float)$row[2]));
				}	
			}
		}
	}

	else{
		foreach($adRoi as &$row){
			array_push($sum, array($row[1],(float)$row[2]));
		}
	}

	$adRoi = array_reduce($sum, soma);
	asort($adRoi);
	$adTotal = $adTotal->getRows();
}

if($sintax == 'Year'){
	$adRoi = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>$ponteiro.',ga:year', 'filters'=>$ga));
	$adTotal = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>'ga:year'));
	$adRoi = $adRoi->getRows();

	$sum = array();
	if($camp != null){
		foreach($camp as $c){
			foreach($adRoi as &$row){
				if($c == $row[0]){
					array_push($sum, array($row[1],(float)$row[2]));
				}	
			}
		}
	}

	else{
		foreach($adRoi as &$row){
			array_push($sum, array($row[1],(float)$row[2]));
		}
	}

	$adRoi = array_reduce($sum, soma);
	$adTotal = $adTotal->getRows();
}



$ad_tabela = array(array('Data','Faturamento AdWords', array(type => 'string', role =>'annotation')));
$roi_tabela = array(array('Data','ROI', array(type => 'string', role =>'annotation')));
$ad_x_parcela = array(array('Data','Faturamento', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));
$adTotal_tabela = array(array('Data','Faturamento total', array(type => 'string', role =>'annotation')));
$ad_total_x_ad_tabela = array(array('Data','Faturamento Total', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));

$t_faturamento_total = 0;
$t_faturamento_ad = 0;
$t_roi = 0;

$t_faturamento_total_proj = 0;
$t_faturamento_ad_proj = 0;

if($sintax == 'Month'){ 
	foreach ($adRoi as &$row) {
		array_push($ad_tabela, array($mes_extenso[$row[0]], (float)$row[1], 'R$ '.number_format((float)$row[1], 2, ',', '.')));
		foreach($investimento_x_parcela_date as &$b){
			if($mes_extenso[$row[0]] == $b[0]){
				$ROI = round(((float)$row[1]-(float)$b[1])/(float)$b[1],2);
				array_push($roi_tabela, array($mes_extenso[$row[0]], $ROI, (string)$ROI));
				$t_faturamento_ad += (float)$row[1];
			}
		}
	}
	$t_roi = round((($t_faturamento_ad-$t_investimento)/$t_investimento),2);

	foreach ($adTotal as &$row) {
		array_push($adTotal_tabela, array($mes_extenso[$row[0]], (float)$row[1], 'R$ '.number_format((float)$row[1], 2, ',', '.')));
		$t_faturamento_total += (float)$row[1];
	}
}

else{
	foreach ($adRoi as &$row) {
		array_push($ad_tabela, array($row[0], (float)$row[1], 'R$ '.number_format((float)$row[1], 2, ',', '.')));
		foreach($investimento_x_parcela_date as &$b){		
			if($row[0] == $b[0]){
				$ROI = round(((float)$row[1]-(float)$b[1])/(float)$b[1],2);
				array_push($roi_tabela, array($row[0], $ROI, (string)$ROI));
				$t_faturamento_ad += (float)$row[1];
			}
		}
	}

	$t_roi = round((($t_faturamento_ad-$t_investimento)/$t_investimento),2);

	foreach ($adTotal as &$row) {
		array_push($adTotal_tabela, array($row[0], (float)$row[1], 'R$ '.number_format((float)$row[1], 2, ',', '.')));
		$t_faturamento_total += (float)$row[1];
	}
}

//projeções
$ad_x_parcela = array(array('Data','Faturamento', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));
foreach($ad_tabela as &$ad){
	foreach($roi_tabela as &$a){
		if($ad[0] == $a[0] && $ad[0] != 'Data'){			
			foreach($investimento_x_parcela_date as &$b){		
				if($a[0] == $b[0] && $a[0] != 'Data'){
					$q = round(($a[1]*$b[3])+$b[3],2);
					array_push($ad_x_parcela, array($a[0], $ad[1], 'R$ '.number_format((float)$ad[1], 2, ',', '.'), $q, 'R$ '.number_format((float)$q, 2, ',', '.')));
					$t_faturamento_ad_proj += $q;
				} 
			}		
		}
	}
}

$ad_total_x_ad_tabela = array(array('Data','Faturamento Total', array(type => 'string', role =>'annotation'),'Projeção', array(type => 'string', role =>'annotation')));
foreach($adTotal_tabela as &$a){
	foreach($ad_tabela as &$b){
		if($a[0] == $b[0] && $a[0] != 'Data'){
			foreach($ad_x_parcela as &$c){
				if($b[0] == $c[0] && $b[0] != 'Data'){
					$v = round(($a[1]-$b[1])+$c[3],2);
					array_push($ad_total_x_ad_tabela, array($a[0], $a[1], 'R$ '.number_format((float)$a[1], 2, ',', '.'), $v, 'R$ '.number_format((float)$v, 2, ',', '.')));
					$t_faturamento_total_proj += $v;
				} 
			}
		}
	}
}

$t_faturamento_total_proj = ($t_faturamento_total-$t_faturamento_ad)+$t_faturamento_ad_proj;

print "<script>
var FaturamentoTotal = google.visualization.arrayToDataTable(".json_encode($adTotal_tabela).");
new google.visualization.BarChart(document.getElementById('chart_faturamento_total')).draw(FaturamentoTotal, optionsFaturamentoTotal);
document.getElementById('t_faturamento_total').innerHTML = '<h5>Total R$: ".number_format($t_faturamento_total, 2, ',', '.')."</h5>';

var FaturamentoAd = google.visualization.arrayToDataTable(".json_encode($ad_tabela).");
new google.visualization.BarChart(document.getElementById('chart_faturamento_adwords')).draw(FaturamentoAd, optionsFaturamentoAd);
document.getElementById('t_faturamento_adwords').innerHTML = '<h5>Total R$: ".number_format($t_faturamento_ad, 2, ',', '.')."</h5>';

var Roi = google.visualization.arrayToDataTable(".json_encode($roi_tabela).");
new google.visualization.BarChart(document.getElementById('chart_roi')).draw(Roi, optionsRoi);
document.getElementById('t_roi').innerHTML = '<h5> ROI : ".number_format($t_roi, 2, ',', '.')."</h5>';

var projFaturamentoAd = google.visualization.arrayToDataTable(".json_encode($ad_x_parcela).");
new google.visualization.BarChart(document.getElementById('projecao_faturamento_adwords')).draw(projFaturamentoAd, optionsprogecaoFaturamentoAd);
document.getElementById('t_projecao_faturamento_adwords').innerHTML = '<h5> Total faturamento AdWords R$: ".number_format($t_faturamento_ad, 2, ',', '.')." - Projeção R$: ".number_format($t_faturamento_ad_proj, 2, ',', '.')."</h5>';

var projFaturamento = google.visualization.arrayToDataTable(".json_encode($ad_total_x_ad_tabela).");
new google.visualization.BarChart(document.getElementById('projecao_faturamento_total')).draw(projFaturamento, optionsprogecaoFaturamentototal);
document.getElementById('t_projecao_faturamento_total').innerHTML = '<h5> Total faturamento R$: ".number_format($t_faturamento_total, 2, ',', '.')." - Projeção R$: ".number_format($t_faturamento_total_proj, 2, ',', '.')."</h5>';
</script>";