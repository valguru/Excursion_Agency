<?php
session_start();
$connect = "";
//$path = 'img/user_male.png';
include 'connectdb.php';

if(isset($_POST['sign_up'])) {
    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $gender = $_POST["gender"];
    if($gender == 1){ $path = 'img/user_male.png'; }
    if($gender == 2){ $path = 'img/user_female.png'; }
    $age = $_POST["age"];
    $level = $_POST["level"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];
    $role = 3;

    setcookie('last_name', $last_name, time() + 60*5, '/');
    setcookie('first_name', $first_name, time() + 60*5, '/');
    setcookie('gender', $gender, time() + 60*5, '/');
    setcookie('age', $age, time() + 60*5, '/');
    setcookie('level', $level, time() + 60*5, '/');
    setcookie('phone', $phone, time() + 60*5, '/');
    setcookie('email', $email, time() + 60*5, '/');
    setcookie('password', $password, time() + 60*5, '/');


    if($password === $password_confirm) {
        if(isset($_FILES['avatar']['name']) && $_FILES['avatar']['name']){
            if($_FILES['avatar']['type'] ==='image/jpeg'|| $_FILES['avatar']['type'] ==='image/png') {
                date_default_timezone_set('Europe/Moscow');
                $path = 'uploads/' . date("d.m.Y_H-i-s", time()) . '_' . $_FILES['avatar']['name'];
                if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)){
                    $_SESSION['error_upload_avatar'] = "<p>Произошла ошибка при загрузке файла!<br>Попробуйте снова.</p>";
                    header("Location: ../pages/registration.php");
                }
            }
            else{
                $_SESSION['wrong_avatar_extension'] = "<p>Недопустимое расширение файла аватара!<br>Вы можете использовать файлы с расширением .jpg, .jpeg, .png.</p>";
                header("Location: ../pages/registration.php");
            }
        }
        else {
            if($gender == 1){ $path = 'img/user_male.png'; }
            if($gender == 2){ $path = 'img/user_female.png'; }
        }
        $users_count = mysqli_query($connect,"SELECT is_login('$email') as user_cnt") or die(mysqli_error($connect));
        $count = mysqli_fetch_assoc($users_count);
        if($count['user_cnt'] > 0) {
            $_SESSION['error_double_login'] = "<p>Пользователь с таким логином уже существует!<br>Авторизуйтесь или используйте другой логин.</p>";
            header("Location: ../pages/registration.php");
        }
        else {
            if(!isset($_POST["age"]) || $_POST["age"] == null) {
               mysqli_query($connect, "CALL insert_registration_user('$email', '$password', '$role', '$last_name', '$first_name', '$level','$gender', null ,'$phone','$path')") or die(mysqli_error($connect));
            }
            else {
                mysqli_query($connect, "CALL insert_registration_user('$email', '$password', '$role', '$last_name', '$first_name', '$level','$gender','$age','$phone','$path')") or die(mysqli_error($connect));
            }
            setcookie('last_name', $last_name, time() - 1, '/');
            setcookie('first_name', $first_name, time() - 1, '/');
            setcookie('gender', $gender, time() - 1, '/');
            setcookie('age', $age, time() - 1, '/');
            setcookie('level', $level, time() - 1, '/');
            setcookie('phone', $phone, time() - 1, '/');
            setcookie('email', $email, time() - 1, '/');
            setcookie('password', $password, time() - 1, '/');

            $_SESSION['message_successful_signup'] = "<p>Регистрация прошла успешно!</p>";
            header("Location: ../pages/authorization.php");
        }
    }
    else {
        $_SESSION['wrong_password_confirm'] = "<p>Пароли не совпадают!<br>Попробуйте снова.</p>";
        header("Location: ../pages/registration.php");
    }
}




