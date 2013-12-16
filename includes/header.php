<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="/css/bootstrap.css" type="text\css" />
	<?php //most of this php is from 17.1 (edited for my needs)

	//start the session:
	session_start();

	//for testing purposes
	//$_SESSION['user_id'] = 1;
	//for logging out
	//$_SESSION = array();

	//connect to the DB
	require ('database/mysqli_connect.php');

	//check for forum ID
	// 	then store forum ID in the session:
	if ( isset($_GET['fid']) && filter_var($_GET['fid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
		$_SESSION['fid'] = $_GET['fid'];
	} else {
		$_SESSION['fid'] = 1; // Default
	}



	?>

</head>
<body>
	<div class="header">
		<h1>007 Archive</h1>
		<h2>MySQL, not stirred</h2>
	</div> <!--End header-->
	<div class="nav">
		<ul>
			<li><a href="index.php">007 Archive</a></li>
			<li><a href="forum.php">Forum Home</a></li>
			<?php //Display links based on login status:
			if (isset($_COOKIE['user_id'])) { 
				//If this is the forum page, add a link for posting threads:
				if (basename($_SERVER['PHP_SELF']) == 'forum.php') {
					echo '<li><a href="post.php">New Thread</a></li>';
				}
				//add a log out link

				//checks to see if cookie is set, AND that you are not on the logout.php page
				if ((isset($_COOKIE['user_id'])) && (basename($_SERVER['PHP_SELF']) !='logout.php')) {
					echo '<a href="logout.php">Logout</a>';
				} else{
					echo '<a href="login.php">Login</a>';
				}
				//echo '<li><a href="logout.php">Logout</a></li>' . "\n";
			} else {
				//Register and login
				echo '<li><a href="login.php">Login</a></li>' . "\n";
			}


			//For Choosing a forum
			echo '<form action="forum.php" method="get">
			<li><select name="fid">
				<option value="0">' . "Forums" . '</option>';

				//Retrieve all Forum Names:
				$q = "SELECT forum_id, forum_name FROM forum ORDER BY forum_id ASC";
				$r = mysqli_query($dbc, $q);
				if (mysqli_num_rows($r) > 0) {
					while ($menu_row = mysqli_fetch_array($r, MYSQLI_NUM)) {
						echo "<option value=\"$menu_row[0]\">$menu_row[1]</option>\n";
					} //end while statement
				} //end if rows > 0
				mysqli_free_result($r);
			echo '</select></li>'; //end select statement

			echo '<li><input name="submit" type="submit" value="submit" /></li>';
			echo '</form>';

			?>

		</ul>
	</div>	<!--End navigation-->
	<div id="content"><!--start of main content of pages.  End of this div will start at footer.php-->
		


	
	
