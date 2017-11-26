<?php
// Get the unit data
$address = filter_input(INPUT_POST, 'address');
$dateAvailable = filter_input(INPUT_POST, 'dateAvailable');
$advertised = filter_input(INPUT_POST, 'advertised', FILTER_VALIDATE_INT);
$rentAmount = filter_input(INPUT_POST, 'rentAmount', FILTER_VALIDATE_INT);
$squareFeet = filter_input(INPUT_POST, 'squareFeet', FILTER_VALIDATE_INT);
$bedrooms = filter_input(INPUT_POST, 'bedrooms', FILTER_VALIDATE_INT);
$bathrooms = filter_input(INPUT_POST, 'bathrooms', FILTER_VALIDATE_FLOAT);
$unitID = filter_input(INPUT_POST, 'unitID');

// Validate inputs

//connect to the database
require_once('database.php');

// Add the property to the database  
$query = 'UPDATE units
			SET address = :address, dateAvailable = :dateAvailable, advertised = :advertised, rentAmount = :rentAmount, squareFeet = :squareFeet, bedrooms = :bedrooms, bathrooms = :bathrooms
			WHERE unitID = :unitID';
$statement = $db->prepare($query);
$statement->bindValue(':address', $address);
$statement->bindValue(':dateAvailable', $dateAvailable);
$statement->bindValue(':advertised', $advertised);
$statement->bindValue(':rentAmount', $rentAmount);
$statement->bindValue(':squareFeet', $squareFeet);
$statement->bindValue(':bedrooms', $bedrooms);
$statement->bindValue(':bathrooms', $bathrooms);
$statement->bindValue(':unitID', $unitID);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('propertyList.php');
?>