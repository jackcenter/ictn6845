<?php
//connect to database
require_once('database.php');

//get the available unit information
$available = 1;

$queryUnit = 'SELECT * FROM units
                  WHERE available = :available';
$statement1 = $db->prepare($queryUnit);
$statement1->bindValue(':available', $available);
$statement1->execute();
$unit = $statement1->fetch();
$address = $unit['address'];
$statement1->closeCursor();

//get all available units
$query = 'SELECT * FROM units
					WHERE advertised = 1
                    ORDER BY rentAmount';
$statement2 = $db->prepare($query);
$statement2->execute();
$units = $statement2->fetchAll();
$statement2->closeCursor(); 
?>

<!doctype html>
<html>
<head>
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
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
	<?php foreach ($units as $unit) : ?>
	<div class="gallery">
		<a href="rentalInformation.php.?unitID=<?php echo $unit['unitID']; ?>">
			<h3 class="pictureLabels">
				<?php echo $unit['address']; ?>
			</h3>
		</a>
	</div>	
	<?php endforeach; ?>
	
</main>


<footer>
	<?php include_once('footer.php')?>
</footer>

</div>
</body>
</html>