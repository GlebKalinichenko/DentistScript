<?php
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    $result = $mysqli->query("SELECT Timetables.DateWork, Changes.Changing, Doctors.FIO FROM (Doctors INNER JOIN Timetables
        ON Doctors.IdDoctor = Timetables.DoctorKod) inner join Changes on Timetables.IdTimetable = Changes.IdChange");
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>