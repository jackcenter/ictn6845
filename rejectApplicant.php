<?php
//get applicantID from the form
$applicantID = filter_input(INPUT_POST, 'applicantID', FILTER_VALIDATE_INT);

//connect ot the database
require_once('database.php');

// Add the applicant to the database  
$query = 'UPDATE applicants
			SET status = 0
			WHERE applicantID = :applicantID';
$statement = $db->prepare($query);
$statement->bindValue(':applicantID', $applicantID);
$statement->execute();
$statement->closeCursor();

// Display the Residential Hisory page
include('applicantList.php');
?>