<?php 
	$servername = '172.17.0.2';
	$username = 'root';
	$password = 'thanhan1810@';
	$dbname = 'demo';

	$con = mysql_connect($servername,$username,$password,$dbname);

	if (mysql_errno()){
		echo "failed to connect!";
		exit();
	}

	echo "connect succsess!";
?>