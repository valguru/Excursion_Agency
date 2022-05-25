<?php
session_start();
$connect = "";
include 'connectdb.php';


if (isset($_SESSION['admin']) && isset($_GET['id'])) {
    $reg_id = $_GET['id'];
    $role_id = $_GET['role_id'];
    if($role_id == 3) {
        mysqli_query($connect, "CALL delete_user_by_admin('$reg_id')") or die(mysqli_error($connect));
    }
    else {
        mysqli_query($connect, "CALL delete_admin_by_admin('$reg_id')") or die(mysqli_error($connect));
    }

    $_SESSION['message_delete_user'] = "<p>Аккаунт был успешно удален</p>";
    header("Location: ../pages/account.php");
}

