<?php
include $_SERVER['DOCUMENT_ROOT'] . '/relatorio/sistem/init.php';

if (isset($_POST['group'])){
$group = $_POST['group']; 
$token = $_POST['contas'];
  
  // Get the service, which loads the required classes.
  $user = new AdWordsUser();
  $user->SetClientCustomerId($token);

  $adGroupCriterionService =
  $user->GetService('AdGroupCriterionService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('Id', 'KeywordMatchType', 'KeywordText');
  $selector->ordering[] = new OrderBy('KeywordText', 'ASCENDING');

  // Create predicates.
  $selector->predicates[] = new Predicate('AdGroupId', 'IN', $group);
  $selector->predicates[] = new Predicate('CriteriaType', 'IN', array('KEYWORD'));
  $selector->predicates[] = new Predicate('IsNegative', 'IN', array('false'));

  // Create paging controls.
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);

  do {
    // Make the get request.
    $page = $adGroupCriterionService->get($selector);

    // Display results.
    if (isset($page->entries)) {
      foreach ($page->entries as $adGroupCriterion) {
    if($adGroupCriterion->criterion->matchType == 'PHRASE'){
      $key = '"'.$adGroupCriterion->criterion->text.'"';
    }
    
    elseif($adGroupCriterion->criterion->matchType == 'EXACT'){
      $key = '['.$adGroupCriterion->criterion->text.']';
    }
    else{
      $key = $adGroupCriterion->criterion->text;
    }
    
      printf("<option value='%s'>%s</option>", $adGroupCriterion->criterion->id, $key);
      }
    } else {
          print "<option value=''>não ha palavras</option>";
    }

    // Advance the paging index.
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($page->totalNumEntries > $selector->paging->startIndex);
}
else{
  print '<option value="">Selecione um grupo</option>';
}