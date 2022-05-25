<?php
session_start();
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    $link = "account.php";
    $name_link = "Мой профиль";
} else {
    $link = "authorization.php";
    $name_link = "Войти";
}
$image = "";
$description = "";
$specialization_value = "";
include '../includes/location_info.php'
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/index_style.css">
    <title><?= $_GET['location_name'] ?></title>
</head>

<body>

<header class="main-header main-header-inner">
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <a href="../index.php"><img src="../img/logo.png" width="182" height="81" alt="A+"></a>
            </div>
            <nav class="main-menu">
                <ul>
                    <li><a href="../index.php">Главная</a></li>
                    <li><a href="guides.php">Наши гиды</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="<?= $link ?>"><?= $name_link ?></a></li>
                </ul>
            </nav>
        </div>
        <h1 class="page-title">Запись на экскурсию</h1>
        <ul class="breadcrumbs">
            <li><a href="../index.php">Главная страница</a></li>
            <li><a href="regions.php">Экскурсионные программы</a></li>
            <li>
                <a href="locations.php?id=<?= $_GET['region_id'] ?>&name=<?= $_GET['region_name'] ?>"><?= $_GET['region_name'] ?></a>
            </li>
            <li><?= $_GET['location_name'] ?></li>
        </ul>
    </div>
</header>

<div class="container">
    <section class="excursion-info">
        <div class="location-block">
            <h1><?= $_GET['location_name'] ?></h1>
            <div class="location">
                <div class="location-preview">
                    <div class="image">
                        <img src="<?= $image ?>" alt="viborg">
                    </div>
                </div>
                <div class="location-preview">
                    <div class="description">
                        <?= $description ?>
                    </div>
                    <div class="org-block">
                        <p>Тип экскурсии: <span><?= $specialization_value ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="message">
            <?php if (isset($_SESSION['message_excursion_add'])) {
                echo $_SESSION['message_excursion_add'];
                unset($_SESSION['message_excursion_add']);
            }
            ?>
        </div>
        <div class="message">
            <?php if (isset($_SESSION['message_error_user_count'])) {
                echo $_SESSION['message_error_user_count'];
                unset($_SESSION['message_error_user_count']);
            }
            ?>
        </div>
        <div class="message">
            <?php if (isset($_SESSION['message_update_user_record'])) {
                echo $_SESSION['message_update_user_record'];
                unset($_SESSION['message_update_user_record']);
            }
            ?>
        </div>
        <div class="message">
            <?php if (isset($_SESSION['message_successful_user_record'])) {
                echo $_SESSION['message_successful_user_record'];
                unset($_SESSION['message_successful_user_record']);
            }
            ?>
        </div>
        <h1 class="records-title" id="recordings">Дни проведения экскурсии</h1>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin']['role_id'] == 2): ?>
            <a class="add-day popup-link" href="#popup_add_day">Добавить день</a>
        <?php endif; ?>
        <div class="record-block">
            <?php include "../includes/all_excursion_records.php" ?>

        </div>
    </section>
</div>

<footer class="main-footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-address">
                <div class="logo">
                    <img src="../img/logo.png" width="180" height="81" alt="A+">
                </div>
                <p>197101, г. Санкт-Петербург,<br> ул. Куйбышева, 22</p>
            </div>
            <div class="footer-menu-block">
                <div class="footer-menu">
                    <h3>Контактная информация</h3>
                    <ul>
                        <li><a href="#">Контакты</a></li>
                        <li><a href="#">Обратная связь</a></li>
                        <li><a href="#">Отзывы</a></li>
                    </ul>
                </div>
                <div class="footer-menu">
                    <h3>Путешествия</h3>
                    <ul>
                        <li><a href="#">Экскурсии</a></li>
                        <li><a href="#">Расписание</a></li>
                        <li><a href="#">Фотоотчеты</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="copyright">Все права защищены © 2022</div>
            <div class="footer-social-promo">
                Подписчикам в соцсетях — скидки на туры!
                <div class="footer-social">
                    <a href="#" class="social-btn social-btn-vk">Вконтакте</a>
                    <a href="#" class="social-btn social-btn-inst">Фейсбук</a>
                    <a href="#" class="social-btn social-btn-tg">Твиттер</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--<div id="popup" class="popup">
    <div class="popup-body">
        <div class="popup-content">
            <form class='add-user-record' action="../includes/add_excursion_user.php?excursion_id=" method="post">
                <a href="#recordings" class="popup-close close-popup"></a>
                <h1>Запись на экскурсию <?= $_GET['excursion_id'] ?></h1>
                <p>Название: <span>Посещение города Выборг</span></p>
                <p>Дата: <span>22 мая 2022г.</span></p>
                <p>Время: <span>17:00</span></p>
                <p>Гид: <span>Иванов Петр</span></p>
                <p>Уровень: <span>Профессионал</span></p>
                <div class="comment">
                    <h3>Комментарий от гида:</h3>
                    <p>Встреча будет происходить в г. Санкт-Петербург по адресу ул. Садовая 50 (Напротив остановки ТЦ
                        "Европейский")</p>
                </div>
                <div class="divide-line-popup"></div>
                <div class="bottom-popup">
                    <p>Доступные места: <span>10</span> из <span>30</span></p>

                    <label>
                        Количество туристов:<br>
                        <input class="input-form input-popup" name="count" type="number" value=""
                               placeholder="Сколько человек поедет?" onkeypress="return event.charCode >= 48" required>
                    </label><br>
                    <input class="button-form" name="count_users" type="submit" value="Записаться">

                </div>
            </form>
        </div>
    </div>
</div>-->

<div id='popup_add_day' class='popup'>
    <div class='popup-body'>
        <div class='popup-content add-region'>
            <a href='#' class='popup-close close-popup'></a>
            <form class=''
                  action='../includes/add_day.php?location_id=<?= $_GET['location_id'] ?>&location_name=<?= $_GET['location_name'] ?>&region_id=<?= $_GET['region_id'] ?>&region_name=<?= $_GET['region_name'] ?>&guide_id=<?= $_SESSION['admin']['admin_id'] ?>'
                  method='post'>
                <h1>Добавление экскурсии</h1>
                <input class="input-form" type="datetime-local" name="date"
                       placeholder="Дата" value="" required>
                Уровень подготовки:
                <select class="input-form" name="level">
                    <option value="1">Новичок</option>
                    <option value="2">Любитель</option>
                    <option value="3">Профессионал</option>
                </select>
                <textarea class="input-form" name="comment" placeholder="Комментарий (например, о месте встречи)"
                          value=""
                          required></textarea>
                <input class="input-form" type="number" name="price" placeholder="Прайс" value="" required>
                <input class='button-form' name='add-day' type='submit' value='Добавить'>
            </form>
        </div>
    </div>
</div>
<script src="../js/get_id.js"></script>
<script src="../js/popup.js"></script>
</body>
</html>

