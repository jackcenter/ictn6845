<?php
// Get the product data
$address = filter_input(INPUT_POST, 'address');
$dateAvailable = filter_input(INPUT_POST, 'dateAvailable');
$advertised = filter_input(INPUT_POST, 'advertised', FILTER_VALIDATE_INT);
$rentAmount = filter_input(INPUT_POST, 'rentAmount', FILTER_VALIDATE_INT);
$squareFeet = filter_input(INPUT_POST, 'squareFeet', FILTER_VALIDATE_INT);
$bedrooms = filter_input(INPUT_POST, 'bedrooms', FILTER_VALIDATE_INT);
$bathrooms = filter_input(INPUT_POST, 'bathrooms', FILTER_VALIDATE_FLOAT);

// Validate inputs

    require_once('database.php');

    // Add the property to the database  
    $query = 'INSERT INTO units
                 (address, dateAvailable, advertised, rentAmount, squareFeet, bedrooms, bathrooms)
              VALUES
                 (:address, :dateAvailable, :advertised, :rentAmount, :squareFeet, :bedrooms, :bathrooms)';
    $statement = $db->prepare($query);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':dateAvailable', $dateAvailable);
	$statement->bindValue(':advertised', $advertised);
    $statement->bindValue(':rentAmount', $rentAmount);
    $statement->bindValue(':squareFeet', $squareFeet);
	$statement->bindValue(':bedrooms', $bedrooms);
	$statement->bindValue(':bathrooms', $bathrooms);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('propertyList.php');
?>