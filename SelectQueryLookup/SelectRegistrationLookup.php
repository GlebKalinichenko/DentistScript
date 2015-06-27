<?php
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    $result = $mysqli->query("SELECT Registrations.DateRegistration, Particients.FIO FROM Registrations INNER JOIN Particients
    ON Registrations.ParticientKod = Particients.IdParticient);
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>