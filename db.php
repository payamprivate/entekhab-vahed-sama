<?php
		session_start();
		ob_start();
		
		// username va password database mysql
		$dbuser="ketab";
		$dbpass="123456**";
		//esm database
		$dbname="sama";
		
 		$sql=mysql_connect("localhost",$dbuser,$dbpass);
		mysql_select_db($dbname,$sql) or die("cant connect sql database");
		mysql_query("SET NAMES utf8");
?>