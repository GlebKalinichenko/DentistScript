<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldDateRegistration = $json->{'oldDateRegistration'};
	$newDateRegistration = $json->{'newDateRegistration'};
	$oldParticientKod = $json->{'oldParticientKod'};
	$newParticientKod = $json->{'newParticientKod'};
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Registrations SET DateRegistration = '$newDateRegistration', ParticientKod = '$newParticientKod' 
	WHERE DateRegistration = '$oldDateRegistration', ParticientKod = '$oldParticientKod'";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>