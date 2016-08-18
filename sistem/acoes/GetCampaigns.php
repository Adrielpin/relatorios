<?php

/**
 * Trabalhar interação de rede para VIIDEO E MOBILE;
 */

  ini_set("display_errors", "1");
  error_reporting(E_ALL);

include $_SERVER['DOCUMENT_ROOT'] . '/relatorio/sistem/init.php';

if (isset($_POST)){
	
	$conta = $_POST['conta'];
	$rede = $_POST['rede'];

	$user = new AdWordsUser();
	$user->SetClientCustomerId($conta);
	
	

	if($rede == 'GMAIL'){

		// Get the service, which loads the required classes.
		$service = $user->GetService('AdGroupCriterionService', ADWORDS_VERSION);

		// Create selector.
		$selector = new Selector();
		$selector->fields = array('BaseCampaignId','PlacementUrl');
		$selector->predicates[] = new Predicate('PlacementUrl','EQUALS','mail.google.com');

		// Make the get request.
		$page = $service->get($selector);

		// get vbase Ids
		$camp = null;
		if (isset($page->entries)) {
			$camp = array();
			foreach($page->entries as $groupsId){
				array_push($camp, $groupsId->baseCampaignId);
			}
		}		
	}

	// Get the service, which loads the required classes.
	$campaignService = $user->GetService('CampaignService', ADWORDS_VERSION);

	// Create selector.
	$selector = new Selector();
	$selector->fields = array('Id', 'Name','CampaignStatus');
	$selector->ordering[] = new OrderBy('Name', 'ASCENDING');

	if($rede == 'GMAIL' && $camp != ''){
		$selector->predicates[] = new Predicate('CampaignId', 'IN', $camp);
	}
	
	if($rede != 'GMAIL'){
		$selector->predicates[] = new Predicate('AdvertisingChannelType', 'EQUALS', array($rede));
	}
	
	// Create paging controls.
	$selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);

	do {
		// Make the get request.
		$page = $campaignService->get($selector);

		// Display results.
		if (isset($page->entries)) {

			foreach ($page->entries as $campaign){

				if($campaign->status == 'ENABLED'){
					printf("<option value='%s' class='ativo'>%s</option>", $campaign->id, $campaign->name);
				}

				elseif($campaign->status == 'PAUSED'){
					printf("<option value='%s' class='pausado'>%s</option>", $campaign->id, $campaign->name);
				}

				elseif($campaign->status == 'REMOVED'){
					printf("<option value='%s' class='removido'>%s</option>", $campaign->id, $campaign->name);
				}
			}
		}

		else {
			print "<option value='' class='removido'>Não ha campanhas</option>";
		}

		// Advance the paging index.
		$selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
	}

	while ($page->totalNumEntries > $selector->paging->startIndex);

}

else{
	print '<option value="">Não a campanhas</option>';
}

?>
