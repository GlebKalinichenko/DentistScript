<?php
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    $result = $mysqli->query("SELECT Doctors.FIO, Posts.Post, Kvalifications.Kvalification, DepartmentsDoctors.Department 
        FROM ((Doctors INNER JOIN Posts ON Doctors.PostKod = Posts.IdPost) inner join Kvalifications
        on Kvalifications.IdKvalification = Doctors.KvalificationKod) inner join DepartmentsDoctors 
        on DepartmentsDoctors.IdDepartment = Doctors.DepartmentKod  ");
    	if ($result->num_rows > 0) {
 	   // output data of each row
    	while($row = $result->fetch_assoc()) {
            $data[] = $row;
    	}
        echo json_encode($data);
	}
	
?>