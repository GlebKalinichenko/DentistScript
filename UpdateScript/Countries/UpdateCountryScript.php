<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldCountry = $json->{'oldCountry'};
	$newCountry = $json->{'newCountry'};
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Countries SET Country='$newCountry' WHERE Country='$oldCountry'";
	$mysqli->query($query);
	/*$query = "INSERT INTO myCity VALUES (NULL, 'Stuttgart', 'DEU', 'Stuttgart', 617000)";
	$mysqli->query($query);*/

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>