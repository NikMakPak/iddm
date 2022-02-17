<?php
$driver='mysql';
$host='localhost';
$db_name='gosuslugi';
$db_user='root';
$db_password='Mn280203';
$charset='utf8';
$options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
$BASE_URL='http://localhost/iddm/';

try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user,$db_password,$options
    );
//    echo "<i>Успешно подключено к БД: " . $db_name;
//    echo "<br>" . "---------------------✔------------------------</i>" ."<br>";
}catch (PDOException $e){
    die("<i>Ошибка при подключении к БД: " . $db_name . "<br>" . "---------------------✖------------------------</i>");
}