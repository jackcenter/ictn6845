<?php
//connect to database
require_once('database.php');

// Get category ID
if (!isset($unitID)) {
    $unitID = filter_input(INPUT_GET, 'unitID', 
            FILTER_VALIDATE_INT);
    if ($unitID == NULL || $unitID == FALSE) {
        $unitID = 1;
    }
}

//get all units
$query = 'SELECT * FROM units
                    ORDER BY unitID';
$statement1 = $db->prepare($query);
$statement1->execute();
$units = $statement1->fetchAll();
$statement1->closeCursor(); 


//get unit information
$queryUnit = 'SELECT * FROM units
                  WHERE unitID = :unitID';
$statement2 = $db->prepare($queryUnit);	
$statement2->bindValue(':unitID', $unitID);
$statement2->execute();
$selectedUnit = $statement2->fetch();
$statement2->closeCursor();

//get all showings
$query = 'SELECT * FROM showings
					WHERE unitID = :unitID';
$statement3 = $db->prepare($query);
$statement3->bindValue(':unitID', $unitID);
$statement3->execute();
$showings = $statement3->fetchAll();
$statement3->closeCursor();
?>

<!doctype html>
<html>
<head>
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>

<body>
<div class="wrapper">

<nav>
	<?php include_once('navigation.php')?>
</nav>

<header>
	<div class="hero">

	</div>
	<h1><?php echo $selectedUnit['address'] ?></h1>
</header>

<main>

<div class="rightNavigation">

	<form action="showingList.php.?unitID=<?php echo $unit['unitID']; ?>">
		<caption>Select a Unit</caption><br>
		<select name="unitID">
			<?php foreach ($units as $unit) : ?>
			<option value="<?php echo $unit['unitID']; ?>"><?php echo $unit['address']; ?></option>
			<?php endforeach; ?>
		</select>
		<br>
		<input type="submit">
	</form>
	
	<form action="addShowing.php" method="post">
		<table>
			<caption>Add a new Showing</caption>
			<tr>
				<td>Date</td>
				<td><input type="date" name="date"></td>
			</tr>
			
			<tr>
				<td>Time</td>
				<td><input type="time" name="time"></td>
			</tr>
		</table>
		<input type="hidden" name="unitID" value="<?php echo $unitID; ?>">
		<td><input type="submit" value="Add Showing"></td>

	</form>
</div>	
	<table>
		<caption>Scheduled Showings</caption>
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>Attendees</th>
			<th>&nbsp;</th>
		</tr>
		
		<!-- display a list of showings for the selected unit -->
       
		<?php foreach ($showings as $showing ) : ?>
			<tr>
				<td class="middle"><?php echo $showing['date'] ?></td>
				<td class="middle"><?php echo $showing['time'] ?></td>
				<td class="middle">&nbsp;</th>
				<td class="right"><form action="deleteShowing.php" method="post">
					<input type="hidden" name="showingID"
						value="<?php echo $showing['showingID']; ?>">
					<input type="submit" value="Delete">
				</form></td>
				
				<td class="right"><form action="showingAttendeeList.php" method="post">
					<input type="hidden" name="showingID"
						value="<?php echo $showing['showingID']; ?>">
					<input type="submit" value="View">
				</form></td>
			</tr>
		<?php endforeach; ?>
	</table>
	

</main>

<!-- 	<div style="clear: both;"> </div> -->
</main>

<footer>
	<?php include_once('footer.php')?>
</footer>
</div>
</body>
</html>