<?php
session_start();
$connect = "";
$path = "";
include 'connectdb.php';

if (isset($_POST['add-location'])) {
    $region_id = $_GET['id'];
    $region_name = $_GET['name'];
    echo $region_name;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $specialization_id = $_POST['specialization'];
    if (isset($_FILES['image']['name']) && $_FILES['image']['name']) {
        if ($_FILES['image']['type'] === 'image/jpeg' || $_FILES['image']['type'] === 'image/png') {
            date_default_timezone_set('Europe/Moscow');
            $path = 'uploads/' . date("d.m.Y_H-i-s", time()) . '_' . $_FILES['image']['name'];
            if (!move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path)) {
                $_SESSION['error_upload_avatar'] = "<p>Произошла ошибка при загрузке файла!<br>Попробуйте снова.</p>";
                header("Location: ../pages/locations.php?id=$region_id");
            }
        } else {
            $_SESSION['wrong_avatar_extension'] = "<p>Недопустимое расширение файла с фотографией!<br>Вы можете использовать файлы с расширением .jpg, .jpeg, .png.</p>";
            header("Location: ../pages/locations.php?id=$region_id");
        }
    } else {
        $path = "img/region.png";
    }
    if(!isset($_SESSION['error_upload_avatar']) && !isset($_SESSION['wrong_avatar_extension'])) {
        mysqli_query($connect, "CALL insert_location('$region_id','$name', '$path', '$description','$specialization_id')") or die(mysqli_error($connect));
        $_SESSION['message_successful_signup'] = "<p>Локация успешно добавлена!</p>";
        header("Location: ../pages/locations.php?id=$region_id&name=".urlencode($region_name));
    }
}

