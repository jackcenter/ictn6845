<?php
// Get the product data
$unitID = filter_input(INPUT_POST, 'unitID');
$date = filter_input(INPUT_POST, 'date');
$time = filter_input(INPUT_POST, 'time');

// Validate inputs

    require_once('database.php');
	
    // Add the showing to the database  
    $query = 'INSERT INTO showings
                 (date, time, unitID)
              VALUES
                 (:date, :time, :unitID)';
    $statement2 = $db->prepare($query);
    $statement2->bindValue(':date', $date);
	$statement2->bindValue(':time', $time);
	$statement2->bindValue(':unitID', $unitID);
    $statement2->execute();
    $statement2->closeCursor();

// Display the Product List page
include("showingList.php");
?>