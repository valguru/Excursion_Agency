<?php
session_start();
$connect = "";
include 'connectdb.php';

if (isset($_SESSION['admin']) && isset($_GET['id'])) {
    $region_id = $_GET['id'];
    mysqli_query($connect, "CALL delete_region('$region_id')") or die(mysqli_error($connect));
    $_SESSION['message_delete_region'] = "<p>Регион был успешно удален</p>";
    header("Location: ../pages/regions.php");
}
