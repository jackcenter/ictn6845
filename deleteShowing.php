<?php
require_once('database.php');

// Get IDs
$showingID = filter_input(INPUT_POST, 'showingID', FILTER_VALIDATE_INT);

// Delete the showing from the database
$query = 'DELETE FROM showings
		  WHERE showingID = :showingID';
$statement = $db->prepare($query);
$statement->bindValue(':showingID', $showingID);
$success = $statement->execute();
$statement->closeCursor();    

// Display the Product List page
include('showingList.php');