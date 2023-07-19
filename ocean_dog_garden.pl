#!/usr/bin/perl 

#Reclaiming Our Streets

#Create a database of community contacts

use DBI; 

# create a database handle 
my $dbh = DBI->connect( "dbi:mysql:Reclaiming_Our_Streets_DB", 
                    "username", 
                    "password"
                    ) or die "Error: Connection failed: $DBI::errstr\n";
 
# create a table of community contacts 
my $sth = $dbh->prepare("CREATE TABLE Contacts 
                         (Name VARCHAR(255), 
                          Number INT, 
                          Email VARCHAR(255), 
                          Address VARCHAR(255), 
                          Notes VARCHAR(255))"); 

$sth->execute()
or die "SQL Error: $DBI::errstr\n";

# add data to the contacts table 
my $insert = $dbh->prepare("INSERT INTO Contacts 
                            VALUES ('John Doe', 
                                    '(630)-555-1234', 
                                    'jdoe@example.com', 
                                    '123 Main St, City, State, ZIP', 
                                    'Good contact for civic engagement')"); 

$insert->execute() 
or die "SQL Error: $DBI::errstr\n"; 

# store contact data for later use 
my $records = $dbh->prepare("SELECT * FROM Contacts");
$records->execute();

# loop through each row 
while (my $row = $records->fetchrow_hashref) {
 print "$row->{Name}\t$row->{Number}\t$row->{Email}\t$row->{Address}\t$row->{Notes}\n"; 
}

# close the database connection
$dbh -> disconnect();

################################################################################

#Create an email list

use Email::Simple; 

# setup an email list object 
my $email_list = new Email::Simple;

# add contacts to the email list 
my $records = $dbh->prepare("SELECT Email FROM Contacts"); 
$records->execute();

while (my $row = $records->fetchrow_hashref) { 
    $email_list->add_recipient($row->{Email}); 
} 

# send an email message 
$email_list->subject("Reclaiming Our Streets"); 
$email_list->text_body("We are organizing an event to reclaim our streets from crime and violence. We need your help to spread the word! Please join us on Saturday, July 1st. 

For more information, please visit http://example.com for updates. 

Thank you!");

$email_list->send();

################################################################################

#Organizing a protest

# setup a database table for protest sign-ups 
my $sth = $dbh->prepare("CREATE TABLE Protest 
                         (Name VARCHAR(255), 
                          Phone INT, 
                          Email VARCHAR(255), 
                          Message VARCHAR(255))"); 

$sth->execute()
or die "SQL Error: $DBI::errstr\n";

# post a sign-up form on the website
print "
<form method='POST' action='/protest_signup'> 
Name: <input type='text' name='name'><br> 
Phone: <input type='text' name='phone'><br> 
Email: <input type='text' name='email'><br> 
Message: <input type='text' name='message'><br> 
<input type='submit' value='Sign Up'> 
</form>"

# capture the sign-up form data 
my $name = $query->param('name'); 
my $phone = $query->param('phone'); 
my $email = $query->param('email'); 
my $message = $query->param('message');

# insert the sign-up data into the databases
my $sth = $dbh->prepare("INSERT INTO Protest 
          VALUES ('$name', '$phone', '$email', '$message')"); 

$sth->execute() 
or die "SQL Error: $DBI::errstr\n"; 

###############################################################################

#Spread the word about the protest

# create an email list 
my $email_list = new Email::Simple;

# add contacts to the email list 
my $records = $dbh->prepare("SELECT Email FROM Contacts"); 
$records->execute();

while (my $row = $records->fetchrow_hashref) { 
    $email_list->add_recipient($row->{Email}); 
} 

# send an email message 
$email_list->subject("Join Us at Our Protest"); 
$email_list->text_body("We are organizing a protest to reclaim our streets from crime and violence. We need your help to spread the word! Please join us on Saturday, July 1st at noon. 

For more information, please visit http://example.com for updates. 

Thank you!");

$email_list->send();

###############################################################################

#Make signs for the protest

# import the graphics module 
use Image::Magick; 

# create a background image 
my $background = new Image::Magick; 
$background->Read("background.png"); 

# create a font object 
my $text = new Image::Magick; 
$text->Set(pointsize => 20); 

# loop through the database table 
my $records = $dbh->prepare("SELECT Name, Message FROM Protest"); 
$records->execute();

while (my $row = $records->fetchrow_hashref) { 
 
    # draw the image on the background 
    $text->Read("text:$row->{Message}"); 
    $background->Draw(primitive => 'text', 
                      pointsize => 20, 
                      fill => 'black', 
                      gravity => 'northwest', 
                      x => 10, 
                      y => 10, 
                      text => $row->{Message}); 
 
    # save the image as a PNG file 
    $background->Write("$row->{Name}-sign.png"); 
} 

###############################################################################

#The day of the protest 

# setup a database table for protest attendance 
my $sth = $dbh->prepare("CREATE TABLE Attendance 
                         (Name VARCHAR(255), 
                          Phone INT, 
                          Email VARCHAR(255), 
                          Message VARCHAR(255), 
                          Attended BOOLEAN)"); 

$sth->execute()
or die "SQL Error: $DBI::errstr\n";

# loop through the protest records 
my $records = $dbh->prepare("SELECT * FROM Protest"); 
$records->execute();

while (my $row = $records->fetchrow_hashref) { 
 
    # prompt for attendance 
    print "Did $row->{Name} attend the protest? [y/n]\n"; 
    my $attendance = <STDIN>; 
 
    # update the database with attendance 
    my $sth = $dbh->prepare("UPDATE Attendance 
                             SET Attended = '$attendance' 
                             WHERE Name = '$row->{Name}'"); 
 
    $sth->execute() 
    or die "SQL Error: $DBI::errstr\n"; 
}

###############################################################################

#Post-protest evaluation

# setup a database table for post-protest evaluation 
my $sth = $dbh->prepare("CREATE TABLE Evaluation 
                         (Name VARCHAR(255), 
                          Phone INT, 
                          Email VARCHAR(255), 
                          Message VARCHAR(255), 
                          Attended BOOLEAN, 
                          Evaluation VARCHAR(255))"); 

$sth->execute()
or die "SQL Error: $DBI::errstr\n";

# send an email survey 
my $email_list = new Email::Simple;

# add contacts to the email list 
my $records = $dbh->prepare("SELECT Email FROM Contacts"); 
$records->execute();

while (my $row = $records->fetchrow_hashref) { 
    $email_list->add_recipient($row->{Email}); 
} 

# send an email message 
$email_list->subject("Please Take Our Post-Protest Survey"); 
$email_list->text_body("We recently held a protest to reclaim our streets from crime and violence. We would greatly appreciate your feedback on the event. Please take a few minutes to fill out the survey below. 

https://example.com/post-protest-survey

Thank you!");

$email_list->send();

# capture survey data 
my $name = $query->param('name'); 
my $phone = $query->param('phone'); 
my $email = $query->param('email'); 
my $message = $query->param('message'); 
my $attended = $query->param('attended');
my $evaluation = $query->param('evaluation');
 
# insert the survey data into the database 
my $sth = $dbh->prepare("INSERT INTO Evaluation 
                         VALUES ('$name', 
                                  '$phone', 
                                  '$email', 
                                  '$message', 
                                  '$attended', 
                                  '$evaluation')"); 

$sth->execute() 
or die "SQL Error: $DBI::errstr\n";