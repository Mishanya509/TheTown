<?php
	include 'dbconnect.php';
	include 'log.php';

	function showField(){
		$r=mysql_query("select field from users where id = 1");
		if (mysql_errno()){
			_LOG("select field from users where id = 1");
			_LOG(mysql_error());
			return "";
		};
		$f=mysql_fetch_array($r);
		$field = json_decode($f[field], true);
		$res = "";
		
		for ($i = 0; $i < 5; $i++){
			$res .= "<tr>";
			for ($j = 0; $j < 5; $j++){
				$idx = $i*5 + $j;
				$buildId = $field["c".$i.$j];

				$r1=mysql_query("select type from buildings where id = ".$buildId);
				if (mysql_errno()){
					_LOG("select type from buildings where id = ".$buildId);
					_LOG(mysql_error());
					return "";
				};
				$f1=mysql_fetch_array($r1);
				$type = $f1[type];

				$res .= sprintf("<td>");
				$res .= sprintf("<div id = '%s' class='cell' data-building='%s'>", "c".$i.$j, $type);
				$res .= sprintf("<img onclick='onCellClick(this.parentElement)' src='%s'/>", "img/build/".$type.".png");
				$res .= sprintf("</div>");
				$res .= sprintf("</td>");
			}
			$res .= sprintf("</tr>");
		}
		return $res;
	}

	function showCell($cellId, $type){
		$r=mysql_query("select id from buildings where type = '$type'");
		if (mysql_errno()){
			_LOG(mysql_error().": select id from buildings where type = '$type'");
			return "";
		};
		$f=mysql_fetch_array($r);

		$bid = $f["id"];
		_LOG($bid);

		$r=mysql_query("select field from users where id = 1");
		if (mysql_errno()){
			_LOG(mysql_error());
			return "";
		};
		$f=mysql_fetch_array($r);
		$field = json_decode($f[field], true);
		$field[$cellId] = $bid;
		$field = json_encode($field);
		_LOG($field);

		$sql = "update users set field = '$field' where id = 1";
		$r=mysql_query($sql);
		if (mysql_errno()){	
			_LOG(mysql_error());
			return "";
		};

		$img = sprintf("<img onclick='onCellClick(this.parentElement)' src='%s' style='right:20px; bottom: 20px;'/>", "img/build/".$type.".png");
		return $img;
	}

	if ($_GET["cell"] && $_GET["type"]){
		echo showCell($_GET["cell"], $_GET["type"]);
	} else {
		echo showField();
	}
	
?>
