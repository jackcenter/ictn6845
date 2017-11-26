<?php
require_once('database.php');

// Get IDs
$unitID = filter_input(INPUT_POST, 'unitID', FILTER_VALIDATE_INT);

// Delete the product from the database
    $query = 'DELETE FROM units
              WHERE unitID = :unitID';
    $statement = $db->prepare($query);
    $statement->bindValue(':unitID', $unitID);
    $success = $statement->execute();
    $statement->closeCursor();    

// Display the Product List page
include('propertyList.php');