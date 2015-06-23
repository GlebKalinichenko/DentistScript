<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldPost = $json->{'oldPost'};
	$newPost = $json->{'newPost'};
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Posts SET Post='$newPost' WHERE Post='$oldPost'";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>