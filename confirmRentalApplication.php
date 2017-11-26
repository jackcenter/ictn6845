<?php
//pull unitID from the URL
$unitID = $_GET["unitID"];

//get data from the form
$firstName = filter_input(INPUT_POST, 'firstName');
$middleInitial = filter_input(INPUT_POST, 'middleInitial');
$lastName = filter_input(INPUT_POST, 'lastName');

$dateOfBirth = filter_input(INPUT_POST, 'dateOfBirth');
$phoneNumberPrimary = filter_input(INPUT_POST, 'phoneNumberPrimary');
$phoneNumberAlternate = filter_input(INPUT_POST, 'phoneNumberAlternate');
$email = filter_input(INPUT_POST, 'email');

$roommates = filter_input(INPUT_POST, 'roommates');
$roommates = htmlspecialchars($roommates);
$roommates = nl2br($roommates, false); 

// Validate inputs
if ($firstName == null) {
    $error = "Invalid comment. Please try again.";
    include('error.php');
} 

else {
	//connect to the database
	require_once('database.php');

	//post new applicant to the table
    $query = 'INSERT INTO applicants
                 (firstName, middleInitial, lastName, unitID, dateOfBirth, phoneNumberPrimary,
				 phoneNumberAlternate, email, roommates)
              VALUES
                 (:firstName, :middleInitial, :lastName, :unitID, :dateOfBirth, 
				 :phoneNumberPrimary, :phoneNumberAlternate, :email, :roommates)';
    $statement = $db->prepare($query);
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':middleInitial', $middleInitial);
	$statement->bindValue(':lastName', $lastName);
	$statement->bindValue(':unitID', $unitID);
	$statement->bindValue(':dateOfBirth', $dateOfBirth);
	$statement->bindValue(':phoneNumberPrimary', $phoneNumberPrimary);
	$statement->bindValue(':phoneNumberAlternate', $phoneNumberAlternate);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':roommates', $roommates);
    $statement->execute();
    $statement->closeCursor();
} 

//get all of the comments
/* $query = 'SELECT * FROM comments
                       ORDER BY time';
$statement = $db->prepare($query);
$statement->execute();
$comments = $statement->fetchAll();
$statement->closeCursor(); */

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Title</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
</head>

<!-- the body section -->
<body>
<div class="wrapper">
<nav>
	<?php include_once('navigation.php')?>
</nav>

<header>
<h1>Confirmation of Rental Application</h2>
</header>
<main>
	<table>
		<tr>
			<th>Name</th>
			<td><?php echo $firstName.' '.$middleInitial.' '.$lastName; ?><td>
		</tr>
		
		<tr>
			<th>Date of Birth</th>
			<td><?php echo $dateOfBirth; ?><td>
		</tr>
		
		<tr>
			<th>Phone Number (Primary)</th>
			<td><?php echo $phoneNumberPrimary; ?><td>
		</tr>
		
		<tr>
			<th>Phone Number (Alternate)</th>
			<td><?php echo $phoneNumberAlternate; ?><td>
		</tr>
		
		<tr>
			<th>Email</th>
			<td><?php echo $email; ?><td>
		</tr>
		
		<tr>
			<th>Roommates</th>
			<td><?php echo $roommates; ?><td>
		</tr>

	</table>
</main>
<footer>
    <?php include_once('footer.php')?>
</footer>
</div>
</body>
</html>