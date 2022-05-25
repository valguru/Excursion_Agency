<?php
$connect = "";
include "connectdb.php";
$host = 'localhost';
$db = 'web_project';
$user = 'root';
$password = 'vertrigo';

//PDO
try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    $pdo = new PDO($dsn, $user, $password);
    //$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $pdo->exec("set names utf8");
} catch (PDOException $e) {
    echo $e->getMessage();
};
if (isset($_GET['location_id'])) {
    $location_id = $_GET['location_id'];
    $location_name = $_GET['location_name'];
    $region_id = $_GET['region_id'];
    $region_name = $_GET['region_name'];

    $sql = "CALL all_excursion_in_location('$location_id')";
    $result = $pdo->prepare($sql);
    $result->execute();

    while ($row = $result->fetch()) {
        $location_id = $row['location_id'];
        $excursion_id = $row['excursion_id'];
        setlocale(LC_TIME, 'ru_RU.utf8');
        $date = date('d.m.Y', strtotime($row['date']));
        $time = date('H:i', strtotime($row['date']));
        $last_name = $row['last_name'];
        $first_name = $row['first_name'];
        $patronymic = $row['patronymic'];
        $avatar = '../' . $row['avatar'];
        $level_id = $row['level_id'];
        $level_value = $row['level_value'];
        $price = $row['price'];
        $guide_id = $row['guide_id'];
        $comment = $row['comment'];
        $guide_name = $last_name . ' ' . $first_name . ' ' .$patronymic;

        echo "<div class='record-item'>
                <h1>$date<br>$time</h1>
                <p>Гид:</p>
                <div class='guide-info'>
                    <div class='image'>
                        <img src='$avatar'>
                    </div>
                    <p>$last_name<br>$first_name<br>$patronymic</p>
                </div>
                <p>Уровень: <span>$level_value</span></p>
                <p>Стоимость: <span>$price</span> рублей</p>";
        if (isset($_SESSION['user'])) {
            echo "<a href='#popup$excursion_id' class='popup-link record-link'>Записаться</a>";
        }
        if (isset($_SESSION['admin']) && $_SESSION['admin']['role_id'] == 2 && $_SESSION['admin']['admin_id'] == $guide_id) {
            echo "<div class='edit-links-block'>
                <a href='#popup_delete' class='popup-link' ><div class='icon delete'></div></a>
                <a href='#popup_edit' class='popup-link'><div class='icon edit'></div></a>
            </div>";
        }
        echo "</div>";

        $occupied_places = mysqli_query($connect, "SELECT occupied_places('$excursion_id') AS occupied") or die(mysqli_error($connect));
        $places = mysqli_fetch_assoc($occupied_places);
        $occupied_places = $places['occupied'];
        $free_places = 30 - $occupied_places;

        //popups for users
        echo "<div id='popup$excursion_id' class='popup'>
                   <div class='popup-body'>
                        <div class='popup-content'>
                            <form class='add-user-record' action='../includes/add_excursion_user.php?excursion_id=$excursion_id&location_id=$location_id&location_name=$location_name&region_id=$region_id&region_name=$region_name&free_places=$free_places&date=$date&time=$time&guide_name=$guide_name' method='post'>
                                <a href='#recordings' class='popup-close close-popup'></a>
                                <h1>Запись на экскурсию </h1>
                                <p>Название: <span>$location_name</span></p>
                                <p>Дата: <span>$date</span></p>
                                <p>Время: <span>$time</span></p>
                                <p>Гид: <span>$last_name $first_name $patronymic</span></p>
                                <p>Уровень: <span>$level_value</span></p>
                                <div class='comment'>
                                    <h3>Комментарий от гида:</h3>
                                    <p>$comment</p>
                                </div>
                                <div class='divide-line-popup'></div>
                                <div class='bottom-popup'>
                                    <p>Доступные места: <span>$free_places</span> из <span>30</span></p>
                                    <label>
                                        Количество туристов:<br>
                                        <input class='input-form input-popup' name='count' type='number' min='1' value=''
                                               placeholder='Сколько человек поедет?' onkeypress='return event.charCode >= 48' required>
                                    </label><br>
                                    <input class='button-form' name='count_users' type='submit' value='Записаться'>
                                </div>
                            </form>
                        </div>
                   </div>
              </div>";
    }
    $pdo = null;
}

