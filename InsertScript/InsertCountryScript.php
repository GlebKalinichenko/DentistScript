<?php
	$response = array();
	$josn = file_get_contents("php://input");
	$josn_data = json_decode($josn, true);	
	$country = $josn_data->{'country'};
	echo $country;
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	$sql = "INSERT INTO Countries (Country) VALUES (Корея)";
	$result = $mysqli->query($sql);
?>