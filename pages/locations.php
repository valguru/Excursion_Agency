<?php
session_start();
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    $link = "account.php";
    $name_link = "Мой профиль";
} else {
    $link = "authorization.php";
    $name_link = "Войти";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/index_style.css">
    <title><?= $_GET['name'] ?></title>
</head>

<body>
<?php if (isset($_GET['id'])): ?>
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
            <h1 class="page-title"><?= $_GET['name'] ?></h1>
            <ul class="breadcrumbs">
                <li><a href="../index.php">Главная страница</a></li>
                <li><a href="regions.php">Экскурсионные программы</a></li>
                <li><?= $_GET['name'] ?></li>
            </ul>
        </div>
    </header>

    <div class="container">
        <section class="region-list">
            <div class="message">
                <?php if (isset($_SESSION['error_upload_avatar'])) {
                    echo $_SESSION['error_upload_avatar'];
                    unset($_SESSION['error_upload_avatar']);
                }
                ?>
            </div>
            <div class="message">
                <?php if (isset($_SESSION['wrong_avatar_extension'])) {
                    echo $_SESSION['wrong_avatar_extension'];
                    unset($_SESSION['wrong_avatar_extension']);
                }
                ?>
            </div>
            <div class="message">
                <?php if (isset($_SESSION['message_successful_signup'])) {
                    echo $_SESSION['message_successful_signup'];
                    unset($_SESSION['message_successful_signup']);
                }
                ?>
            </div>
            <div class="message">
                <?php if (isset($_SESSION['message_delete_location'])) {
                    echo $_SESSION['message_delete_location'];
                    unset($_SESSION['message_delete_location']);
                }
                ?>
            </div>
            <?php if (isset($_SESSION['admin'])): ?>
                <a class="add-button popup-link" href="#popup"><p>Добавить локацию</p></a>
            <?php endif; ?>
            <?php include "../includes/all_locations.php" ?>
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

    <div id='popup' class='popup'>
        <div class='popup-body'>
            <div class='popup-content add-region'>
                <a href='#' class='popup-close close-popup'></a>
                <form class='' action='../includes/add_location.php?id=<?= $_GET['id'] ?>&name=<?= $_GET['name'] ?>' method='post'
                      enctype="multipart/form-data">
                    <h1>Добавление локации в регион <?= $_GET['name'] ?></h1>
                    <input class="input-form" type="text" name="name" placeholder="Название локации" value="" required>
                    <textarea class="input-form" name="description" placeholder="Описание локации" value=""
                              required></textarea>
                    <input class="input-form input-form-file" type="file" name="image" value="">
                    <label>
                        Тип локации:
                        <select class='input-form' name='specialization'>
                            <option value='1'>Городская</option>
                            <option value='2'>Пригородная</option>
                        </select>
                    </label>
                    <input class='button-form' name='add-location' type='submit' value='Добавить'>
                </form>
            </div>
        </div>
    </div>

    <div id="popup_delete" class="popup">
        <div class="popup-body">
            <div class="popup-content popup-delete">
                <a href="#" class="popup-close close-popup"></a>
                <h3>Вы уверены, что хотите удалить эту локацию?</h3>
                <p>Записаться на экскурсии в данной локации больше будет невозможно. Запланированные экскурсии сохранятся.</p>
                <a class="delete-location-get-id button-delete" href="../includes/delete_location.php?id=">Да</a>
            </div>
        </div>
    </div>

    <div id='popup_edit' class='popup'>
        <div class='popup-body'>
            <div class='popup-content add-region'>
                <a href='#' class='popup-close close-popup'></a>
                <form class='edit-location-get-id' action='../includes/edit_location.php?id=' method='post'>
                    <h1>Редактирование локации</h1>
                    <input class="input-form" type="text" name="name" placeholder="Название локации" value="" required>
                    <textarea class="input-form" name="description" placeholder="Описание локации" value=""
                              required></textarea>
                    <input class="input-form input-form-file" type="file" name="image" value="">
                    <label>
                        Тип локации:
                        <select class='input-form' name='specialization'>
                            <option value='1'>Городская</option>
                            <option value='2'>Пригородная</option>
                        </select>
                    </label>
                    <input class='button-form' name='edit-location' type='submit' value='Сохранить'>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/get_id.js"></script>
    <script src="../js/popup.js"></script>
<?php endif; ?>
</body>
</html>
