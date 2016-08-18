<?php

  $path = $_SERVER['DOCUMENT_ROOT'] . '/relatorio/src/Google/Analytics/';

  include $path.'vendor/autoload.php';

  $service_account_email = 'analytics-clinks@adwords-reports-1135.iam.gserviceaccount.com';
  $key_file_location = $path.'analytics-clinks.p12';

  // Create and configure a new client uobject.
  $client = new Google_Client();
  $analytics = new Google_Service_Analytics($client);

  // Read the generated client_secrets.p12 key.
  $key = file_get_contents($key_file_location);
  $cred = new Google_Auth_AssertionCredentials(
      $service_account_email,
      array(Google_Service_Analytics::ANALYTICS_READONLY),
      $key
  );
  $client->setAssertionCredentials($cred);
  if($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
  }