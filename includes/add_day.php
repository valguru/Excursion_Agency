<?php
session_start();
$connect = "";
$path = "";
include 'connectdb.php';

if (isset($_POST['add-day'])) {
    $location_id = $_GET['location_id'];
    $location_name = $_GET['location_name'];
    $region_id = $_GET['region_id'];
    $region_name = $_GET['region_name'];
    $guide_id = $_GET['guide_id'];
    $date = $_POST['date'];
    $level_id = $_POST['level'];
    $comment = $_POST['comment'];
    $price = $_POST['price'];

    echo strtotime($date) . "<br>";
    $current_time = time();

    if ($current_time > strtotime($date)) {
        $_SESSION['message_excursion_add'] = "<p>Невозможно добавить экскурсию для даты, которая уже прошла!</p>";
    } else {
        mysqli_query($connect, "CALL insert_excursion('$location_id','$level_id', '$date', '$guide_id','$comment','$price')") or die(mysqli_error($connect));
        $_SESSION['message_excursion_add'] = "<p>Форма записи успешно добавлена!</p>";
    }
    header("Location: ../pages/excursion_record.php?location_id=$location_id&location_name=" . urlencode($location_name) . "&region_id=$region_id&region_name=" . urlencode($region_name));
}

