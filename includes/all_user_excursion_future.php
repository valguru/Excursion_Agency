<?php
$host = 'localhost';
$db = 'web_project';
$user = 'root';
$password = 'vertrigo';

//PDO
try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->exec("set names utf8");
} catch (PDOException $e) {
    echo $e->getMessage();
};
date_default_timezone_set('Europe/Moscow');
$curr_time = time();
$user_id = $_SESSION['user']['user_id'];
$sql = "SELECT * FROM all_user_excursion WHERE (user_id = $user_id)";
$result = $connect->prepare($sql);
$result->execute();

while ($row = $result->fetch()) {
    $location_id = $row['location_id'];
    $excursion_id = $row['excursion_id'];
    if(isset($_SESSION['del_loc'][$excursion_id])){
        $location_name = $_SESSION['del_loc'][$excursion_id];
    }
    else {
        $location_name = $row['location_name'];
    }
    $date = date('d.m.Y', strtotime($row['date']));
    $time = date('H:i', strtotime($row['date']));
    if(strtotime($row['date']) > $curr_time) {
        echo "<p>$location_name<br>$date, $time</p>";
    }
}
$connect = null;








