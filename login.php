<?php //Page to process the login form submission

#########################################################
#
# 	Processes the Login form submission
#		Upon successful login, the user is redirected
#		Two include files are needed.
#		SEND NOTHING to the web browser prior to the
#			setcookie() lines!
#
#							(from chapter 12 script 12.3)
#							(from chapter 12 script 12.5)
#########################################################

//Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//For processing the login:
	require ('functions/loginFunctions.php');

	//Need the database connection:
	require ('database/mysqli_connect.php');

	//Check the Login credentials 
	list ($check, $data) = check_login ($dbc, $_POST['email'], $_POST['pass']);


	if ($check) { //if they are a match $check is True!

		//Set the cookies
		$user = $data['user_id']; //create user variable, so that user_id can be encrypted.
		setcookie('user_id', sha1('$user'), time()+3600, "/", '', 0, 0); //added more security to cookie
		//setcookie('SHA1 user_id', sha1('$data["user_id"]'));  //for some reason, I can't get this cookie to show up.  
		setcookie('first_name', $data['first_name'], time()+3600, "/", '', 0, 0); //added more security to cookie

		//start a session to save $user
		session_start();
		$_SESSION['user_id'] = $data['user_id'];
		

		//redirect to loggedin.php
		redirect_user('loggedin.php');



	} else {

		//Assign $data to $errors for error reporting
		// 	in the login_page.php file
		$errors = $data;
	}

	mysqli_close($dbc); //close the database connection



}; //End of main submit conditional

//CREATE the page:
include('includes/login_page.php');



?>