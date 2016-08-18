<?php

// ini_set("display_errors", "1");
// error_reporting(E_ALL);

if($_POST != null){

	$token = $_POST['contas'];
	$conta = $_POST['conta'];
	$tipo = $_POST['tipo'];
	$camp = $_POST['camp'];
	$group = $_POST['group'];
	$word = $_POST['word'];
	$wordlabel = $_POST['wordlabel'];
	$range = $_POST['range'];
	$ranges = $range;
	$geo = $_POST['geo'];

	include 'DateRange.php';
	include 'desempenho.php';
	include 'projecao.php';

	include $_SERVER['DOCUMENT_ROOT'] . '/relatorio/sistem/init.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/relatorio/src/connect.php';

	$p_analitycs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT account_anl FROM ecomerce WHERE account_ad=".$token))[account_anl];
	mysqli_close($conn);

	require_once ADWORDS_UTIL_VERSION_PATH . '/ReportUtils.php';

	$user = new AdWordsUser();
	$user->SetClientCustomerId($token);
	
	if($tipo == 'SEARCH' || $tipo == 'SHOPPING'){
		$parcela_impressao = 'SearchImpressionShare';
		$parcela_impressao_orcamento = 'SearchBudgetLostImpressionShare';
		$parcela_impressao_rank = 'SearchRankLostImpressionShare';
	}

	if($tipo == 'DISPLAY'){
		$parcela_impressao = 'ContentImpressionShare';
		$parcela_impressao_orcamento = 'ContentBudgetLostImpressionShare';
		$parcela_impressao_rank = 'ContentRankLostImpressionShare';
	}

	if($tipo == 'GMAIL'){

		// Get the service, which loads the required classes.
		$service = $user->GetService('AdGroupCriterionService', ADWORDS_VERSION);

		// Create selector.
		$selector = new Selector();
		$selector->fields = array('BaseCampaignId','PlacementUrl');
		$selector->predicates[] = new Predicate('PlacementUrl','EQUALS','mail.google.com');

		// Make the get request.
		$page = $service->get($selector);
		
		// get vbase Ids
		$camp = array();
		foreach($page->entries as $groupsId){
			array_push($camp, $groupsId->baseCampaignId);
		}

		// include sharedimpression for field selector 
		$parcela_impressao = 'ContentImpressionShare';
		$parcela_impressao_orcamento = 'ContentBudgetLostImpressionShare';
		$parcela_impressao_rank = 'ContentRankLostImpressionShare';
	}

	if($tipo == 'VIDEO'){
		$parcela_impressao = 'ContentImpressionShare';
		$parcela_impressao_orcamento = 'ContentBudgetLostImpressionShare';
		$parcela_impressao_rank = 'ContentRankLostImpressionShare';
	}


	function soma($a, $b){
		isset($a[$b[0]]) ? $a[$b[0]][1] += $b[1] : $a[$b[0]] = $b;
		return $a;
	}

	$user = new AdWordsUser();
	$user->SetClientCustomerId($token);
	$user->LoadService('ReportDefinitionService', ADWORDS_VERSION);

	if($word == null){

		if($group == null){

			if($camp == null){
				
				include 'conta/DateReport.php';
				include 'conta/WeekReport.php';
				include 'conta/HourReport.php';
				
				$user = new AdWordsUser();
				$user->SetClientCustomerId($token);
				$campaignService = $user->GetService('CampaignService', ADWORDS_VERSION);

				$selector = new Selector();
				$selector->fields = array('Id');
				$selector->predicates[] = new Predicate('AdvertisingChannelType', 'EQUALS', array($tipo));
				$page = $campaignService->get($selector);

				$camp = array();
				foreach ($page->entries as $campaign){
					$id = $campaign->id;
					array_push($camp, $id);
				}

				$user = new AdWordsUser();
				$user->SetClientCustomerId($token);
				$user->LoadService('ReportDefinitionService', ADWORDS_VERSION);

				include 'conta/GeoReport.php';
			}

			else{

				include 'campanha/DateReport.php';
				include 'campanha/WeekReport.php';
				include 'campanha/HourReport.php';
				include 'campanha/GeoReport.php';

			}
		}

		else{
			include 'grupo/DateReport.php';
			include 'grupo/WeekReport.php';
			include 'grupo/HourReport.php';
			include 'grupo/GeoReport.php';
		}		
	}

	else{
		include 'palavra/DateReport.php';
		include 'palavra/WeekReport.php';
	}

	if($p_analitycs != ''){
		
		$p_analitycs = 'ga:'.$p_analitycs;
		include 'ecomerce/ROI.php';
		include 'ecomerce/weekRoi.php';
		include 'ecomerce/hourRoi.php';
		include 'ecomerce/geoRoi.php';
	}
}
?>

<script src='../theme/js/config-file.js'></script>

<script type="text/javascript"> 

document.title = 'Relatório Google AdWords  - <?php echo $tipo." - ".$conta." - ".ucfirst($month); ?>'; 

if ('<?php echo $p_analitycs?>' == ''){
	$('[name=chart_roi]').hide();
}

if($('#remove-logo').is(':checked')){
	$('#capa-desempenho').attr("style", "width: 100%;height: 100%;background-image: url('img/Capa-Desempenho-s.png') !important;background-repeat: no-repeat !important; background-size:contain !important;");
	$('#capa-projecao').attr("style", "width: 100%;height: 100%;background-image: url('img/Capa-Projecao-s.png') !important;background-repeat: no-repeat !important; background-size:contain !important;");
	$('[name=logo-rodape]').hide();
	$('[name=LogoPartner-rodape]').attr("src", "img/LogoAdWords.png");
}

input = $('#Logo-Cliente');
inputFiles = input[0].files;
if (inputFiles != undefined || inputFiles.length > 0) {

inputFile = inputFiles[0];
console.log(inputFile);
reader = new FileReader();
reader.onload = function(event) {
	$('#capa-desempenho').attr("style", "width: 100%;height: 100%;background-image: url('img/Capa-Desempenho-s.png') !important;background-repeat: no-repeat !important; background-size:contain !important;");
	$('#capa-projecao').attr("style", "width: 100%;height: 100%;background-image: url('img/Capa-Projecao-s.png') !important;background-repeat: no-repeat !important; background-size:contain !important;");
	$('[name=logo-rodape]').attr("src", event.target.result);
	$('[name=LogoPartner-rodape]').hide();
};
reader.readAsDataURL(inputFile);
}

</script>