<?php
	include 'log.php';
	include 'dbconnect.php';

	function showUserInfo(){
		$r=mysql_query("select * from users where id = 1");
		if (mysql_errno()){
			_LOG(mysql_error());
		}
		$f=mysql_fetch_array($r);

		$res = "";

		$res .= sprintf("<li>%s</li>", $f[name]);
		$res .= sprintf("<li>Уровень %s</li>", $f[level]);
		$res .= sprintf("<li>%s<img src='img/ui/coin.png' class='coin'/></li>", $f[money]);
		
		return $res;
	}

	function setMoney($money){
		$r=mysql_query("update users set money = $money where id = 1");
		if (mysql_errno()){
			_LOG(mysql_error());
		}
	} 

	if ($_GET["money"]){
		setMoney($_GET["money"]);
	}
	echo showUserInfo();
?>