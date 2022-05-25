<?php
session_start();
$connect = "";
$path = "";
include 'connectdb.php';

if (isset($_POST['count_users'])) {
    include '../phpmailer/PHPMailer.php';
    include '../phpmailer/SMTP.php';
    include '../phpmailer/Exception.php';

    $excursion_id = $_GET['excursion_id'];
    $location_id = $_GET['location_id'];
    $location_name = $_GET['location_name'];
    $region_id = $_GET['region_id'];
    $region_name = $_GET['region_name'];
    $user_id = $_SESSION['user']['user_id'];
    $user_count = $_POST['count'];
    $free_places = $_GET['free_places'];
    $first_name = $_SESSION['user']['first_name'];
    $email = $_SESSION['user']['email'];
    $guide_name = $_GET['guide_name'];
    $date = $_GET['date'];
    $time = $_GET['time'];


    if ($user_count > $free_places) {
        $_SESSION['message_error_user_count'] = "<p>К сожалению мы не можем принять на эту экскурсию столько человек. Измените количество или выберете другую дату.</p>";
        header("Location: ../pages/excursion_record.php?location_id=$location_id&location_name=" . urlencode($location_name) . "&region_id=$region_id&region_name=" . urlencode($region_name));
    } else {


        $is_exist = mysqli_query($connect, "SELECT is_user_excursion_exist('$user_id','$excursion_id') AS count") or die(mysqli_error($connect));
        $result = mysqli_fetch_assoc($is_exist);
        $is_exist = $result['count'];

        if ($is_exist > 0) {
            mysqli_query($connect, "CALL update_user_excursion('$user_id','$excursion_id','$user_count')") or die(mysqli_error($connect));
            $_SESSION['message_update_user_record'] = "<p>Вы ранее уже записывались на эту экскурсию. Данные о количестве человек перезаписаны на новые.</p>";
        } else {
            mysqli_query($connect, "CALL insert_user_excursion('$user_id','$excursion_id','$user_count')") or die(mysqli_error($connect));
        }
        date_default_timezone_set('Europe/Moscow');
        $filename = "../uploads/Экскурсия_" . date("d.m.Y_H-i-s", time()) . "_" . $first_name . ".txt";
        $text = "
    Уважаемый(ая), $first_name
    
    Вы записаны на экскурсию '$location_name' в количестве $user_count человек.
    Она состоится $date в $time.
    Проведет экскурсию $guide_name.
    
    Хорошего отдыха!";

        $fp = fopen("$filename", "w");
        fwrite($fp, $text);
        fclose($fp);

        $to = "<$email>";
        $title = "Запись на экскурсию '$location_name'";

        $headers = "Content-type: text/html; charset=windows-1251 \r\n";
        $headers .= "From: От кого письмо <from@example.com>\r\n";
        $headers .= "Reply-To: reply-to@example.com\r\n";

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        try {
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth = true;
            $mail->Debugoutput = function ($str, $level) {
                $GLOBALS['status'][] = $str;
            };

            $mail->Host = 'smtp.gmail.com';
            $mail->Username = 'spectrumrrr@gmail.com';
            $mail->Password = 'ycwwnzpmjiznwlve';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('spectrumrrr@gmail.com', 'Лучшие путешествия с Elite Travel');

            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $title;

            $mail->Body = "<pre>$text</pre>";

            if ($mail->send()) {
                $result = "success";
            } else {
                $result = "error";
            }
        } catch (Exception $e) {
            $result = "error";
            $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
        }

        $_SESSION['message_successful_user_record'] = "<p>Вы успешно записались на экскурсию! Напоминание отправлено на почту $email. Также можете скачать его в <a href='$filename' download=''>этом файле</a></p>";
        header("Location: ../pages/excursion_record.php?location_id=$location_id&location_name=" . urlencode($location_name) . "&region_id=$region_id&region_name=" . urlencode($region_name));
    }
}
