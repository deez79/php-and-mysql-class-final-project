<?php //read.php

#########################################################
#
# 	This page shows the messages in a thread:
#
#
#
#							(from chapter 17 script 17.5)
#########################################################

//include header
include ('includes/header.php');

//Check for a thread ID
$tid = FALSE;
if (isset($_GET['tid']) && filter_var($_GET['tid'], FILTER_VALIDATE_INT, array('min_range' => 1)) ) {

	//create a shorthand version of thread ID:
	$tid = $_GET['tid'];

	//skipping the date and timezone conversions:
	$posted = 'p.posted_on';

	//run query
	$q = "SELECT t.subject, p.message, username, DATE_FORMAT($posted, '%e-%b-%y %l:%i %p') AS posted FROM threads AS t LEFT JOIN posts AS p USING (thread_id) INNER JOIN users AS u ON p.user_id = u.user_id WHERE t.thread_id = $tid ORDER BY p.posted_on ASC"; //seriously.... these queries are insane.
	$r = mysqli_query($dbc, $q);
	if (!(mysqli_num_row($r) > 0)) {
		$tid = FALSE; //invalid thread ID!
	}
} //End of isset($_GET['tid']) IF.

if ($tid) { //Get the messages in this thread...

	$printed = FALSE; //flag variable

	//Fetch each
	while ($messages = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		//only need to print the subject once!
		if (!$printed) {
			echo "<h2>{$messages['subject']}</h2> \n";
			$printed = TRUE;
		}

		//Print the message:
		echo "<p>{$messages['username']} ({$messages['posted']})<br /> {$messages['message']}</p><br /> \n";

	} //End of While Loop

	//Show the form to post a message:
	include ('includes/post_form.php');
} else {//Invalid Thread ID!
	echo '<p>This page has been accessed in error.</p>';
}

include ('includes/footer.php');
?>