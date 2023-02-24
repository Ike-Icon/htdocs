<?php
// The vehicles controller

// Create or access a Session
session_start();

// Get the database connection file 
require_once '../library/connections.php';

// Get the php motors main model in the vehicles controller 
require_once '../model/main-model.php';

// Get the vehicles model for use of the vehicles page 
require_once '../model/vehicles-model.php';

// Get the library functions 
require_once '../library/functions.php';

// get the array of classifications from the database using model 
$classifications = getClassifications();

// // Build a navigation bar using the $classifications array
$navList = getNavigation($classifications);

// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';

// Build a select menu using the $classifications array 
// for the classification select option in the add vehicle page
// $classificationList = '<select name="classificationId" id="classificationList">';
// $classificationList .= "<option value=classificationId>Choose Car Classifications</option>";
// foreach($classifications as $classification) {
// $classificationList .= "<option value='$classification[classificationId]' > $classification[classificationName]</option>";
// }
// $classificationList .= '</select>';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'somthing':
        break;
        
    case 'add-classification':
        include '../view/add-classification.php';
        break;
        
    case 'add-vehicle':
        include '../view/add-vehicle.php';
        break;


    case 'addCar':

        //  Filter and store the vehicle data to the db
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_VALIDATE_INT));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_VALIDATE_INT));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_VALIDATE_INT));

        //check for missing data
        if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
            $theMessage = '<p style="color: red">Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit;
        }

        //Send the data to the model if no errors exist
        $vehicleOutcome = addInventory($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

        if ($vehicleOutcome === 1) {
            $theMessage = "<p style='color: green'>You have successfull added $invMake </p>";
            include '../view/vehicle-man.php';
            exit;

        } else {
            $theMessage = "<p style='color: red'>Sorry, the addition of vehicle failed</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        break;

    case 'addClass':

        //  Filter and store the car classification data 
        // $classificationId = filter_input(INPUT_POST, 'classificationId');
        $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        //check for missing data
        if (empty($classificationName)) {
            $theClassMessage = '<p style="color: red">Please provide information of the Car Classification.</p>';
            include '../view/add-classification.php';
            exit;
        }

        //Send the data to the model if no errors exist
        $addOutcome = addClassification($classificationName);

        if ($addOutcome === 1) {
            $theClassMessage = '<p> $classificationName has been added successfully to the Car Classification</p>';
            include '../view/vehicle-man.php';
            
            //the next line make it so that a refresh of the page will not result in
            //  the form being submitted again and it will also refresh 
            //  the navigation so that the new classification shows up
            header('Location: http://localhost/phpmotors/vehicles');   
            
        } else {
            $theClassMessage = '<p style="color: blue">Please provide information for all empty form fields.</p>';
            include '../view/add-classification.php';
            exit;

        }
        break;

    default:
        include '../view/vehicle-man.php';
        break;
}
