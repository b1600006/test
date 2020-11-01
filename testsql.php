<?php 
	$servername = '172.17.0.2';
	$username = 'root';
	$password = 'thanhan1810@';
	$dbname = 'demo';

	$con = mysqli($servername,$username,$password,$dbname);

	if (!mysqli()){
		echo "connect error";
		exit();
	}

	echo "connect succsess!";
?>