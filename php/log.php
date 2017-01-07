<?php 
	function _LOG($message, $user = "user", $filename = "mainlog.txt"){
		$file = "logs/".$filename;
		$f = fopen($file, "a");
		$logmsg = $user." (".date("Y-m-d H:i:s")."): ".$message.PHP_EOL;
		fwrite($f, $logmsg); 
		fclose($f);
	}
 ?>