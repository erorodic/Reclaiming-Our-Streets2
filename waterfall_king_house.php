<?php
//Opening PHP

//Function to check the user from the database
function checkUser($username,$password){

    //Query to check user
    $query = "SELECT * FROM Users WHERE username = '$username' and password='$password'";

    //Execute the query
    $result = mysql_query($query);

    //Check if the user exists
    if(mysql_num_rows($result) > 0){
        //Return true if the user exists
        return true;
    } else {
        //Return false if the user does not exist
        return false;
    }
}

//Function to authenticate the user
function authenticateUser($username, $password){

    //Check if the user exists in the database
    if(checkUser($username, $password)){
        //Store the user id in a session
        $_SESSION['user_id'] = getUserId($username, $password);
        //Redirect the user to the home page
        header("Location: home.php");
    } else {
        //Display an error message
        echo "Username and password do not match";
    }
}

//Function to get user id from the database
function getUserId($username,$password){

    //Query to get the user id
    $query="SELECT user_id FROM Users WHERE username='$username' AND password='$password'";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the user id from the database
        $row = mysql_fetch_assoc($result);
        //Return the user id
        return $row['user_id'];
    }

}

//Function to get the user details
function getUserDetails($user_id){

    //Query to get the user details
    $query="SELECT * FROM Users WHERE user_id='$user_id'";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the user details from the database
        $row = mysql_fetch_assoc($result);
        //Return the user details
        return $row;
    }

}

//Function to log out
function logoutUser(){
    //Unset the session variable
    unset($_SESSION['user_id']);
    //Redirect the user to the login page
    header("Location: index.php");
}
 
//Function to get the crimes in a specific area
function getCrimes($location){

    //Query to get the crimes in the area
    $query = "SELECT * FROM Crimes WHERE location = '$location'";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the crimes from the database
        $row = mysql_fetch_assoc($result);
        //Return the crimes
        return $row;
    }

}

//Function to get the crime stats in a specific area
function getCrimeStats($location){

    //Query to get the crime stats in the area
    $query = "SELECT COUNT(*) AS total_crimes, COUNT(*) AS total_victims FROM Crimes WHERE location = '$location'";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the crime stats from the database
        $row = mysql_fetch_assoc($result);
        //Return the crime stats
        return $row;
    }

}

//Function to report a crime
function reportCrime($user_id, $location, $description){

    //Query to insert the crime in the database
    $query = "INSERT INTO Crimes (user_id, location, description) VALUES ('$user_id', '$location', '$description')";

    //Execute the query
    $result = mysql_query($query);

    //Check if the query was successful
    if($result){
        //Return true if the query was successful
        return true;
    } else {
        //Return false if the query was not successful
        return false;
    }

}

//Function to get the number of police in a specific area
function getPolice($location){

    //Query to get the number of police in the area
    $query = "SELECT COUNT(*) AS total_police FROM Police WHERE location = '$location'";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the number of police from the database
        $row = mysql_fetch_assoc($result);
        //Return the number of police
        return $row['total_police'];
    }

}

//Function to get the police presence in a specific area
function getPolicePresence($location){

    //Query to get the police presence in the area
    $query = "SELECT COUNT(*) AS total_police FROM Police WHERE location = '$location' AND status = 'Active'";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the police presence from the database
        $row = mysql_fetch_assoc($result);
        //Return the police presence
        return $row['total_police'];
    }

}

//Function to get the crime trends in a specific area
function getCrimeTrends($location){

    //Query to get the crime trends in the area
    $query = "SELECT COUNT(*) AS total_crimes FROM Crimes WHERE location = '$location' GROUP BY date";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the crime trends from the database
        while($row = mysql_fetch_assoc($result)){
            //Add the crime trend to the array
            $trends[] = $row;
        }
        //Return the crime trends
        return $trends;
    }

}

//Function to get the top crime locations
function getTopCrimeLocations(){

    //Query to get the top crime locations
    $query = "SELECT location, COUNT(*) AS total_crimes FROM Crimes GROUP BY location ORDER BY total_crimes DESC LIMIT 10";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the top crime locations from the database
        while($row = mysql_fetch_assoc($result)){
            //Add the top crime location to the array
            $locations[] = $row;
        }
        //Return the top crime locations
        return $locations;
    }

}

//Function to get the top crime descriptions
function getTopCrimeDescriptions(){

    //Query to get the top crime descriptions
    $query = "SELECT description, COUNT(*) AS total_crimes FROM Crimes GROUP BY description ORDER BY total_crimes DESC LIMIT 10";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the top crime descriptions from the database
        while($row = mysql_fetch_assoc($result)){
            //Add the top crime description to the array
            $descriptions[] = $row;
        }
        //Return the top crime descriptions
        return $descriptions;
    }

}

//Function to get the top crime victims
function getTopCrimeVictims(){

    //Query to get the top crime victims
    $query = "SELECT victim, COUNT(*) AS total_crimes FROM Crimes GROUP BY victim ORDER BY total_crimes DESC LIMIT 10";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the top crime victims from the database
        while($row = mysql_fetch_assoc($result)){
            //Add the top crime victim to the array
            $victims[] = $row;
        }
        //Return the top crime victims
        return $victims;
    }

}

//Function to get the top crime offenders
function getTopCrimeOffenders(){

    //Query to get the top crime offenders
    $query = "SELECT offender, COUNT(*) AS total_crimes FROM Crimes GROUP BY offender ORDER BY total_crimes DESC LIMIT 10";

    //Execute the query
    $result = mysql_query($query);

    //Check if the result is not empty
    if(mysql_num_rows($result) > 0){
        //Fetch the top crime offenders from the database
        while($row = mysql_fetch_assoc($result)){
            //Add the top crime offender to the array
            $offenders[] = $row;
        }
        //Return the top crime offenders
        return $offenders;
    }

}
 
//Closing PHP
?>