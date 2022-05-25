<?php
session_start();
$connect = "";
include 'connectdb.php';

if (isset($_POST['sign_in'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    setcookie('email', $email, time() + 60*5, '/');
    $_COOKIE['email'] = $email;
    setcookie('password',$password, time() + 60*5, '/');
    $_COOKIE['password'] = $password;


    $users_count = mysqli_query($connect, "SELECT check_user_login('$email','$password') as user_cnt") or die(mysqli_error($connect));
    $count = mysqli_fetch_assoc($users_count);

    if ($count['user_cnt'] > 0) {

        $role = mysqli_query($connect, "SELECT get_role_id('$email') as user_role") or die(mysqli_error($connect));
        $role_id = mysqli_fetch_assoc($role);

        if ($role_id['user_role'] == 3) {
            $user_info = mysqli_query($connect, "SELECT * FROM all_user_info WHERE login = '$email'") or die(mysqli_error($connect));
            $info = mysqli_fetch_assoc($user_info);

            $_SESSION["user"] = [
                'user_id' => $info['user_id'],
                'last_name' => $info['last_name'],
                'first_name' => $info['first_name'],
                'gender_id' => $info['gender_id'],
                'gender' => $info['gender_value'],
                'level_id' => $info['level_id'],
                'level' => $info['level_value'],
                'age' => $info['age'],
                'email' => $info['login'],
                'phone' => $info['phone'],
                'avatar' => $info['avatar'],
                'role_id' => $info['role_id'],
                'role' => $info['role_value']
            ];
        } else {
            $admin_info = mysqli_query($connect, "SELECT * FROM all_admin_info WHERE login = '$email'") or die(mysqli_error($connect));
            $info = mysqli_fetch_assoc($admin_info);

            $_SESSION["admin"] = [
                'admin_id' => $info['admin_id'],
                'last_name' => $info['last_name'],
                'first_name' => $info['first_name'],
                'patronymic' => $info['patronymic'],
                'passport' => $info['passport'],
                'level_id' => $info['level_id'],
                'level' => $info['level_value'],
                'email' => $info['login'],
                'phone' => $info['phone'],
                'avatar' => $info['avatar'],
                'role_id' => $info['role_id'],
                'role' => $info['role_value']
            ];
        }
        setcookie('email', $email, time() - 1, '/');
        setcookie('password',$password, time()  - 1, '/');
        header("Location: ../pages/account.php");

    } else {
        $_SESSION['error_authorization'] = "<p>Логин или пароль неверные!<br>Попробуйте снова или зарегистрируйтесь.</p>";
        header("Location: ../pages/authorization.php");
    }
}


