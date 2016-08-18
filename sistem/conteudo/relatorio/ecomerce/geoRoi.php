<?php

/*
 *
 * Seção de analytcs por dia da semana
 * @author Adriel Pinheiro <adriel.pinheiro@clinks.com.br>
 *
 *
 */

include 'Service.php';

if($geo == 'P'){
	$geo_roi = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>$ponteiro.',ga:country','filters'=>$ga));
	$geo_ad_total = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>'ga:country','filters'=>'ga:transactionRevenue>0'));
}
if($geo == 'E'){
	$geo_roi = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>$ponteiro.',ga:regionId', 'filters'=>$ga));
	$geo_ad_total = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>'ga:regionId','filters'=>'ga:transactionRevenue>0'));
}

if($geo == 'C'){
	$geo_roi = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>$ponteiro.',ga:cityId', 'filters'=>$ga));
	$geo_ad_total = $analytics->data_ga->get($p_analitycs,$startdate,$enddate,'ga:transactionRevenue', array('dimensions'=>'ga:cityId','filters'=>'ga:transactionRevenue>0'));
}

function reducer($a, $b){
	isset($a[$b[1]]) ? $a[$b[1]][2] += $b[2] : $a[$b[1]] = $b;
	return $a;
}

$geo_roi_old = $geo_roi->getRows();

if($camp != null){
	$geo_roi = array();
	foreach ($camp as $c) {
		foreach($geo_roi_old as $ge){
			if($c == $ge[0]){
				array_push($geo_roi, $ge);
			}
		}
	}
}
else{
	$geo_roi = $geo_roi_old;
}

$geo_roi = array_reduce($geo_roi, reducer);

$geo_ad_total = $geo_ad_total->getRows();

usort($geo_roi, function($a, $b) { if ($a[2] == $b[2]) {return 0;} return ($a[2] > $b[2]) ? -1 : 1;});
usort($geo_ad_total, function($a, $b) { if ($a[1] == $b[1]) {return 0;} return ($a[1] > $b[1]) ? -1 : 1;});


$geo_ad_tabela = array(array('Data','Faturamento', array(type => 'string', role =>'annotation')));
$geo_roi_tabela = array(array('Data','ROI', array(type => 'string', role =>'annotation')));
$geo_ad_total_tabela = array(array('Data','Faturamento total', array(type => 'string', role =>'annotation')));

$c=0;
foreach ($geo_roi as &$row){
	if($row[1] == 'Brazil'){
		$row[1] = 'Brasil';
	}

	foreach ($cidades as &$k){
		$local=$k[0];

		if($geo == 'P'){
			$local=$k[2];
		}

		if($local == $row[1]){
			array_push($geo_ad_tabela, array($k[2], (float)$row[2], 'R$ '.number_format((float)$row[2], 2, ',', '.')));
			$q = (float)$k[1]/1000000;
			$ROI = round(((float)$row[2]-$q)/$q,2);
			array_push($geo_roi_tabela, array($k[2], $ROI, (string)$ROI));
		}
	}
	$c++;
	if($c==30){
		break;
	}
}

$c=0;
foreach ($geo_ad_total as &$row) {
	if($row[0] == 'Brazil'){
		$row[0] = 'Brasil';
	}
	foreach ($cidades as &$k){
		$local=$k[0];

		if($geo == 'P'){
			$local=$k[2];
		}
		if($local == $row[0]){
			array_push($geo_ad_total_tabela, array($k[2], (float)$row[1], 'R$ '.number_format((float)$row[1], 2, ',', '.')));
		}
	}
	$c++;
	if($c==30){
		break;
	}
}

print "<script>
var data = google.visualization.arrayToDataTable(".json_encode($geo_ad_total_tabela).");
new google.visualization.BarChart(document.getElementById('chart_faturamento_total_geo')).draw(data, optionsFaturamentoTotal);

var data = google.visualization.arrayToDataTable(".json_encode($geo_ad_tabela).");
new google.visualization.BarChart(document.getElementById('chart_faturamento_adwords_geo')).draw(data, optionsFaturamentoAd);

var data = google.visualization.arrayToDataTable(".json_encode($geo_roi_tabela).");
new google.visualization.BarChart(document.getElementById('chart_roi_geo')).draw(data, optionsRoi);
</script>";