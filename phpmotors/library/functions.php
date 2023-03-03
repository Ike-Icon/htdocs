<?php

// This will check the value of the $clientEmail variable to see if it's a valid email.
function checkEmail($clientEmail)
{
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

// functon to check that the password meets the format requirement that we added to our HTML form
function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

// Build a navigation bar using the $classifications array
function getNavigation($classifications) {
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

// Build the classifications select list.
// Now Declares the function and specifies the parameter - an array of classifications
function buildClassificationList($classifications){ 

    // Begins the select element.
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    // Creates a default option with no value.
    $classificationList .= "<option>Choose a Classification</option>"; 
    // A foreach loop to create a new option for each element within the array.
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } // Ends the select element.
    $classificationList .= '</select>'; 
    // Returns the finished select element that has been stored into the variable.
    return $classificationList; 
   }