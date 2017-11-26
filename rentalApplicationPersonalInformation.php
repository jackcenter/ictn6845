<?php
//pull unitID from the URL
$unitID = $_GET["unitID"];
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
	<h2>Apply</h2>

	<form action="addApplicant.php.?unitID=<?php echo $unitID;?>" method="post">
		<legend>Personal Information</legend>
		
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
				<td><label>Date of Birth</label></td>
				<td><input type="date" name="dateOfBirth"></td>
			</tr>
			
			<tr>
				<td>Phone Number (Primary)</td>
				<td><input type="tel" name="phoneNumberPrimary"></td>
			</tr>
			
			<tr>
				<td><label>Phone Number (Alternate)</td>
				<td><input type="tel" name="phoneNumberAlternate"></td>	
			</tr>
			
			<tr>
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>
		</table>
		<input type="submit" value="Submit">
	</form>
	
</main>

<div style="clear: both;"> </div>

<footer>
	Copyright &copy; 2017 ECU Web Technologies Inc<br>
	<a href="mailto:ecuwebtechinc@.ecu.edu">ecuwebtech.com</a>
</footer>

</div>

</body>
</html>