<?php
// The main controller

// Create or access a Session
 session_start();
 
// Get the database connection file
require_once 'library/connections.php';

// Get the library functions 
require_once 'library/functions.php';

// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

// Get the accounts model
require_once 'model/accounts-model.php';

// get the array of classifications from the DB using model
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = getNavigation($classifications);

// $navList = '<ul>';
//  $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
//  foreach ($classifications as $classification) {
//   $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
//  }
// $navList .= '</ul>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

// Check if the firstname cookie exists, get its value
if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action) {
    case 'something':

        break;

    default:
        include 'view/home.php';
}
