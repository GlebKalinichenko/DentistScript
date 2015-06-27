<?php
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    $result = $mysqli->query("SELECT Doctors.FIO, Registrations.DateRegistration, Tickets.DateReception FROM (Doctors INNER JOIN Tickets
        ON Doctors.IdDoctor = Tickets.DoctorKod) inner join Registrations on Registrations.IdRegistration = Tickets.RegistrationKod");
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>