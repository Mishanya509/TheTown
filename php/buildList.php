<?php
	include 'dbconnect.php';

	function showBuildList(){
		$r=mysql_query("select * from buildings where id in (select building from discovering where user = 1)");
		echo mysql_error();
		$res = "";
		while ($f=mysql_fetch_array($r)){
			$res .= sprintf("<li data-type='%s' class='buildListLi'>\n", $f[type]);
			$res .= sprintf("<img class='LiImage' src='img/build/%s.png'/>", $f[type]);
			$res .= sprintf("<div class='LiText'> %s<br>$s </div>", $f[name], $f[description] );
			$jsf = "buildOnSelectedCell(this.parentNode.getAttribute(\"data-type\"))";
			$res .= sprintf("<div class='button' onclick='".$jsf."'>\n");
			$res .= $f[price];
			$res .= "<img class='coin' src='img/ui/coin.png'/>\n"; 
			$res .= "</div>\n";
		}
		return $res;
	}

	echo showBuildList();
?>