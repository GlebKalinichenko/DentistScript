<?php
	$data = file_get_contents('php://input');
	$json = json_decode($data);
	$oldTicketKod = $json->{'oldTicketKod'};
	$newTicketKod = $json->{'newTicketKod'};
	$oldDiagnoseKod = $json->{'oldDiagnoseKod'};
	$newDiagnoseKod = $json->{'newDiagnoseKod'};
	$oldTherapy = $json->{'oldTherapy'};
	$newTherapy = $json->{'newTherapy'};
	$oldComplaints = $json->{'oldComplaints'};
	$newComplaints = $json->{'newComplaints'};
	$oldHistoryIllness = $json->{'oldHistoryIllness'};
	$newHistoryIllness = $json->{'newHistoryIllness'};
	$oldObjectiveValues = $json->{'oldObjectiveValues'};
	$newObjectiveValues = $json->{'newObjectiveValues'};
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	/* проверка соединения */
	if (mysqli_connect_errno()) {
    	printf("Соединение не установлено: %s\n", mysqli_connect_error());
    	exit();
	}
	$query = "UPDATE Recomendations SET TicketKod = '$newTicketKod', DiagnoseKod = '$newDiagnoseKod',
	 Therapy = '$newTherapy', Complaints = '$newComplaints', HistoryIllness = '$newHistoryIllness', 
	 ObjectiveValues = '$newObjectiveValues' WHERE TicketKod = '$oldTicketKod' and DiagnoseKod = '$oldDiagnoseKod' and
	 Therapy = '$oldTherapy' and Complaints = '$oldComplaints' and HistoryIllness = '$oldHistoryIllness' and 
	 ObjectiveValues = '$oldObjectiveValues'";
	$mysqli->query($query);

	printf ("ID новой записи: %d.\n", $mysqli->insert_id);

?>