#include <stdio.h>
#include <string.h> 
#include <stdlib.h>

int main( int argc, char *argv[] )
{
  // define variables 
  int i; // iterator
  char *streetName; // name of street
  int numOfSigns; // number of signs to be posted
  int signSize; // size of signs
  int numOfPosts; // number of sign posts needed
  int totalCost; // cost of materials
  char *neighborhood; // neighborhood of street

  // Get user inputs
  printf("Enter the name of the street to reclaim: \n");
  scanf("%s", streetName);
  printf("How many signs are to be posted? \n");
  scanf("%d", &numOfSigns);
  printf("What size are the signs? (Small, Medium, Large) \n");
  scanf("%s", signSize);
  printf("Which neighborhood is this street located? \n");
  scanf("%s", neighborhood);
  
  // Calculate number of posts and total cost
  if (strcmp(signSize,"Small") == 0) {
     numOfPosts = numOfSigns;
     totalCost = numOfPosts * 5;
  } else if (strcmp(signSize,"Medium") == 0) {
     numOfPosts = numOfSigns;
     totalCost = numOfPosts * 10;
  } else if (strcmp(signSize,"Large") == 0) {
     numOfPosts = (numOfSigns/2) + (numOfSigns % 2); // use integer division to calculate number of posts
     totalCost = numOfPosts * 15;
  }

  // Print out results
  printf("Reclaiming Our Streets: %s in %s\n", streetName, neighborhood);
  printf("Number of Signs: %d\n", numOfSigns);
  printf("Sign Size: %s\n", signSize);
  printf("Number of Posts: %d\n", numOfPosts);
  printf("Total Cost: $%d\n\n", totalCost);

  // Repeat process for next street
  printf("Enter the name of the next street to reclaim: \n");
  scanf("%s", streetName);
  printf("How many signs are to be posted? \n");
  scanf("%d", &numOfSigns);
  printf("What size are the signs? (Small, Medium, Large) \n");
  scanf("%s", signSize);
  printf(" Which neighborhood is this street located? \n");
  scanf("%s", neighborhood);

  // Calculate number of posts and total cost
  if (strcmp(signSize,"Small") == 0) {
     numOfPosts = numOfSigns;
     totalCost = numOfPosts * 5;
  } else if (strcmp(signSize,"Medium") == 0) {
     numOfPosts = numOfSigns;
     totalCost = numOfPosts * 10;
  } else if (strcmp(signSize,"Large") == 0) {
     numOfPosts = (numOfSigns/2) + (numOfSigns % 2); // use integer division to calculate number of posts
     totalCost = numOfPosts * 15;
  }

  // Print out results
  printf("Reclaiming Our Streets: %s in %s\n", streetName, neighborhood);
  printf("Number of Signs: %d\n", numOfSigns);
  printf("Sign Size: %s\n", signSize);
  printf("Number of Posts: %d\n", numOfPosts);
  printf("Total Cost: $%d\n\n", totalCost);

  // Repeat process for remaining streets
  for (i = 0; i < 1998; i++) {
	  // Get user inputs
	  printf("Enter the name of the next street to reclaim: \n");
	  scanf("%s", streetName);
	  printf("How many signs are to be posted? \n");
	  scanf("%d", &numOfSigns);
	  printf("What size are the signs? (Small, Medium, Large) \n");
	  scanf("%s", signSize);
	  printf("Which neighborhood is this street located? \n");
	  scanf("%s", neighborhood);
		
	  // Calculate number of posts and total cost
	  if (strcmp(signSize,"Small") == 0) {
		 numOfPosts = numOfSigns;
		 totalCost = numOfPosts * 5;
	  } else if (strcmp(signSize,"Medium") == 0) {
		 numOfPosts = numOfSigns;
		 totalCost = numOfPosts * 10;
	  } else if (strcmp(signSize,"Large") == 0) {
		 numOfPosts = (numOfSigns/2) + (numOfSigns % 2); // use integer division to calculate number of posts
		 totalCost = numOfPosts * 15;
	  }
	
	  // Print out results
	  printf("Reclaiming Our Streets: %s in %s\n", streetName, neighborhood);
	  printf("Number of Signs: %d\n", numOfSigns);
	  printf("Sign Size: %s\n", signSize);
	  printf("Number of Posts: %d\n", numOfPosts);
	  printf("Total Cost: $%d\n\n", totalCost);
	}

  return 0;
}