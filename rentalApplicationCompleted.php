<?php
//get applicantID from the form
$applicantID= filter_input(INPUT_POST, 'applicantID', FILTER_VALIDATE_INT);

//connect ot the database
require_once('database.php');

//get applicant information
$query = 'SELECT * FROM applicants
					INNER JOIN units
					ON applicants.unitID = units.unitID
					WHERE applicantID = :applicantID';
$statement1 = $db->prepare($query);
$statement1->bindValue(':applicantID', $applicantID);
$statement1->execute();
$applicant = $statement1->fetch();
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
	<h1>Rental Application</h1>
	<p>Address applying for: <?php echo $applicant['address']; ?> <br>
	Desired move in date: <?php echo $applicant['applicantID']; ?> </p>
	
	<p><strong>Important Note to Applicants:</strong> Please fill this application out in full. Incomplete applications will be sent back to you to complete, causing a delay in the process and decreasing your chances of renting from us.</p>
	
	<h2>Personal Information</h2>
	<p>Name (first MI last): <?php echo $applicant['firstName']." ".$applicant['middleInitial'].". ".$applicant['lastName']; ?><br>
	Date of Birth (yyyy-mm-dd): <?php echo $applicant['dateOfBirth']; ?> <br>
	Primary Phone: <?php echo $applicant['phoneNumberPrimary']; ?>  Alternate Phone: <?php echo $applicant['phoneNumberAlternate']; ?>  email: <?php echo $applicant['email']; ?> <br>
	</p>
	
	<h2>Rental History</h2>
	
	<h2>Employment Information</h2>

	<h2>Questionnaire</h2>
	
	<h2>Additional Information</h2>
	
	<p>Please read carefully and sign and date below if you agree. Applicant certifies that the information contained in this application is true and correct.  Applicant understands that false or misleading information is grounds for immediate disqualification. Applicant shall pay to the Landlord a nonrefundable fee to accompany this application to cover the Landlord’s administrative costs and expense to verify the information submitted by the Applicant.</p>
	
	<h3>Authorization</h3>
	
	<p>Applicant authorizes the Landlord or Landlord’s representatives to make any inquires deemed necessary to verify Applicant is the most qualified based on the below stated qualification standards. This verification includes, but is not limited to, direct contact with Applicant’s employers, current landlord, previous landlords, friends, personal and professional references, law enforcement agencies, government agencies, consumer reporting agencies, public records, eviction records, and any other sources of information which the Landlord or Landlord’s representative may deem necessary. Applicant verifies that the Landlord and Landlord’s representatives shall not be held liable for damages of any kind that result from the verification of the information provided. This authorization shall extend through Applicant’s tenancy to ensure continued compliance to the terms of tenancy or to recover any financial obligations relating to Applicant’s tenancy, and beyond the expiration of Applicant’s tenancy for recovery of any financial obligations, or for any other acceptable purpose. Should the Applicant be denied or face other adverse action based on information received in a consumer report, the Applicant has a right to obtain a free copy of the consumer report, and to dispute the accuracy of the information it contains by contacting the Consumer Reporting Agency: <br>
	Address:_____________________ Phone:______________
	</p>
	
	<h3>Holding Fee</h3>
	
	<p>Upon the verbal or written approval of the Applicant’s tenancy, if tenant will not be taking occupancy immediately, a Deposit to Hold Agreement will be executed and signed by all parties and a <strong>non-refundable</strong> holding fee shall be required within 24 hours, hereinafter referred to as “Deposit to Hold” in the amount equal to one month’s rent to hold the property until a mutually agreed upon move-in date.  Applicant understands that no rental will be held for more than 14 days. The Deposit to Hold removes the property from public offering and holds the home exclusively for the Applicant until all other requirements have been met.  After all requirements have been met and a lease for the property completed, the Deposit to Hold will transfer to the security deposit to be held throughout the tenant’s entire tenancy. If the Applicant fails to provide the Deposit to Hold within 24 hours of approval, the Applicant may be disqualified and the home will be offered to the next qualified applicant. After approval and before occupancy will be granted, Applicant must supply all the required move-in funds, including the security deposit, first month’s rent, and any other additional deposits and fees, all tenant paid utilities must be transferred into Applicant’s name, and a lease must be executed and signed by all parties. If for any reason, the Applicant fails to complete all move-in requirements the landlord will return the property to public offering and the entire Deposit to Hold will be forfeited to the Landlord for expenses including, but not limited to, lost rent, holding costs, advertising costs, and marketing costs. </p>
	
	<h3>Qualification Standards</h3>
	
	<p>Your Application will be denied if you do not meet the below standards for qualification.</p>
	
	<ul>
		<li>Applicant must have current photo identification and a valid social security number.</li>
		<li>Applicant's monthly household income must exceed three times the rent. All income must be from a verifiable source.  Unverifiable income will not be considered.</li>
		<li>Applicants must receive positive references from all previous landlords for the previous 5 years.</li>
		<li>Applicant may not have any evictions or unpaid judgments from previous landlords.</li>
		<li>Applicant must exhibit a responsible financial life.  Credit score must be a minimum of 600.</li>
		<li>A background check will be conducted on all applicants over 18.  Applicant’s background must exhibit a pattern of responsibility.</li>
		<li>Applicant must be a non-smoker.</li>
		<li>Occupancy is limited to 2 people per bedroom.</li>
	</ul>
	
	<p>At landlord’s discretion, compensating factors such as an additional security deposit or co-signer (guarantor) may be required for qualification if Applicant fails to meet any one of the above requirements. In the event of multiple applicants, tenancy will be granted to the most qualified, based on the above criteria.</p>
	
	<p><strong>Applicant authorizes release of all information to Landlord and agrees that the information provided in this rental application is true and correct. This authorization extends beyond the end of Applicant’s tenancy.<br>
	Applicant's Signature:_____________________ Date:______________</strong>
	</p>
	
	
</main>

<div style="clear: both;"> </div>

<footer>
	<?php include_once('footer.php')?>
</footer>

</div>

</body>
</html>