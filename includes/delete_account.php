<?php
session_start();
$connect = "";
include 'connectdb.php';

if(isset($_POST['delete_user']) && isset($_SESSION['user'])) {
    $email = $_SESSION['user']['email'];
    mysqli_query($connect, "CALL delete_registration_user('$email')") or die(mysqli_error($connect));
    $_SESSION['message_delete_user'] = "<p>Аккаунт $email был успешно удален</p>";
    include 'logout.php';
}
