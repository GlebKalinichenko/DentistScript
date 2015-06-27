<?php
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    $result = $mysqli->query("SELECT Particients.FIO, Cities.City, Particients.DateBorn, Particients.Address, Particients.PhoneNumber, Particients.DateBorn, Particients.FIOParent FROM Particients INNER JOIN Cities ON Particients.CityKod = Cities.IdCity");
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>