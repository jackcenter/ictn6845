<?php
//get the unit information
require_once('database.php');


//get unit information
/* $queryUnit = 'SELECT * FROM units
                  WHERE unitID = :unitID';
$statement1 = $db->prepare($queryUnit);	
$statement1->bindValue(':unitID', $unitID);
$statement1->execute();
$unit = $statement1->fetch();
$statement1->closeCursor(); */
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
	<h1>Thank You</h1>
	<p>You're attendence for the showing has been submited</p>
</main>

<footer>
	<?php include_once('footer.php')?>
</footer>
</body>
</html>