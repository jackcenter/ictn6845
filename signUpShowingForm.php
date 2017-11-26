<?php
//connect to database
require_once('database.php');

//pull showingID from the form
$showingID = filter_input(INPUT_POST, 'showingID');
echo $showingID;

//get showing info
$query = 'SELECT * FROM showings
					INNER JOIN units
					ON showings.unitID = units.unitID
					WHERE showingID = :showingID';
$statement1 = $db->prepare($query);
$statement1->bindValue(':showingID', $showingID);
$statement1->execute();
$selectedShowing = $statement1->fetch();
$statement1->closeCursor();
?>

<!doctype html>
<html>
<head>
<title>Title</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
</head>

<body>

<div class="wrapper">

<nav>
	<?php include_once('navigation.php')?>
</nav>

<header>

</header>

<main>
	<h1><?php echo $selectedShowing['address'] ?></h1>
	<h1><?php echo $selectedShowing['date'] ?></h1>
	<h1><?php echo $selectedShowing['time'] ?></h1>
	<h2>Sign Up for the Showing</h2>

	<form action="signUpShowing.php" method="post">
		<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="firstName"></td>
			</tr>
			
			<tr>
				<td>MI</td>
				<td><input type="text" name="middleInitial"></td>
			</tr>
			
			<tr>
				<td><label>Last Name</label></td>
				<td><input type="text" name="lastName"></td>
			</tr>
			
			<tr>
				<td>Phone Number</td>
				<td><input type="tel" name="phoneNumber"></td>
			</tr>

			<tr>
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>
		</table>
		<input type="hidden" name="showingID" value="<?php echo $showingID; ?>">
		<input type="submit" value="Submit">
	</form>
	
</main>

<div style="clear: both;"> </div>

<footer>
	<?php include_once('footer.php')?>
</footer>

</div>

</body>
</html>