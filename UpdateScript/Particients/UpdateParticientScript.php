<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldFio = $json->{'oldFio'};
	$newFio = $json->{'newFio'};
	$oldPhoneNumber = $json->{'oldPhoneNumber'};
	$newPhoneNumber = $json->{'newPhoneNumber'};
	$oldAddress = $json->{'oldAddress'};
	$newAddress = $json->{'newAddress'};
	$oldCityKod = $json->{'oldCityKod'};
	$newCityKod = $json->{'newCityKod'};
	$oldDateBorn = $json->{'oldDateBorn'};
	$newDateBorn = $json->{'newDateBorn'};
	$oldFIOParent = $json->{'oldFIOParent'};
	$newFIOParent = $json->{'newFIOParent'};
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Particients SET FIO = '$newFio', CityKod = '$newCityKod', 
	PhoneNumber = '$newPhoneNumber', DateBorn = '$newDateBorn', FIOParent = '$newFIOParent' 
	WHERE FIO='$oldFio', CityKod = '$oldCityKod', PhoneNumber = '$oldPhoneNumber', 
	DateBorn = '$oldDateBorn', FIOParent = '$oldFIOParent";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>