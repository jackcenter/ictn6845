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
	<h1>Add a New Property</h1>
</header>

<main>
	<form action="addProperty.php" method="post">
		<table>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address"></td>
			</tr>
			
			<tr>
				<td>Date Available</td>
				<td><input type="date" name="dateAvailable"></td>
			</tr>
			
			<tr>
				<td>Advertise</td>
				<td><input type="int" name="advertised"></td>
			</tr>
			
			<tr>
				<td>Rent Amount</td>
				<td><input type="text" name="rentAmount"></td>
			</tr>
			
			<tr>
				<td>Square Feet</td>
				<td><input type="text" name="squareFeet"></td>
			</tr>
			
			<tr>
				<td>Bedrooms</td>
				<td><input type="text" name="bedrooms"></td>	
			</tr>
			
			<tr>
				<td>Bathrooms</td>
				<td><input type="text" name="bathrooms"></td>		
			</tr>
		</table>
		<input type="submit" value="Add Unit">	
	</form>
</main>

<footer>
	<?php include_once('footer.php')?>
</footer>
</body>
</html>