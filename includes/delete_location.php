<?php
session_start();
$connect = "";
include 'connectdb.php';

if (isset($_SESSION['admin']) && isset($_GET['id'])) {
    $location_id = $_GET['id'];
    $region_id = $_GET['region_id'];

    $result = mysqli_query($connect, "SELECT excursion_id, location_id, location_name, guide_id, date FROM all_guide_excursion WHERE location_id = '$location_id'") or die(mysqli_error($connect));


    while ($row = $result->fetch_assoc())
    {
        $excursion_id = $row['excursion_id'];
        $del_location_id = $row['location_id'];
        $del_location_name = $row['location_name'];
        $guide_id = $row['guide_id'];
        $date = $row['date'];
        $_SESSION['del_loc'][$excursion_id] = $del_location_name;
    }

    mysqli_query($connect, "CALL delete_location('$location_id')") or die(mysqli_error($connect));

    $result = mysqli_query($connect, "CALL get_region_name('$region_id')") or die(mysqli_error($connect));
    $region = mysqli_fetch_assoc($result);
    $region_name = $region['name'];


    $_SESSION['message_delete_location'] = "<p>Локация была успешно удалена</p>";
    header("Location: ../pages/locations.php?id=$region_id&name=".urlencode($region_name));
}
