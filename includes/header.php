<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="/css/bootstrap.css" type="text\css" />
</head>
<body>
	<div class="header">
		<h1>007 Archive</h1>
		<h2>SQL, not stirred</h2>
	</div> <!--End header-->
	<div class="nav">
		<ul>
			<li><a href="index.php">007 Archive</a></li>
			<li><a href=""></li>
			<li><a href=""></li>
			<li><a href=""></li>
			<li><?php //Create a login/logout link:
				if ((isset($_COOKIE['user_id'])) && (basename($_SERVER['PHP_SELF']) !='logout.php')) {

					echo '<a href="logout.php">Logout</a>';
				} else{
					echo '<a href="login.php">Login</a>';
				}
			?></li>
			
		</ul>
	</div>	<!--End navigation-->
	<div id="content"><!--start of main content of pages.  End of this div will start at footer.php-->
		


	
	
