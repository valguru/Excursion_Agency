<?php
session_start();
$connect = "";
include 'connectdb.php';

if (isset($_POST['edit_role'])) {
    $id = $_GET['id'];
    $role_id = $_GET['role_id'];
    $new_role_id = $_POST['role'];
    echo "id: " . $id . "<br>";
    echo "role_id: " . $role_id . "<br>";

    if ($role_id == 3) {
        $user_info = mysqli_query($connect, "SELECT * FROM all_user_info WHERE registration_id = '$id'") or die(mysqli_error($connect));
        $info = mysqli_fetch_assoc($user_info);
        $all_user_info = [
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

        $avatar = $all_user_info['avatar'];

        if ($avatar == "img/user_male.png" || $avatar == "img/user_female.png") {
            if ($new_role_id == 1) $avatar = "img/admin.png";
            if ($new_role_id == 2) $avatar = "img/guide.png";
        }

        mysqli_query($connect, "CALL delete_user_insert_admin('$id','$new_role_id','$avatar')") or die(mysqli_error($connect));

    } else {
        if ($role_id != $new_role_id) {
            $admin_avatar = mysqli_query($connect, "SELECT avatar FROM all_admin_info WHERE registration_id = '$id'") or die(mysqli_error($connect));
            $avatar = mysqli_fetch_assoc($admin_avatar);
            if($avatar['avatar'] == "img/admin.png" || $avatar['avatar'] == "img/guide.png") {
                if($new_role_id == 1) $avatar = "img/admin.png";
                if($new_role_id == 2) $avatar = "img/guide.png";
            }
            echo $avatar;
            mysqli_query($connect, "CALL edit_one_level_roles('$id','$new_role_id','$avatar')") or die(mysqli_error($connect));
        }
    }
    header("Location: ../pages/account.php");

}