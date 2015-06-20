<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$fio = $json->{'fio'};
	$cityKod = $json->{'cityKod'};
	$address = $json->{'address'};
	$phoneNumber = $json->{'phoneNumber'};
	$dateBorn = $json->{'dateBorn'};
	$fioParent = $json->{'fioParent'};

	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT INTO Particients (FIO, CityKod, Address, PhoneNumber, DateBorn, FIOParent) VALUES ('$fio', '$cityKod', '$address', 
		'$phoneNumber', '$dateBorn', '$fioParent')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>