<?php
//get the unit information
require_once('database.php');
session_start();

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
	<h2>Application Process and Qualification Standards</h2>

	<h3>Application</h3>
	<p>Each person over the age of 18 who will be living in the home must complete and submit a separate application and processing fee.  In order to qualify, each person must meet or exceed the minimum standards for qualification.  Incomplete applications will not be processed.  Applications containing false information will immediately be disqualified. Please expect 1-3 days for the application process. Processing the Application will include direct contact with employers, current landlord, previous landlords, friends, personal and professional references, law enforcement agencies, government agencies, consumer reporting agencies, public records, eviction records, and any other sources that may be deemed necessary. A consumer report will be used in the processing of all applications.  Should the Applicant be denied or face other adverse action based on information received in the consumer report, the Applicant has a right to obtain a free copy of the consumer report, and to dispute the accuracy of the information it contains by contacting: </p>
	
	<h3>Deposit to Hold</h3>
	<p>After approval, if tenant will not be taking occupancy within 24 hours, a non-refundable Deposit to Hold in the amount equal to one month’s rent will be required within 24 hours to hold the property until a mutually agreed upon move-in date.  The maximum amount of time a rental will be held is 14 days.  After all move-in requirements have been met and a lease for the property completed, the Deposit to Hold will transfer to the security deposit to be held throughout the tenant’s entire tenancy. If the Prospective Tenant fails to provide the Deposit to Hold within 24 hours of approval, the home will be offered to the next qualified applicant. Should the Applicant elect to pay the Deposit to Hold with their application (prior to processing), the Deposit to Hold will be refunded in full within 14 days if they fail to qualify.</p>
	
	<h3>Move-in Requirements</h3>
	<p>After approval and before occupancy will be granted, Prospective Tenant must supply all the required move-in funds, including the security deposit, first month’s rent, and any other additional deposits and fees, all tenant paid utilities must be transferred into Prospective Tenant’s name, and a lease must be executed and signed by all parties.</p>
	
	<h3>Qualification Standards</h3>
	<p>Applicants who do not meet minimum screening standards will not be approved. At the landlord’s discretion, compensating factors such as an additional security deposit or co-signer (guarantor) may be required for qualification if Applicant fails to meet any one of the above requirements. In the event of multiple applicants, tenancy will be granted to the most qualified, based on the above criteria.  </p>
	
	<form action="rentalApplicationPersonalInformation.php.?unitID=<?php echo $unitID;?>" method="post">
		<input type="checkbox" name="question1" value="question1"> Applicant must have current photo identification and a valid social security number.<br>
		
		<input type="checkbox" name="question2" value="question2"> Applicant's monthly household income must exceed three times the rent. All income must be from a verifiable source.  Unverifiable income will not be considered.<br>
		
		<input type="checkbox" name="question3" value="question3"> Applicants must receive positive references from all previous landlords for the previous 5 years.<br>
		
		<input type="checkbox" name="question4" value="question4"> Applicant may not have any evictions or unpaid judgments from previous landlords.<br>
		
		<input type="checkbox" name="question5" value="question5"> Applicant must exhibit a responsible financial life.  Credit score must be a minimum of 600.<br>
		
		<input type="checkbox" name="question6" value="question6"> A background check will be conducted on all applicants over 18.  Applicant’s background must exhibit a pattern of responsibility. <br>
		
		<input type="checkbox" name="question6" value="question6"> Applicant must be a non-smoker.<br>
		
		<input type="checkbox" name="question6" value="question6"> Occupancy is limited to 2 people per bedroom.<br>
		
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