<?php
	$mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");
	$sql = "INSERT INTO Countries (Country) VALUES (Корея)";
	$result = $mysqli->query($sql);
?>