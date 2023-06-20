import java.util.*; 

public class ReclaimOurStreets {
	
	// instance variables 
	private ArrayList<String> causes; 
	private String missionStatement; 

	// constructor 
	public ReclaimOurStreets(String mission) {
		causes = new ArrayList<String>(); 
		missionStatement = mission; 
	}

	// add new causes to list 
	public void addCause(String cause) {
		causes.add(cause); 
	}

	// remove cause from list 
	public void removeCause(String cause) {
		causes.remove(cause); 
	}

	// get list of causes 
	public ArrayList<String> getCauses() {
		return causes; 
	}
	
	// get mission statement 
	public String getMissionStatement() {
		return missionStatement; 
	}

	// set mission statement 
	public void setMissionStatement(String mission) {
		missionStatement = mission; 
	}

	// display list of causes 
	public void displayCauses() {
		System.out.println("List of causes we are currently working on:"); 
		for (String cause : causes) {
			System.out.println("- " + cause); 
		}
	}

	// print mission statement 
	public void printMissionStatement() {
		System.out.println("Our mission: " + missionStatement); 
	}
	
	// main method 
	public static void main(String[] args) {
		// create instance of Reclaim Our Streets 
		ReclaimOurStreets reclaimOurStreets = 
			new ReclaimOurStreets("To make our streets safer and more inclusive for people of all ages and backgrounds");
		
		// add causes 
		reclaimOurStreets.addCause("Reduce crime"); 
		reclaimOurStreets.addCause("Improve pedestrian safety"); 
		reclaimOurStreets.addCause("Increase public transportation access"); 
		reclaimOurStreets.addCause("Support small businesses"); 
		
		// display list of causes 
		reclaimOurStreets.displayCauses(); 
		
		// print mission statement 
		reclaimOurStreets.printMissionStatement(); 
	}

}