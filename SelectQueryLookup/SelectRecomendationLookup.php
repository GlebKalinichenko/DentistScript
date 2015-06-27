<?php
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    $result = $mysqli->query("SELECT Tickets.DateReception, Diagnoses.Diagnose, Recomendations.Therapy, Recomendations.Complaints, 
        Recomendations.HistoryIllness, Recomendations.ObjectiveValues FROM (Tickets INNER JOIN Recomendations
        ON Tickets.IdTicket = Recomendations.TicketKod) inner join Diagnoses on Diagnoses.IdDiagnose = Recomendations.DiagnoseKod);
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>