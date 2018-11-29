<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kangamph_db";
	
	$connection = mysql_connect($hostname, $username, $password);
	if(!$connection) {
		echo "Database connection failed.";
	}
	$dbselect  = mysql_select_db($dbname);
	if(!$dbselect) {
		echo "Database selection failed.";
	}

	mysql_query("SET NAMES UTF8");
	mysql_query("SET character_set_results=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_connection=utf8");
?>

