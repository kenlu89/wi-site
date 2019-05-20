<?php

	// This page contains the connection routine for the
	// database as well as getting the ID of the cart, etc

	$dbServer = "db1300.perfora.net";
	$dbUser = "dbo230755232";
	$dbPass = "C9xrv3vK";
	$dbName = "db230755232";

	function ConnectToDb($server, $user, $pass, $database)
	{
		// Connect to the database and return
		// true/false depending on whether or
		// not a connection could be made.
		
		$s = @mysql_connect($server, $user, $pass);
		$d = @mysql_select_db($database, $s);
		
		if(!$s || !$d)
			return false;
		else
			return true;
	}
	
	function GetCartId()
	{
		// This function will generate an encrypted string and
		// will set it as a cookie using set_cookie. This will
		// also be used as the cookieId field in the cart table
		
		if(isset($_COOKIE["cartId"]))
		{
			return $_COOKIE["cartId"];
		}
		else
		{
			// There is no cookie set. We will set the cookie
			// and return the value of the users session ID
			
			session_start();
			setcookie("cartId", session_id(), time() + ((3600 * 24) * 30));
			return session_id();
		}
	}

?>