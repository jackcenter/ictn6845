<?php
//connect to database
require_once('database.php');

// Get category ID
$showingID = filter_input(INPUT_POST, 'showingID');

//get all units
$query = 'SELECT * FROM units
                    ORDER BY unitID';
$statement1 = $db->prepare($query);
$statement1->execute();
$units = $statement1->fetchAll();
$statement1->closeCursor();

//get the showing
$query = 'SELECT * FROM showings
					WHERE showingID = :showingID';
$statement3 = $db->prepare($query);
$statement3->bindValue(':showingID', $showingID);
$statement3->execute();
$showing = $statement3->fetch();
$statement3->closeCursor();

//get unit information
$queryUnit = 'SELECT * FROM units
                  WHERE unitID = :unitID';
$statement2 = $db->prepare($queryUnit);	
$statement2->bindValue(':unitID', $showing['unitID']);
$statement2->execute();
$selectedUnit = $statement2->fetch();
$statement2->closeCursor();

//get all attendees
$query = 'SELECT * FROM showingattendees
					WHERE showingID = :showingID';
$statement4 = $db->prepare($query);
$statement4->bindValue(':showingID', $showingID);
$statement4->execute();
$showingAttendees = $statement4->fetchAll();
$statement4->closeCursor();
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

<h1><?php echo $selectedUnit['address'] ?></h1>
<h2>Date: <?php echo $showing['date'] ?></h2>
<h2>Time: <?php echo $showing['time'] ?></h2>

	<table>
		<caption>Attendees</caption>
		<tr>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Email</th>
		</tr>
		
		<!-- display a list of units -->
       
		<?php foreach ($showingAttendees as $attendee ) : ?>
			<tr>
				<td class="middle"><?php echo $attendee['firstName']." ".$attendee['middleInitial']." ".$attendee['lastName']  ?></td>
				<td class="middle"><?php echo $attendee['phoneNumber'] ?></td>
				<td class="middle"><?php echo $attendee['email'] ?></td>
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