<?php
//connect to database
require_once('database.php');

//get all applicants
$query = 'SELECT * FROM applicants
					INNER JOIN units
					ON applicants.unitID = units.unitID
					ORDER BY timeSubmitted';
$statement1 = $db->prepare($query);
$statement1->execute();
$applicants = $statement1->fetchAll();
$statement1->closeCursor(); 

//get all units
$query = 'SELECT * FROM units
                    ORDER BY unitID';
$statement1 = $db->prepare($query);
$statement1->execute();
$units = $statement1->fetchAll();
$statement1->closeCursor(); 
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
	<table>
		<tr>
			<th>Name</th>
			<th>Unit</th>
			<th>&nbsp;</th>
		</tr>
		
		<?php foreach ($applicants as $applicant) : ?>
		<tr>
			<td class="left"><?php echo $applicant['address'] ?></td>
			<td class="left"><?php echo $applicant['firstName']." ".$applicant['middleInitial']." ".$applicant['lastName'] ?></td>
			
			<td class="right"><form action="rentalApplicationCompleted.php" method="post">
				<input type="hidden" name="applicantID"
					   value="<?php echo $applicant['applicantID']; ?>">
				<input type="submit" value="View">
            </form></td>
			
			<td class="right"><form action="rejectApplicant.php" method="post">
				<input type="hidden" name="applicantID"
					   value="<?php echo $applicant['applicantID']; ?>">
				<input type="submit" value="Reject">
            </form></td>
			
			<td class="right"><form action="acceptApplicant.php" method="post">
				<input type="hidden" name="applicantID"
					   value="<?php echo $applicant['applicantID']; ?>">
				<input type="submit" value="Accept">
            </form></td>

			<!-- <td class="right"><?php echo $unit['rentAmount'] ?></td>
			<td class="right"><?php echo $unit['squareFeet'] ?></td>
			<td class="middle"><?php echo $unit['bedrooms'] ?></td>
			<td class="middle"><?php echo $unit['bathrooms'] ?></td>
			<td class="right"><a href="editPropertyForm.php.?unitID=<?php echo $unit['unitID']; ?>">edit</a></td> -->
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