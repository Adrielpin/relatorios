<?php


define('SRC_PATH', $_SERVER['DOCUMENT_ROOT'] . '/relatorio/src/');
define('LIB_PATH', 'Google/Api/Ads/AdWords/Lib');
define('UTIL_PATH', 'Google/Api/Ads/Common/Util');
define('ADWORDS_UTIL_PATH', 'Google/Api/Ads/AdWords/Util');
define('ADWORDS_UTIL_VERSION_PATH', 'Google/Api/Ads/AdWords/Util/v201605');

define('ADWORDS_VERSION', 'v201605');

// Configure include path
ini_set('include_path', implode(array(
    ini_get('include_path'), PATH_SEPARATOR, SRC_PATH
)));

// Include the AdWordsUser
require_once LIB_PATH . '/AdWordsUser.php';
?>