<?php

//Declare an array, ask the user for information for each item and store in the array
$information = array((string)readline("Enter your diploma: "), 
(string)readline("Enter your years of experience: "), (string)readline("Enter 
your graduation date: "), (string)readline("Enter an important skill you have: 
"));

//Declare an array and store the eligibility criteria to be tested against later
$criteria = array("CS", "2", "2020", "PHP");

//Declare variable to store how eligible a candidate is which will be tested against later
$eligibility = 0;

//Runs 4 times go through each piece of information and test it to see if its eligible
for($i = 0; $i < 4; $i++) {

//Tests if each piece of information matches each piece of criteria
if($information[$i] == $criteria[$i]) {
        $eligibility++; //Add 1 to eligibility rating
    }
}

//If eligibility rating is 4 (meaning each criteria matched), print acceptance message
if($eligibility == 4) {
    echo "\nYou are eligible for the job, your interview is in 1 week!";

//If eligibility rating is less than 4 (meaning 1 or more criteria didn't match), print refusal message
}else {
    echo "\nWe are sorry, we have moved on with other candidates.";
}
?>