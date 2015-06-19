<?php
    $mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
    $data = array();
    /* Select запросы возвращают результирующий набор */
    if ($result = $mysqli->query("SELECT * FROM Cities")) {
       if ($result->num_rows > 0) {
       // output data of each row
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
            
    }
	echo json_encode($data);
    //file_put_contents('config.json', json_encode($data));

}

        /* очищаем результирующий набор */
        //$result->close();
    }
    
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>