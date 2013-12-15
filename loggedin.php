<?php //loggedin.php

#################################################
#
# 	The user is redirected here from login.php
#
#
#
#					(from chapter 12 script 12.4)
#################################################

//If no cookie is present, redirect the user:
if (!isset($_COOKIE['user_id'])) {

	//Need the functions:
	require('functions/loginFunctions.php');
	redirect_user();
}

// Set the page title
$page_title = 'Logged In!';

//include header
include('includes/header.php');

//Print customized message
echo "<h1>Logged In!</h1>
<p>You are now logged in, {$_COOKIE['first_name']}!</p>
<p><a href=\"logout.php\">Logout</a></p>";

include('includes/footer.php');

?>