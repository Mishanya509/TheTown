<?php
	define("HostName","localhost");
	define("UserName","root");
	define("Password","");
	$link=mysql_connect(HostName, UserName, Password);
	mysql_query("SET NAMES utf8");
	mysql_set_charset("utf8");
	mysql_select_db("TheTown") or die(mysql_error());
?>