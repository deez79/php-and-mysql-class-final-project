<?php 

#####################################################################
#
#	Ideally this file would be contained outside the htdocs folder.
#		For this project it will live in the folder
#		named database, but this is not the most secure location.
#		(Although, becuase there is no html in this doc it will not display
#		anything if accessed directly via a browser.)
#
######################################################################
	
	//saved constant names for log on once user is created in db:
	DEFINE ('DB_USER', 'bondApp');
	DEFINE ('DB_PASSWORD', 'p4ssw0rd');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'bond');
	
	// mysql_connect format:
	//mysql_connect("hostname", "user", "password", "database");
	
	// Connects to your Database 
	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
	
	// Set the encoding...
	mysqli_set_charset($dbc, 'utf8');
