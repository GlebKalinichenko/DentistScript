<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldChangeKod = $json->{'oldChangeKod'};
	$newChangeKod = $json->{'newChangeKod'};
	$oldDateWork = $json->{'oldDateWork'};
	$newDateWork = $json->{'newDateWork'};
	$oldDoctorKod = $json->{'oldDoctorKod'};
	$newDoctorKod = $json->{'newDoctorKod'};
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Timetables SET DateWork = '$newDateWork', ChangeKod = '$newChangeKod' 
	DoctorKod = '$newDoctorKod' WHERE DateWork = '$oldDateWork', ChangeKod = '$oldChangeKod' 
	DoctorKod = '$newDoctorKod'";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>