<?php  //post_form.php

#########################################################
#
# 	This page shows the form for posting messages.
# 		It's included by other pages, never called directly
#
#							(from chapter 17 script 17.6)
#									(edited heavily)
#########################################################

//Redirect if called directly
if (!isset($blue)) {
	header ("Location: index.php");
	exit();
}

//only display this form if the user is logged in:
//		currently using cookies for login, so this 
//			will also be cookie based.  May in the 
//			future change to session for security, but
//			not right now.
if (isset($_COOKIE['user_id'])) {

	//display the form:
	echo '<form action="post.php" method="post" accept-charset="utf-8">';

	//if on read.php
	if(isset($tid) && tid) {

		//print caption:
		echo '<h3> Post a Reply </h3>';

		//add the thread id as a hidden input:
		echo '<input name="tid" type="hidden" value="' . $tid .'" />';
	} else { //New Thread

		//Print a caption:
		echo '<h3>New Thread</h3>';

		//create a subject input:
		echo '<p><em>Subject</em>: <input name="subject" type="text" size="60" maxlength="100" ';
			//Check for existing value:
			if(isset($subject)) {
				echo "value=\"$subject\" ";
			}
		echo '/></p>';
	} //end of $tid IF.

	//Create the body textarea:
	echo '<p><em>Body</em>: <textarea name="body" rows="10" cols="60">';

	if(isset($body)) {
		echo $body;
	}

	echo '</textarea></p>';

	//finish the form:
	echo '<input name="submit" type="submit" value="submit" /> </form>';

} else {
	echo '<p>You must be logged in to post messages.</p>';
}

?>