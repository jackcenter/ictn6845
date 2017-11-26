<?php
// Get the product data
$showingID = filter_input(INPUT_POST, 'showingID');
$firstName = filter_input(INPUT_POST, 'firstName');
$middleInitial = filter_input(INPUT_POST, 'middleInitial');
$lastName = filter_input(INPUT_POST, 'lastName');
$phoneNumber = filter_input(INPUT_POST, 'phoneNumber');
$email = filter_input(INPUT_POST, 'email');

// Validate inputs

require_once('database.php');
	
// Add the showing to the database  
$query = 'INSERT INTO showingattendees
			 (firstName, middleInitial, lastName, phoneNumber, email, showingID)
		  VALUES
			 (:firstName, :middleInitial, :lastName, :phoneNumber, :email, :showingID)';
$statement1 = $db->prepare($query);
$statement1->bindValue(':firstName', $firstName);
$statement1->bindValue(':middleInitial', $middleInitial);
$statement1->bindValue(':lastName', $lastName);
$statement1->bindValue(':phoneNumber', $phoneNumber);
$statement1->bindValue(':email', $email);
$statement1->bindValue(':showingID', $showingID);
$statement1->execute();
$statement1->closeCursor();

// Display the Product List page
include("showingSignUpConfirmation.php");
?>