<?php
    $data = file_get_contents('php://input');
    $json = json_decode($data);
    $login = $json->{'login'};
    $password = $json->{'password'};
    $fullName = $json->{'fullName'};
    $profileKod = $json->{'profileKod'};
    
    $mysqli = new mysqli("mysql.hostinger.ru", "u796014662_admin", "adminmyadmin", "u796014662_docs");

    //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    if (empty($login) or empty($password)){
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    // подключаемся к базе
    $result = $mysqli->query("SELECT * from UserRegistrations where Login = '$login' and Password = '$password'");
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['idUserRegistration'])){
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    // если такого нет, то сохраняем данные
    $resultInsert = $mysqli->query("INSERT INTO UserRegistrations (FullName, Login, Password, ProfileKod) VALUES('$fullName', '$login', '$password', '$profileKod')");
    // Проверяем, есть ли ошибки
    if ($resultInsert=='TRUE'){
        echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
    else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
?>