<?php
    $mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    if ($result = $mysqli->query("SELECT * FROM Posts")) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        echo json_encode($data);
        }

    }
    
?>