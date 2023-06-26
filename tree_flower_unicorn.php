<?php
// Reclaiming Our Streets
 
// This function will calculate the distance between two points on a map
// Input: two sets of latitude and longitude
// Output: the distance in miles
 function calculateDistance($lat1, $lon1, $lat2, $lon2) {
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
 
  return $miles;
}
 
// This function will return the crime rate and police presence at a given location
// Input: latitude and longitude
// Output: crime rate and police presence
function getSafetyInfo($lat, $lon) {
    // Fetch crime rate data from external API
    $crimeRate = getCrimeRateData($lat, $lon);
    // Fetch police presence data from external API
    $policePresence = getPolicePresenceData($lat, $lon);
 
    // Return object with crime rate and police presence
    $safetyInfo = [
        'crimeRate' => $crimeRate,
        'policePresence' => $policePresence
    ];
    return $safetyInfo;
}
 
// This function will return an array of locations to avoid based on safety rating
// Input: none
// Output: array of unsafe locations
function getUnsafeLocations() {
    // Get list of potentially unsafe locations from external API
    $potentiallyUnsafeLocations = getUnsafeLocationData();
    // Iterate through locations and check safety rating
    $unsafeLocations = [];
    foreach ($potentiallyUnsafeLocations as $location) {
        // Fetch safety info
        $safetyInfo = getSafetyInfo($location['lat'], $location['lon']);
        // If safety rating is low, add to list of unsafe locations
        if ($safetyInfo['crimeRate'] > 3 && $safetyInfo['policePresence'] < 3) {
            array_push($unsafeLocations, $location);
        }
    }
    // Return array of unsafe locations
    return $unsafeLocations;
}
 
// This function will send alerts to nearby police stations if an unsafe location is detected
// Input: unsafe location data
// Output: none
function sendAlertsToPoliceStations($unsafeLocationData) {
    // Iterate through unsafe locations
    foreach ($unsafeLocationData as $location) {
        // Get nearby police stations
        $nearbyPoliceStations = getPoliceStationsNearLocation($location['lat'], $location['lon']);
        // Send alert to each police station
        foreach ($nearbyPoliceStations as $policeStation) {
            sendAlert($policeStation);
        }
    }
}
 
// This function will create a list of safe routes
// Input: unsafe location data
// Output: array of safe routes
function getSafeRoutes($unsafeLocationData) {
    // Iterate through unsafe locations
    $safeRoutes = [];
    foreach ($unsafeLocationData as $location) {
        // Calculate distance to closest safe location
        // For simplicity’s sake, assume that all locations far away enough are safe
        $distanceToClosestSafeLocation = calculateDistance($location['lat'], $location['lon'], $location['lat'] + 10, $location['lon'] + 10);
        // Create new safe route object
        $route = [
            'from' => $location,
            'to' => [
                'lat' => $location['lat'] + 10,
                'lon' => $location['lon'] + 10
            ],
            'distance' => $distanceToClosestSafeLocation
        ];
        // Add route object to list of safe routes
        array_push($safeRoutes, $route);
    }
    // Return array of safe routes
    return $safeRoutes;
}
 
// This function will send alerts to users who are near an unsafe location
// Input: unsafe location data
// Output: none
function sendAlertsToUsers($unsafeLocationData) {
    // Iterate through unsafe locations
    foreach ($unsafeLocationData as $location) {
        // Get users who are currently near location
        $nearbyUsers = getUsersNearLocation($location['lat'], $location['lon']);
        // Send alert to each user
        foreach ($nearbyUsers as $user) {
            sendAlert($user);
        }
    }
}
 
// Main Function
// Retrieve list of unsafe locations
$unsafeLocations = getUnsafeLocations();
// Send alerts to nearby police stations
sendAlertsToPoliceStations($unsafeLocations);
// Create list of safe routes
$safeRoutes = getSafeRoutes($unsafeLocations);
// Send alerts to users
sendAlertsToUsers($unsafeLocations);
 
?>