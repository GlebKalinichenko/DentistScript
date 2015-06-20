<?php
	/*$response = array();
	$josn = file_get_contents("php://input");
	$josn_data = json_decode($josn, true);	
	$country = $josn_data->{'country'};
	echo $country;*/
	$value = "Korea";
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT INTO Countries (Country) VALUES ('$value')";
	$mysqli->query($query);
	/*$query = "INSERT INTO myCity VALUES (NULL, 'Stuttgart', 'DEU', 'Stuttgart', 617000)";
	$mysqli->query($query);*/

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>