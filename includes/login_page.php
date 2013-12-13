<?php  	//This is the login for this application.  

#################################################
#
#	The basic structure is taken from Chapter 12
#		script 12.1
#
#	This file needs to live in include folder.
#
#
#################################################

//set page title variable
$page_title = 'Login';

//include standard header
include ('header.php');

//test to see if errors exist
if (isset($errors) && !empty($errors)){
	echo '<h1>Error on ' . $page_title . '</h1>
	<p class="error">The following error(s) occurred:<br \>';
	foreach ($errors as $msg) {
		echo " - $msg<br /> \n";
	} //end foreach
	echo '</p><p>Please Try again.</p>';
} //end if errors exist

//Login form:
?>
<h1>Login</h1>
<form action="login.php" method="post">
	<p>Username or Email Address:   <input type="text" name="email" size="20" maxlength="120" /></p>
	<p>Password: <input type="password" name="pass" size="39" maxlength="250" /></p> 
	<p><input type="submit" name="submit" value="Login" /></p>
</form>

<?php include ('footer.php'); ?>