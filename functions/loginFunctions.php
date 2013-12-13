<?php 

#############################################################
#
#
#	This page will hold the login functions
#		1. redirect_user - determins an absolute 
#				value for a URL and redirects there.
#		2. check_login - Validates the form data 
#				(both email and password)
#
#
#
#								(from chapter 12 script 12.2)
#
##############################################################



function redirect_user ($page = 'index.php'){
##############################################################
#
#	redirect_user - creates absolute URL and redirects the user there.
#		$page is page to be redirected to. default it index.php  
#
##############################################################

	//Start by defining the URL
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	//Remove any trailing slashes:
	$url = rtrim($url, '/\\');

	//Add the page
	$url .= '/' . $page;

	//Redirect the user:
	header("Location: $url");
	exit(); //Quit the Script

} //End of redirect_user() function.

function check_login($dbc, $email = '', $pass = ''){
###############################################################
#
#	check_login - This function validated email and password
#		If both are present, the db is queried
#		$dbc is created in mysqli_connect
#		The function returns an array of information:
#			A TRUE/ FALSE variable indicates success
#			A array of either errors or the db result
#
#
#							(I will be adding a check of $email 
#								as either username or email
#								for funsies)
#
###############################################################

	$errors = array(); //initialize error array

	//validate email address
	if (empty($email)) {
		$errors[] = 'You need to enter either your email address or your username';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($email));
	} //end validate email is entered

	//validate the password
	if (empty($pass)) {
		$errors[] = 'You need to enter your password';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($pass));
	} //end validate password is entered

	if(empty($errors)) { //if email and pass are entered
		//Retrieve the user_id and first_name for that 
		//		email/password combination:
		$q = "SELECT user_id, username, first_name FROM agent WHERE (email = '$e' OR username = '$e') AND pass = SHA1('$p')";
		$r = @mysqli_query($dbc, $q); //run the query

		//check the results:
		if (mysqli_num_rows($r) == 1) { //just one match

			//fetch the record:
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

			//Return true and record
			return array(true, $row);
		} else { //Not a match
			$errors[] = 'The user information entered is incorrect or not on file.';
		} 

	} //End of empty($errors) IF.

	//Return false and the errors:
	return array(false, $errors);
}  //End of check_login() function.
