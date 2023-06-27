<?php 

// Reclaiming Our Streets // 

//1. Registering Citizens for Crime Prevention 

// function to register citizens
function registerCitizens($name, $address, $idNumber) {
  $registeredCitizen = [
    'name' => $name,
    'address' => $address,
    'idNumber' => $idNumber
  ];
  return $registeredCitizen;
}

// call the function
$citizen = registerCitizens('John Doe', '123 Main Street', 'A12345');


//2. Creating an Alert System

// function to send an alert
function alertPolice ($alert) {
	$alertMessage = [
		'type' => 'emergency',
		'message' => $alert
	];

	return $alertMessage;
}

// call the function
$alert = alertPolice('Help! There is a robbery at 123 Main Street!'); 


//3. Adding a Security System

//function to add security cameras
function addSecurityCameras ($numCameras) {
	$securityCameras = [];
	for ($i = 0; $i < $numCameras; $i++) {
		$securityCameras[] = [
			'camera' => $i,
			'status' => 'active'
		];
	} 
	return $securityCameras;
}

// call the function
$cameras = addSecurityCameras(10);


//4. Upgrading Local Streets

//function to upgrade streets
function upgradeStreets($streetName, $streetCondition) {
	$upgradedStreets = [
		'street' => $streetName,
		'condition' => $streetCondition
	];
	return $upgradedStreets;
}

// call the function
$street = upgradeStreets('Main Street', 'good');


//5. Establishing Community Programs

//function to establish community programs
function establishPrograms($program, $details) {
	$programs = [
		'program' => $program,
		'details' => $details
	];
	return $programs;
}

// call the function
$program = establishPrograms('Youth Mentorship Initiative', 'Our program seeks to provide guidance and support to underserved youth in our community');


//6. Increasing Funding for Law Enforcement

//function to increase funding for law enforcement
function increaseFunding($funds) {
	$funding = [
		'funds' => $funds
	];
	return $funding;
}

// call the function
$funding = increaseFunding(10000);


//7. Upgrading Security Systems

// function to upgrade security systems
function upgradeSecuritySystems($systemName, $upgradeType) {
	$upgradeSecurity = [
		'system' => $systemName,
		'upgrade' => $upgradeType
	];
	return $upgradeSecurity;
}

// call the function
$upgrade = upgradeSecuritySystems('Surveillance Cameras', 'HD Cameras');


//8. Implementing a Neighborhood Watch

//function to implement a neighborhood watch 
function establishNeighborhoodWatch($neighborhood, $watchGroup) {
	$neighborhoodWatch = [
		'neighborhood' => $neighborhood,
		'watchGroup' => $watchGroup
	];
	return $neighborhoodWatch;
}

// call the function
$watch = establishNeighborhoodWatch('The Heights', 'The Heights Neighborhood Watch');


//9. Establishing Partnerships with Local Businesses

// function to establish partnerships
function establishPartnerships($business, $partnerName) {
	$partnerships = [
		'business' => $business,
		'partnerName' => $partnerName
	];
	return $partnerships;
}

// call the function
$partnership = establishPartnerships('The Local Cafe', 'John Doe'); 


//10. Empowering Citizens to Take Action

// function to empower citizens
function empowerCitizens($action, $resource) {
	$empowerment = [
		'action' => $action,
		'resource' => $resource
	];
	return $empowerment;
}

// call the function
$empowerment = empowerCitizens('Report Crime', 'Nationwide Crime Reporting Hotline');