<?php
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    $result = $mysqli->query("SELECT UserRegistrations.FullName, UserRegistrations.Email, UserRegistations.Password, 
        UserRegistrations.ProfileKod, Profiles.Profile FROM UserRegistrations INNER JOIN Profiles ON UserRegistrations.ProfileKod = Profiles.IdProfile");
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>