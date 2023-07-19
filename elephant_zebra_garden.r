# Start of 'Reclaiming Our Streets' Code

#Defining Variables 

street_width <- 10 #Width of street in meters
street_length <- 40 #Length of street in meters
street_area <- street_length*street_width #Area of street in square meters

#Creating Street Objects 

class_street <- class("street")
attributes(class_street) <- c("width", "length", "area")

#Defining Street's Functions

#Function that returns the width of a street 
getWidth <- function(street){
  return(street$width)
}

#Function that returns the length of a street 
getLength <- function(street){
  return(street$length)
}

#Function that returns the area of a street 
getArea <- function(street){
  return(street$area)
}

#Function that sets the width of a street
setWidth <- function(street, width){
  street$width <- width
}

#Function that sets the length of a street
setLength <- function(street, length){
  street$length <- length
}

#Function that sets the area of a street
setArea <- function(street, area){
  street$area <- area
}

#Function that clears the street of all objects 
cleanup <- function(street){
  street$objects <- c()
}

#Defining Street's Properties

#Creating street object 
street <- new("street")

#Setting the width, length and area of the street
street$width <- street_width
street$length <- street_length
street$area <- street_area

#Creating an objects array to store street objects 
street$objects <- c()

#Defining Class of Street Objects

class_street_object <- class("street_object")
attributes(class_street_object) <- c("name", "color", "width", "height")

#Defining Street Object's Functions

#Function that returns the name of a street object
getName <- function(street_object){
  return(street_object$name)
}

#Function that returns the color of a street object
getColor <- function(street_object){
  return(street_object$color)
}

#Function that returns the width of a street object
getWidth <- function(street_object){
  return(street_object$width)
}

#Function that returns the height of a street object
getHeight <- function(street_object){
  return(street_object$height)
}

#Function that sets the name of a street object
setName <- function(street_object, name){
  street_object$name <- name
}

#Function that sets the color of a street object
setColor <- function(street_object, color){
  street_object$color <- color
}

#Function that sets the width of a street object
setWidth <- function(street_object, width){
  street_object$width <- width
}

#Function that sets the height of a street object
setHeight <- function(street_object, height){
  street_object$height <- height
}

#Function to add street objects to the street
addStreetObject <- function(street, street_object){
  street$objects <- c(street$objects, street_object)
}

#Creating Street Objects 

#Creating Bench object 
newBench <- new("street_object")

#Setting the name, color, width and height of the bench
newBench$name <- "bench"
newBench$color <- "brown"
newBench$width <- 2
newBench$height <- 0.6

#Adding the bench to the street 
addStreetObject(street, newBench)

#Creating Trash Can object 
newTrashCan <- new("street_object")

#Setting the name, color, width and height of the trash can
newTrashCan$name <- "trashcan"
newTrashCan$color <- "green"
newTrashCan$width <- 0.5
newTrashCan$height <- 1

#Adding the trash can to the street 
addStreetObject(street, newTrashCan)

#Creating Bumper object 
newBumper <- new("street_object")

#Setting the name, color, width and height of the bumper
newBumper$name <- "bumper"
newBumper$color <- "black"
newBumper$width <- 0.25
newBumper$height <- 0.25

#Adding the bumper to the street 
addStreetObject(street, newBumper)

#Reclaiming Our Streets

#Creating Reclaim Our Streets Object 
reclaim_streets <- function(street){
  street$clean <- TRUE
  street$objects <- c()
  
  print("The street has been reclaimed!")
}

#Calling Reclaim Our Streets object 
reclaim_streets(street)

#End of 'Reclaiming Our Streets' Code