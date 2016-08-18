<?php
include $_SERVER['DOCUMENT_ROOT'] . '/relatorio/sistem/init.php';

if (isset($_POST['camp'])){
	
$token = $_POST['contas'];
$camp = $_POST['camp'];

$user = new AdWordsUser();
$user->SetClientCustomerId($token);

  // Get the service, which loads the required classes.
  $adGroupService = $user->GetService('AdGroupService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('Id', 'Name', 'Status');
  $selector->ordering[] = new OrderBy('Name', 'ASCENDING');

  // Create predicates.
  $selector->predicates[] = new Predicate('CampaignId', 'IN', $camp);

  // Create paging controls.
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);

  do {
    // Make the get request.
    $page = $adGroupService->get($selector);

    // Display results.
    if (isset($page->entries)) {
      foreach ($page->entries as $adGroup) {
		if($adGroup->status == 'ENABLED'){
					printf("<option value='%s' class='ativo'>%s</option>", $adGroup->id, $adGroup->name);
				}
				elseif($adGroup->status == 'PAUSED'){
					printf("<option value='%s' class='pausado'>%s</option>", $adGroup->id, $adGroup->name);
				}
				elseif($adGroup->status == 'REMOVED'){
					printf("<option value='%s' class='removido'>%s</option>", $adGroup->id, $adGroup->name);
				}
			  }
    } else {
      print "<option value='' class='removido'>não ha grupo</option>";
    }

    // Advance the paging index.
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($page->totalNumEntries > $selector->paging->startIndex);
}
else{
	print '<option value="">Selecione uma campanha</option>';
}