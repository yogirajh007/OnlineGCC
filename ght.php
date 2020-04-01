<?php 

	$record = $_POST['ipaddr'];
	echo "YOU QUERIED FOR $record" ;
	$data = "whois"." ".$record ;
	echo "<pre>";
	echo shell_exec($data);
	echo "</pre>";





?>
