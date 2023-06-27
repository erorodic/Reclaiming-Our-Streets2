// Imports
import kotlin.io.*

// Main function
fun main(args: Array<String>) {
    
    // Variables to be used
    val message = "Reclaiming Our Streets"
    var streetIsClean: Boolean
    var homelessnessSolved: Boolean
    
    // Print message of what the goal is
    println("Let's " + message + "!")
    
    // Establish a plan to execute
    streetIsClean = cleanStreets() 
    homelessnessSolved = solveHomelessness()
    
    // Execute plan
    if (streetIsClean && homelessnessSolved) {
        println("Our streets are reclaiming!")
    } else { 
        println("We still have work to do!")
    }
}

// Clean streets function
fun cleanStreets(): Boolean {
    println("Let's start cleaning the streets.")
    // Code here to clean the streets
    return true 
}

// Solve homelessness function
fun solveHomelessness(): Boolean {
    println("Let's start solving homelessness.")
    // Code here to solve homelessness
    return true
}