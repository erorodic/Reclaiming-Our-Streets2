// Create the function to run the game
function ReclaimingOurStreets(){

// Declare the variables 
let playerHealth = 100;
let zombieHealth = 100;
let playerName;
let zombieName;
let weapon;
let weaponDamage;
let gameOver;
let zombiesKilled = 0;

// Ask user for their name and store it
playerName = prompt("What is your name?");

// Create a loop to keep the game running until the player's character dies
while(gameOver !== true){

// Ask the user to enter a weapon
weapon = prompt("What weapon do you want to use? You can choose between a knife, a gun or a sword.");

// Set the damage for each weapon

if (weapon === "knife"){
    weaponDamage = 10
    } else if (weapon === "gun"){
    weaponDamage = 20
    } else if (weapon === "sword"){
    weaponDamage = 30
    }

// Reduce zombie's health
zombieHealth -= weaponDamage;

// Generate a random name for the zombie
let zombieNames = ["Creepy Carl", "Billy Bob", "Bloody Carl", "Zombie Jack", "Killer King"];
zombieName = zombieNames[Math.floor(Math.random()*zombieNames.length)];

// Use a conditional to check to see if the zombie is dead
if (zombieHealth <= 0){
    zombiesKilled ++;
    alert(`${zombieName} has been killed! You have killed ${zombiesKilled} zombies.`);
    zombieHealth = 100;
    } else {
    alert(`You hit ${zombieName} with your ${weapon}. Their health is now ${zombieHealth}`);
    }

// Reduce the player's health
let randomNum = Math.floor(Math.random()*20);
playerHealth = playerHealth - randomNum;

// Use a conditional to check to see if the player is dead 
if (playerHealth <= 0){
    alert(`Game over! You have been killed! You have killed ${zombiesKilled} zombies.`);
    gameOver = true;
    } else {
    alert(`${zombieName} attacked you and did ${randomNum} damage. Your health is now ${playerHealth}.`);
    }
  }
}

// Call the function to start the game
ReclaimingOurStreets();