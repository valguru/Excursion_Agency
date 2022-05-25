<?php
session_start();
$connect = "";
//$path = $_SESSION['user']['avatar'];
include 'connectdb.php';


if (isset($_POST['update-info'])) {
    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $gender = $_POST["gender"];
    if($gender == 1){ $path = 'img/user_male.png'; }
    if($gender == 2){ $path = 'img/user_female.png'; }
    $age = $_POST["age"];
    $level = $_POST["level"];
    $phone = $_POST["phone"];
    $email = $_SESSION['user']['email'];
    $new_email = $_POST["email"];
    if (isset($_POST['delete_avatar'])) {
        $delete_avatar = $_POST['delete_avatar'];
    }
    $new_avatar = $_FILES['new_avatar']['name'];
    $role_id = $_SESSION['user']['role_id'];
    $role = $_SESSION['user']['role'];
    $user_id = $_SESSION['user']['user_id'];




    if (isset($_FILES['new_avatar']['name']) && $_FILES['new_avatar']['name']) {
        if ($_FILES['new_avatar']['type'] === 'image/jpeg' || $_FILES['new_avatar']['type'] === 'image/png') {
            date_default_timezone_set('Europe/Moscow');
            $path = 'uploads/' . date("d.m.Y_H-i-s", time()) . '_' . $_FILES['new_avatar']['name'];
            if (!move_uploaded_file($_FILES['new_avatar']['tmp_name'], '../' . $path)) {
                $_SESSION['error_upload_avatar'] = "<p>Произошла ошибка при загрузке файла!<br>Попробуйте снова.</p>";
                header("Location: ../pages/account.php");
            }
        } else {
            $_SESSION['wrong_avatar_extension'] = "<p>Недопустимое расширение файла аватара!<br>Вы можете использовать файлы с расширением .jpg, .jpeg, .png.</p>";
            header("Location: ../pages/account.php");
        }
    } else {
        if ($_SESSION['user']['avatar'] == 'img/user_male.png' || $_SESSION['user']['avatar'] == 'img/user_female.png') {
            if ($gender != $_SESSION['user']['avatar']) {
                if ($gender == 1) $path = 'img/user_male.png';
                if ($gender == 2) $path = 'img/user_female.png';
            }
        } else {
            if (isset($_POST['delete_avatar'])) {
                unlink('../' . $_SESSION['user']['avatar']);
                if ($gender == 1) $path = 'img/user_male.png';
                if ($gender == 2) $path = 'img/user_female.png';
            }
        }
    }

    $can_update = true;

    if ($email != $new_email) {
        $users_count = mysqli_query($connect, "SELECT is_login('$new_email') as user_cnt") or die(mysqli_error($connect));
        $count = mysqli_fetch_assoc($users_count);
        if ($count['user_cnt'] > 0) {
            $can_update = false;
            $_SESSION['error_double_login'] = "<p>Пользователь с таким логином уже существует!<br>Авторизуйтесь или используйте другой логин.</p>";
            header("Location: ../pages/account.php");
        }
    }
    if ($can_update) {
        if (!isset($_POST["age"]) || $_POST["age"] == null) {
            mysqli_query($connect, "CALL update_registration_user('$email', '$new_email', '$last_name', '$first_name', '$level','$gender', null ,'$phone','$path')") or die(mysqli_error($connect));
        } else {
            mysqli_query($connect, "CALL update_registration_user('$email', '$new_email', '$last_name', '$first_name', '$level','$gender','$age','$phone','$path')") or die(mysqli_error($connect));
        }

        $user_info = mysqli_query($connect, "SELECT * FROM all_user_info WHERE login = '$new_email'") or die(mysqli_error($connect));
        $info = mysqli_fetch_assoc($user_info);

        $_SESSION["user"] = [
            'user_id' => $user_id,
            'last_name' => $info['last_name'],
            'first_name' => $info['first_name'],
            'age' => $info['age'],
            'gender_id' => $info['gender_id'],
            'gender' => $info['gender_value'],
            'level_id' => $info['level_id'],
            'level' => $info['level_value'],
            'email' => $info['login'],
            'phone' => $info['phone'],
            'avatar' => $info['avatar'],
            'role_id' => $role_id,
            'role' => $role
        ];
        $_SESSION['message_successful_update'] = "<p>Изменения данных прошли успешно!</p>";
        header("Location: ../pages/account.php");
    }
}