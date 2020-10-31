<?php 
	$servername = '172.17.0.2';
	$username = 'root';
	$password = 'thanhan1810@';
	$dbname = 'demo';

	$con = new mysqli($servername,$username,$password);

	if ($conn->connect_error) {
    		die("Connection failed: " . $con->connect_error);
	} 

	echo "connect succsess!";
?>
