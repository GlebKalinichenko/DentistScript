<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$fio = $json->{'fio'};
	$postKod = $json->{'postKod'};
	$departmentKod = $json->{'departmentKod'};
	$kvalificationKod = $json->{'kvalificationKod'};
	$expirience = $json->{'expirience'};
	
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT INTO Doctors (FIO, PostKod, DepartmentKod, KvalificationKod, Expirience) VALUES ('$fio', '$postKod', '$departmentKod', 
		'$kvalificationKod', '$expirience')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>