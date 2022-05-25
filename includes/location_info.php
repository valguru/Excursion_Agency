<?php
$connect = "";
include 'connectdb.php';

if(isset($_GET['location_id'])) {
    $location_id = $_GET['location_id'];
    $location_name = $_GET['location_name'];
    $result = mysqli_query($connect, "CALL location_info('$location_id')") or die(mysqli_error($connect));
    $row = $result->fetch_assoc();
    $description = $row['description'];
    $image = '../'. $row['image'];
    $specialization_value = $row['specialization_value'];
}




