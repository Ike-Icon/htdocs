<?php
//  The  accounts model 

//  new function to handle site registrations. 
function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword)
{

    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();

    // The SQL statement
    $sql = 'INSERT INTO clients (clientFirstname, clientLastname,clientEmail, clientPassword)
VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';

    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);

    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);

    // Insert the data
    $stmt->execute();

    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();

    // Close the database interaction
    $stmt->closeCursor();

    // Return the indication of success (rows changed)
    return $rowsChanged;
}


// Check for an existing email address
function checkExistingEmail($clientEmail)
{   
    // Create a connection object from the phpmotors connection function
    $db =  phpmotorsConnect();
    
    // The SQL statement to be used with the database
    $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';

    // The next line creates the prepared statement using the phpmotors connection      
    $stmt = $db->prepare($sql);

    // The next line runs the prepared statement 
    // $stmt->bindParam(':email', $clientEmail);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);

    // The next line gets the data from the database and 
    // stores it as an array in the $clientEmail variable 
    $stmt->execute();

    // The next line closes the interaction with the database 
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

    // The next line sends the array of data back to where the function
    $stmt->closeCursor();

    if (empty($matchEmail)) {
        return 0;
        // echo 'Nothing found';
    } else {
        return 1;
        // echo 'Match Found';
        // exit;
    }
}


// Get client data based on an email address
function getClient($clientEmail){
    $db = phpmotorsConnect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
   }
