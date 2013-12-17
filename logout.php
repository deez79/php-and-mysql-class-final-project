<?php  //Logout.php

############################################
#
# 	This page is to logout the user
# 		
#
#
#				(from chapter 12 script 12.6)
#############################################

//if no cookie is present, redirect
if (!isset($_COOKIE['user_id'])) {

	//need the functions
	require('functions/loginFunctions.php');
	redirect_user();
}else { //Delete the cookies!
	setcookie('user_id', '', time()-3600, '/', '', 0,0);
	setcookie('first_name', '', time()-3600, '/', '', 0,0);
}

//Set the page title 
$page_title = 'Logged Out!';

//include the header
include ('includes/header.php');

//Print custom message:
echo "<h1>Logged Out!</h1>
<p>You are now logged out, {$_COOKIE['first_name']}!</p>";

include('includes/footer.php');
?>