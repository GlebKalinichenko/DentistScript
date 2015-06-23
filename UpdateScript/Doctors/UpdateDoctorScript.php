<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldFIO = $json->{'oldFIO'};
	$newFIO = $json->{'newFIO'};
	$oldKvalificationKod = $json->{'oldKvalificationKod'};
	$newKvalifivationKod = $json->{'newKvalificationKod'};
	$oldPostKod = $json->{'oldPostKod'};
	$newPostKod = $json->{'newPostKod'};
	$oldDepartmentKod = $json->{'oldDepartmentKod'};
	$newDepartmentKod = $json->{'newDepartmentKod'};
	$oldExpierience = $json->{'oldExpirience'};
	$newExpirience = $json->{'newExpirience'};
	
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Doctors SET FIO='$newFIO', PostKod = '$newPostKod', 
	KvalificationKod = '$KvalificationKod', DepartmentKod = '$newDepartmentKod',
	Expirience = '$Expirience' WHERE FIO='$oldFIO', PostKod = '$oldPostKod', KvalificationKod = '$oldKvalificationKod',
	DepartmentKod = '$oldDepartmentKod', Expirience = '$oldExpirience'";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>