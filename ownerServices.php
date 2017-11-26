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
	<div class="gallery">
		<a href="propertyList.php">
		<h2 class="pictureLabels">Property List</h2>
	</div>
	
	<div class="gallery">
		<a href="showingList.php">
		<h2 class="pictureLabels">Showings</h2>
	</div>
	
	<div class="gallery">
		<a href="applicantList.php">
		<h2 class="pictureLabels">Review Applicants</h2>
	</div>
	
</main>

<!-- 	<div style="clear: both;"> </div> -->
</main>

<footer>
	<?php include_once('footer.php')?>
</footer>
</body>
</html>