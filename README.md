# TempConvert
Developer Coding Challenge

## Introduction
Temperature conversion between Kelvin, Celsius, Fahrenheit and Rankine. Simple API created to collect and grade student's response to a temperature question.

Step 1: Analysis – Ask questions and gather the requirements:
* Who is this being built for?
* Is this procedural or does it require classes / relationships?

Step 2: Requirements Outline:
* Must have two textfields, one for teacher input and one for student response
* Must have option for temperature unit selection
* Upon button click must convert temperature from one to the other
* Must convert and round to nearest ones place
* Print out correct, incorrect, or invalid grade to teacher/user
* Notify user if there is a blank/empty textfield and/or missing unit

Use-Case for Temperature Conversion (Actions performed by the user, and response from system):
1.	User gets worksheet to be graded.	
2.	User clicks on Single Conversion button.
3.	The system allows user to input a temperature and student response with relative units of choice.
4.	User fills in the input temperature along with the units, and does the same with the student’s response along with units. Then clicks the Convert button.
5.	System reads in the data, verifies all fields are filled, then goes through a comparison case of the units to successfully calculate the conversion desired. Informs user of correct, incorrect, or invalid grade.
6.	User gives grade on the worksheet.	



## Features
* Single conversion from user's input of temperature choice and student's response.
* Responds with correct grade if answers are a match rounded to the ones place.
* Incorrect and Invalid grades also given if there is no match.

## Technologies
Project was created using:
* PHP Development Tools (PDT)
* Eclipse IDE (main editor)
* XAMPP (Apache Module)

## Setup
To run this project, move main TempConvert folder into htdocs (if using XAMPP) or into your web servers file directory. Make sure Apache service is started, then use browser and nagivate to http://localhost/TempConvert/index.php

## Future Implementations (To-dos)
* Run multiple conversions at once (m_process.php)
