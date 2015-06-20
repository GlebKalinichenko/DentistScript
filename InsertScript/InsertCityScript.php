<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$countryKod = $json->{'countryKod'};
	$city = $json->{'city'};
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT INTO Cities (CountryKod, City) VALUES ('$countryKod', '$city')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>