/*$connect = "";
include 'connectdb.php';
$is_admin = false;
if (isset($_SESSION['admin'])) $is_admin = true;

if (isset($_GET['location_id'])) {
    $location_id = $_GET['location_id'];
    $location_name = $_GET['location_name'];
    $region_id = $_GET['region_id'];
    $region_name = $_GET['region_name'];

    $result = mysqli_query($connect, "CALL all_excursion_in_location('$location_id')") or die(mysqli_error($connect));

    while ($row = $result->fetch_assoc()) {
        $location_id = $row['location_id'];
        $excursion_id = $row['excursion_id'];
        setlocale(LC_TIME, 'ru_RU.utf8');
        $date = date('d.m.Y', strtotime($row['date']));
        $time = date('H:i', strtotime($row['date']));
        $last_name = $row['last_name'];
        $first_name = $row['first_name'];
        $patronymic = $row['patronymic'];
        $avatar = '../' . $row['avatar'];
        $level_id = $row['level_id'];
        $level_value = $row['level_value'];
        $price = $row['price'];
        $guide_id = $row['guide_id'];
        $comment = $row['comment'];

        echo "<div class='record-item'>
                <h1>$date<br>$time</h1>
                <p>Гид:</p>
                <div class='guide-info'>
                    <div class='image'>
                        <img src='$avatar'>
                    </div>
                    <p>$last_name<br>$first_name<br>$patronymic</p>
                </div>
                <p>Уровень: <span>$level_value</span></p>
                <p>Стоимость: <span>$price</span> рублей</p>";
        if (isset($_SESSION['user'])) {
            echo "<a href='#popup$excursion_id' class='popup-link record-link'>Записаться</a>";
        }
        if (isset($_SESSION['admin']) && $_SESSION['admin']['role_id'] == 2 && $_SESSION['admin']['admin_id'] == $guide_id) {
            echo "<div class='edit-links-block'>
                <a href='#popup_delete' class='popup-link' ><div class='icon delete'></div></a>
                <a href='#popup_edit' class='popup-link'><div class='icon edit'></div></a>
            </div>";
        }
        echo "</div>";


        $occupied_places = mysqli_query($connect, "SELECT occupied_places('$excursion_id') AS occupied") or die(mysqli_error($connect));
        $places = mysqli_fetch_assoc($occupied_places);
        $occupied_places = $places['occupied'];
        $free_places = 30 - $occupied_places;



        //popups for users
        echo "<div id='popup$excursion_id' class='popup'>
                   <div class='popup-body'>
                        <div class='popup-content'>
                            <form class='add-user-record' action='../includes/add_excursion_user.php?excursion_id=$excursion_id&location_id=$location_id&location_name=$location_name&region_id=$region_id&region_name=$region_name' method='post'>
                                <a href='#recordings' class='popup-close close-popup'></a>
                                <h1>Запись на экскурсию </h1>
                                <p>Название: <span>$location_name</span></p>
                                <p>Дата: <span>$date</span></p>
                                <p>Время: <span>$time</span></p>
                                <p>Гид: <span>$last_name $first_name $patronymic</span></p>
                                <p>Уровень: <span>$level_value</span></p>
                                <div class='comment'>
                                    <h3>Комментарий от гида:</h3>
                                    <p>$comment</p>
                                </div>
                                <div class='divide-line-popup'></div>
                                <div class='bottom-popup'>
                                    <p>Доступные места: <span>$free_places</span> из <span>30</span></p>
                                    <label>
                                        Количество туристов:<br>
                                        <input class='input-form input-popup' name='count' type='number' value=''
                                               placeholder='Сколько человек поедет?' onkeypress='return event.charCode >= 48' required>
                                    </label><br>
                                    <input class='button-form' name='count_users' type='submit' value='Записаться'>
                                </div>
                            </form>
                        </div>
                   </div>
              </div>";
    }
}*/


