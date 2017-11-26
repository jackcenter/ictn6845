<?php
//pull unitID from the URL
$unitID = $_GET["unitID"];

// Get the product data
$firstName = filter_input(INPUT_POST, 'firstName');
$middleInitial = filter_input(INPUT_POST, 'middleInitial');
$lastName = filter_input(INPUT_POST, 'lastName');
$dateOfBirth = filter_input(INPUT_POST, 'dateOfBirth');
$phoneNumberPrimary = filter_input(INPUT_POST, 'phoneNumberPrimary');
$phoneNumberAlternate = filter_input(INPUT_POST, 'phoneNumberAlternate');
$email = filter_input(INPUT_POST, 'email');

// Validate inputs

// Connect to the database
require_once('database.php');

// Add the applicant to the database  
$query = 'INSERT INTO applicants
			 (firstName, middleInitial, lastName, unitID, dateOfBirth, phoneNumberPrimary, phoneNumberAlternate, email)
		  VALUES
			 (:firstName, :middleInitial, :lastName, :unitID, :dateOfBirth, :phoneNumberPrimary, :phoneNumberAlternate, :email)';
$statement = $db->prepare($query);
$statement->bindValue(':firstName', $firstName);
$statement->bindValue(':middleInitial', $middleInitial);
$statement->bindValue(':lastName', $lastName);
$statement->bindValue(':dateOfBirth', $dateOfBirth);
$statement->bindValue(':unitID', $unitID);
$statement->bindValue(':phoneNumberPrimary', $phoneNumberPrimary);
$statement->bindValue(':phoneNumberAlternate', $phoneNumberAlternate);
$statement->bindValue(':email', $email);
$statement->execute();
$statement->closeCursor();

// Display the Residential Hisory page
include('rentalApplicationConfirmation.php');
?>