package main

import (
	"fmt"
)

func main() {
	fmt.Println("Reclaiming Our Streets")

	// Define the variables for our street
	streetLength := 1000 // Length of the street in meters
	streetWidth := 4     // Width of the street in meters

	// Set up the pedestrians
	pedestrianCount := 100 // Number of pedestrians on the street
	pedestrianSpeed := 4   // Speed of the pedestrians (in meters per second)

	// Set up the cars
	carCount := 40       // Number of cars on the street
	carSpeed := 10       // Speed of the cars (in meters per second)
	trafficJamThreshold := 5 // Number of cars to form a traffic jam

	// Set up the street lighting
	streetLightFrequency := 5 // Street lights placed every 5 meters

	// Set up environmental factors
	pollutionLevel := 10 // Average pollution level of the street

	// Set up traffic control
	trafficControl := "stop_sign" // Type of traffic control for the street

	// Set up the pedestrians
	for i := 0; i < pedestrianCount; i++ {
		fmt.Println("Pedestrian", i, "travels", pedestrianSpeed, "meters per second")
	}

	// Set up the cars
	carPosition := 0
	trafficJam := false

	for i := 0; i < carCount; i++ {
		// Calculate the position of the car
		carPosition += carSpeed

		fmt.Println("Car", i, "travels", carSpeed, "meters per second to position", carPosition)

		// Check if we have a traffic jam
		if carPosition >= trafficJamThreshold {
			trafficJam = true
			fmt.Println("Traffic jam detected!")
			break
		}
	}

	// Set up the street lighting
	for i := 0; i < streetLength; i += streetLightFrequency {
		fmt.Println("Displaying street light at", i, "meters")
	}

	// Display the pollution level
	fmt.Println("Average pollution level of the street:", pollutionLevel)

	// Display the type of traffic control
	fmt.Println("Type of traffic control for the street:", trafficControl)

	// Display a summary of the street
	fmt.Println("Summary: The street is", streetLength, "meters long and", streetWidth, "meters wide with", pedestrianCount,
		"pedestrians and", carCount, "cars. There is", streetLightFrequency, "meters of distance between street lights and the average pollution level is", pollutionLevel, ".")

	// Output the conclusion
	if trafficJam {
		fmt.Println("Conclusion: There is a traffic jam on the street")
	} else {
		fmt.Println("Conclusion: There is no traffic jam on the street")
	}
}