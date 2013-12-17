<?php // forum.php

#########################################################
#
# 	This page shows the threads in a forum.
# 		
#
#							(from chapter 17 script 17.4)
#									(edited heavily)
#########################################################

//include the header
include ('includes/header.php');

//retrieve the messages in this forum:
// 	Because I am not using a user timezone,
// 		there is no need to include the timezone
// 		portion of this script.
$first = 'p.posted_on';
$last = 'p.posted_on';

//The query for retrieving all the threads in this forum, along with
// 	the original user, when the thread was first posted, when it was
// 	last replied to, and how many replies it had:
$q = "SELECT t.thread_id, t.subject, username, COUNT(post_id) - 1 AS responses, MAX(DATE_FORMAT($last, '%e-%b-%y %l:%i %p')) AS last, MIN(DATE_FORMAT($first, '%e-%b-%y %l:%i %p')) AS first FROM threads AS t INNER JOIN posts AS p USING (thread_id) INNER JOIN agent AS u ON t.user_id = u.user_id WHERE t.forum_id = {$_SESSION['fid']} GROUP BY (p.thread_id) ORDER BY last DESC"; //this insane query is straight from the book, with me swapping fid for lid and t.forum_id for t.lang_id.  Seriously...  This query is bananas.

$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) > 0) {

	//Create table... Considering trying not to use tables, but don't really have time to deal with the change.
	echo '<table width="100%" boarder="0" cellspacing="2" cellpadding="2" align="center">
		<tr>
			<td align="left" width="50%"><em>Subject</em>:</td>
			<td align="left" width="20%"><em>Posted By</em>:</td>
			<td align="center" width="10%"><em>Posted On</em>:</td>
			<td align="center" width="10%"><em>Replies</em>:</td>
			<td align="center" width="10%"><em>Latest Reply</em>:</td>
		</tr>';

	//Fetch Each Thread:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			<td align="left"><a href="read.php?tid=' . $row['thread_id'] . '">' . $row['subject'] . '</a></td>
			<td align="left">' . $row['username'] . '</td>
			<td align="center">' . $row['first'] . '</td>
			<td align="center">' . $row['responses'] . '</td>
			<td align="center">' . $row['last'] . '</td>
		</tr>';
	}

	echo '</table>'; //Complete the table
} else {
	echo '<p>There are currently no messages in this forum.</p>';
} 

//include the footer
include ('includes/footer.php');
?>
