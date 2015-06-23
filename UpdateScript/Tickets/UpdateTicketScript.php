<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldDoctorKod = $json->{'oldDoctorKod'};
	$newDoctorKod = $json->{'newDoctorKod'};
	$oldDateReception = $json->{'oldRegistrationKod'};
	$newDateReception = $json->{'newRegistrationKod'};
	$oldDateReception = $json->{'oldDateReception'};
	$newDateReception = $json->{'newDateRecpetion'};
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Tickets SET DoctorKod = '$newDoctorKod', RegistrationKod = '$newRegistrationKod' 
	DateReception = '$newDateReception' WHERE DoctorKod = '$oldDoctorKod', RegistrationKod = '$oldRegistrationKod' 
	DateReception = '$newDateReception'";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>