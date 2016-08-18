<?php

include $_SERVER['DOCUMENT_ROOT'] . '/relatorio/sistem/init.php';

$token = '8156549477';

testeCamp($token);

function testeCamp($token){

	$user = new AdWordsUser();
	$user->SetClientCustomerId($token);

	// Get the service, which loads the required classes.
	$campaignService = $user->GetService('CampaignService', ADWORDS_VERSION);

	// Create selector.
	$selector = new Selector();
	$selector->fields = array('Id', 'Name', 'CampaignStatus');
	
	// Make the get request.
	$page = $campaignService->get($selector);
	
	print '<pre>';
		print_r($page);
	print '</pre>';
}

?>
