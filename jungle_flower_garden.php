<?php

// a public awareness campaign about the importance of reclaiming our streets

function reclaimOurStreets(){
	
	// declare variables to store data
	$strCampaignName = "Reclaiming Our Streets";
	$strCampaignDescription = "Raise awareness about the importance of reclaiming our streets for the benefit of our communities";
	$strImagePath = "/resources/img/reclaim_streets.png";
	$arrBenefits = array("Improve safety", "Encourage exercise", "Promote community involvement", "Enhance economic activity");
	
	// create an HTML page to promote the campaign
	echo "<!DOCTYPE html>
		  <html>
		  <head>
		  	<title>Reclaim Our Streets Campaign</title>
		  	<link rel='stylesheet' type='text/css' href='/resources/css/style.css'>
		  </head>
		  <body>
		  	<div class='container'>
		  		<h1>$strCampaignName</h1>
		  		<img src='$strImagePath' alt='Image of a street'>
		  		<p>$strCampaignDescription</p>
		  		<ol>";
		  			foreach ($arrBenefits as &$benefit) {
		  				echo "<li>$benefit</li>";
		  			}
	echo		"</ol>
		  	</div>
		  </body>
		  </html>";
	
	// contact local media sources to cover the campaign
	$strMediaEmail = "info@mediasite.com";
	$strCampaignSubject = "Raising Awareness About Our Streets";
	$strEmailBody = "We are launching a public awareness campaign about the importance of reclaiming our streets. 
	We would appreciate it if you could help us spread the word by covering it on your website/platform.
	Thank you for your time and attention.";
	mail($strMediaEmail, $strCampaignSubject, $strEmailBody);
	
	// reach out to local politicians 
	$strPoliticalEmail = "info@locality.gov";
	$strPoliticalSubject = "Reclaiming Our Streets";
	$strPoliticalBody = "We are launching a public awareness campaign about the importance of reclaiming our streets. 
	We believe this is an important issue for our local community and would appreciate your help and support.
	Thank you for your time and attention.";
	mail($strPoliticalEmail, $strPoliticalSubject, $strPoliticalBody);
	
	// post campaign details on social media
	$strFacebookPost = "We are launching a public awareness campaign about the importance of reclaiming our streets. 
	Help us spread the word and learn more here: www.reclaimstreets.org";
	$strTwitterPost = "Help us raise awareness about the importance of reclaiming our streets for the benefit of our communities #ReclaimOurStreets";
	
	// post to facebook
	$strFacebookResponse = postToFacebook($strFacebookPost);
	if($strFacebookResponse == "OK"){
		echo "Facebook post was successful";
	} else {
		echo "Facebook post failed";
	}
	
	// post to twitter
	$strTwitterResponse = postToTwitter($strTwitterPost);
	if($strTwitterResponse == "OK"){
		echo "Twitter post was successful";
	} else {
		echo "Twitter post failed";
	}
	
	// host an event to promote the campaign
	$strLocation = "Main Street";
	$dateEventDate = "10/20/2020";
	$timeStartTime = "9:00 AM";
	$timeEndTime = "12:00 PM";
	$strEventDetails = "Join us in Main Street on $dateEventDate from $timeStartTime to $timeEndTime to learn more about the importance of reclaiming our streets!";
	
	// send emails to invite people to the event
	$strEventEmail = "events@locality.org";
	$strEventSubject = "Reclaim Our Streets Event";
	$strEventEmailBody = "We are hosting an event to promote our Reclaim Our Streets Campaign.
	Details of the event are as follows:
	Location: $strLocation
	Date: $dateEventDate
	Start Time: $timeStartTime
	End Time: $timeEndTime
	
	We would appreciate it if you could join us.
	Thank you for your time and attention.
	";
	
	// send the emails
	mail($strEventEmail, $strEventSubject, $strEventEmailBody);
	
	// make flyers to promote the event
	$strFlyerPath = "/resources/img/reclaim_streets.png";
	$strFlyerText = "Join us on $dateEventDate from $timeStartTime to $timeEndTime in $strLocation
	to learn more about the importance of reclaiming our streets!";
	
	// distribute the flyers
	$intFlyersDistributed = distributeFlyers($strFlyerPath, $strFlyerText);
	if ($intFlyersDistributed > 0) {
		echo "Successfully distributed $intFlyersDistributed flyers";
	} else {
		echo "Failed to distribute flyers";
	}
	
	// measure the success of the campaign
	$arrMetrics = array("Web visits", "Social shares", "Flyers distributed", "Attendees at event");
	$arrMetricValues = array();
	
	// record metric values
	$arrMetricValues["Web visits"] = getWebVisits("www.reclaimstreets.org");
	$arrMetricValues["Social shares"] = getSocialShares("www.reclaimstreets.org");
	$arrMetricValues["Flyers distributed"] = $intFlyersDistributed;
	$arrMetricValues["Attendees at event"] = getAttendees("10/20/2020", $strLocation);
	
	// output metric values
	foreach ($arrMetrics as &$metric) {
		echo "$metric: " . $arrMetricValues[$metric] . "<br>";
	}
}

// functions to perform common tasks
function postToFacebook($strFacebookPost) {
	// code to post to facebook
	return "OK";
}

function postToTwitter($strTwitterPost) {
	// code to post to twitter
	return "OK";
}

function distributeFlyers($strFlyerPath, $strFlyerText) {
	// code to distribute flyers
	return 100;
}

function getWebVisits($strWebsiteURL) {
	// code to get web visits
	return 500;
}

function getSocialShares($strWebsiteURL) {
	// code to get social shares
	return 1000;
}

function getAttendees($dateEventDate, $strLocation) {
	// code to get attendees
	return 50;
}

// Run the main program 
reclaimOurStreets();

?>