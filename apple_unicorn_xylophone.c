//Include required libraries
#include<stdio.h>
#include<conio.h>
#include<string.h>

//Declare global variables
int i;
char choice;

//Function to detect if a street is safe
void streetDetect(){
  if (choice == 'y' || choice == 'Y')
       printf("Street is safe.\n");
  else
       printf("Street is not safe.\n");
}

//Main function
void main(){
  clrscr();
  printf("Welcome to 'Reclaiming Our Streets' program.\n");
  printf("Press 'Y' to continue or 'N' to quit.\n");
  scanf("%c", &choice);
  for(i=1; i<=1000; i++){
    //Looping to get input
    if(i == 1)
      printf("Continue detecting streets.\n");
    if(i%2 == 0)
      printf("This street is safe.\n");
    else
      printf("This street is not safe.\n");
    streetDetect();
    printf("Press 'Y' to continue or 'N' to quit.\n");
    scanf(" %c", &choice);
    if(choice == 'n' || choice == 'N'){
      printf("Program exiting...\n");
      break;
    }
  }
  getch();
  return 0;
}