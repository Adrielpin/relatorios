<?php

include $_SERVER['DOCUMENT_ROOT'] . '/relatorio/sistem/init.php';
session_start();

GetAccounts($_SESSION['id']);

function GetAccounts($id) {
  
  $user = new AdWordsUser();
  $user->SetClientCustomerId($id);
  
  // Get the service, which loads the required classes.
  $managedCustomerService =
  $user->GetService('ManagedCustomerService', ADWORDS_VERSION);

 // Create selector.
  $selector = new Selector();
  // Specify the fields to retrieve.
  $selector->fields = array('CustomerId',  'Name');
  $selector->ordering[] = new OrderBy('Name', 'ASCENDING');
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);

  // Create map from customerID to account.
  $accounts = array();
  // Create map from customerId to parent and child links.
  $childLinks = array();
  $parentLinks = array();
  do {
    // Make the get request.
    $graph = $managedCustomerService->get($selector);

    // Create links between manager and clients.
    if (isset($graph->entries)) {
      if (isset($graph->links)) {
        foreach ($graph->links as $link) {
          $childLinks[$link->managerCustomerId][] = $link;
          $parentLinks[$link->clientCustomerId][] = $link;
        }
      }

      foreach ($graph->entries as $account) {
        $accounts[$account->customerId] = $account;
      }
    }
    
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($selector->paging->startIndex < $graph->totalNumEntries);

  $rootAccount = null;
  
  foreach ($accounts as $account) {
    if (!array_key_exists($account->customerId, $parentLinks)) {
      $rootAccount = $account;  
    }
  }

  // Display account tree.
  DisplayAccountTree($rootAccount, $accounts, $childLinks);
}

function DisplayAccountTree($account, $accounts, $links) {
  if (array_key_exists($account->customerId, $links)) {
    printf("<optgroup label='%s'>",$account->name);
  }
  else{
    printf("<option value='%s'>%s</option>", $account->customerId, $account->name);
  }
  
  if (array_key_exists($account->customerId, $links)) {
    foreach ($links[$account->customerId] as $childLink) {
      $childAccount = $accounts[$childLink->clientCustomerId];
      DisplayAccountTree($childAccount, $accounts, $links);
    }
    print '</optgroup>';
  }
}