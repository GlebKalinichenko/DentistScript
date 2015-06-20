<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$ticketKod = $json->{'ticketKod'};
	$diagnoseKod = $json->{'diagnoseKod'};
	$therapy = $json->{'therapy'};
	$complaints = $json->{'complaints'};
	$historyIllness = $json->{'historyIllness'};
	$objectiveValues = $json->{'objectiveValues'};

	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "INSERT INTO Recommedations (TicketKod, DiagnoseKod, Therapy, Complaints, Historyillness, ObjectiveValues) VALUES ('$ticketKod', 
		'$diagnoseKod', '$therapy', '$complaints', '$historyIllness' 'objectiveValues')";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>