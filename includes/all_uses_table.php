<?php
$connect = "";

include 'connectdb.php';
if (isset($_SESSION['admin']) && $_SESSION['admin']['role_id'] == 1) {
    $email = $_SESSION['admin']['email'];
    $result = mysqli_query($connect, "CALL all_users_table('$email')") or die(mysqli_error($connect));
    while ($row = $result->fetch_assoc())// получаем все строки в цикле по одной
    {
        $reg_id = $row['registration_id'];
        $avatar = '../' . $row['avatar'];
        $last_name = $row['last_name'];
        $first_name = $row['first_name'];
        $patronymic = $row['patronymic'];
        $email = $row['email'];
        $phone = $row['phone'];
        $passport = $row['passport'];
        if ($passport == null) $passport = "<p class='empty'>не указан</p>";
        $level = $row['level'];
        $role = $row['role'];
        $role_id = $row['role_id'];

        echo "<tr>
                  <td><div class='avatar'><img src='$avatar'></div></td>
                  <td>$last_name<br>$first_name<br>$patronymic</td>
                  <td>$email</td>
                  <td>$phone</td>
                  <td>$passport</td>
                  <td>$level</td>
                  <td>$role</td>
                  <td><a href='#popup'  class='popup-link' onclick='delete_get_id($reg_id,$role_id)'><div class='icon delete'></div></a></td>
                  
                  <td><a href='#popup_3' class='popup-link' onclick='edit_get_id($reg_id,$role_id)'><div class='icon edit'></div></a></td>
                  
              </tr>
              ";
    }
}

