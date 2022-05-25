<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/index_style.css">
    <title>Мой профиль</title>
</head>

<?php if (isset($_SESSION['user']) || isset($_SESSION['admin'])): ?>
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
                        <li><a href="regions.php">Экскурсионные программы</a></li>
                        <li><a href="guides.php">Наши гиды</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </nav>
            </div>
            <h1 class="page-title">Мой профиль</h1>
            <ul class="breadcrumbs">
                <li><a href="../index.php">Главная страница</a></li>
                <li>Мой профиль</li>
            </ul>
        </div>
    </header>
    <div class="container">

        <!-------------------- USER ACCOUNT ---------------------->

        <?php if (isset($_SESSION['user'])): ?>
            <section class="top_account_block">
                <div class="account">
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
                        <?php if (isset($_SESSION['error_double_login'])) {
                            echo $_SESSION['error_double_login'];
                            unset($_SESSION['error_double_login']);
                        }
                        ?>
                    </div>
                    <div class="message">
                        <?php if (isset($_SESSION['message_successful_update'])) {
                            echo $_SESSION['message_successful_update'];
                            unset($_SESSION['message_successful_update']);
                        }
                        ?>
                    </div>
                    <div class="user-icon">
                        <img src="<?= '../' . $_SESSION['user']['avatar'] ?>">

                    </div>
                    <div class="user-form">
                        <table>
                            <tr>
                                <td class="title">Фамилия:</td>
                                <td class="field"><?= $_SESSION['user']['last_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="title">Имя:</td>
                                <td class="field"><?= $_SESSION['user']['first_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="title">Возраст:</td>
                                <td class="field">
                                    <?php
                                    if (!isset($_SESSION['user']['age']) || $_SESSION['user']['age'] == null) {
                                        echo "<p class='empty'>не указан</p>";
                                    } else {
                                        echo $_SESSION['user']['age'] . " лет";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="title">Пол:</td>
                                <td class="field"><?= $_SESSION['user']['gender'] ?></td>
                            </tr>
                            <tr>
                                <td class="title">Уровень подготовки:</td>
                                <td class="field"><?= $_SESSION['user']['level'] ?></td>
                            </tr>
                            <tr>
                                <td class="title">Почта:</td>
                                <td class="field"><?= $_SESSION['user']['email'] ?></td>
                            </tr>

                            <tr>
                                <td class="title">Телефон:</td>
                                <td class="field"><?= $_SESSION['user']['phone'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="#popup_2" class="account-update popup-link">Редактировать профиль</a>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </section>
            <section class="bottom_account_block">
                <table class="all-user-excursion">
                    <tr>
                        <td class="title">Планируемые экскурсии:</td>
                        <td class="field">
                            <?php include "../includes/all_user_excursion_future.php"?>
                        </td>
                    </tr>
                    <tr>
                        <td class="title">Прошедшие экскурсии:</td>
                        <td class="field">
                            <?php include "../includes/all_user_excursion_last.php"?>
                        </td>
                    </tr>
                </table>
                <div class="button_block">
                    <a href="../includes/logout.php">Выйти из профиля</a>
                    <a href="#popup" class="popup-link">Удалить аккаунт</a>
                </div>
            </section>

        <?php endif; ?>
        <!-------------------- ADMIN ACCOUNT ---------------------->
        <?php if (isset($_SESSION['admin'])): ?>
            <section id="start_account" class="top_account_block">
                <div class="account">
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
                        <?php if (isset($_SESSION['error_double_login'])) {
                            echo $_SESSION['error_double_login'];
                            unset($_SESSION['error_double_login']);
                        }
                        ?>
                    </div>
                    <div class="message">
                        <?php if (isset($_SESSION['message_successful_update'])) {
                            echo $_SESSION['message_successful_update'];
                            unset($_SESSION['message_successful_update']);
                        }
                        ?>
                    </div>
                    <div class="user-icon">
                        <img src="<?= '../' . $_SESSION['admin']['avatar'] ?>">

                    </div>
                    <div class="user-form">
                        <table>
                            <tr>
                                <td class="title">Роль:</td>
                                <td class="field"><?= $_SESSION['admin']['role'] ?></td>
                            </tr>
                            <tr>
                                <td class="title">Фамилия:</td>
                                <td class="field"><?= $_SESSION['admin']['last_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="title">Имя:</td>
                                <td class="field"><?= $_SESSION['admin']['first_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="title">Отчество:</td>
                                <td class="field">
                                    <?php
                                    if (!isset($_SESSION['admin']['patronymic']) || $_SESSION['admin']['patronymic'] == null) {
                                        echo "<p class='empty'>не указан</p>";
                                    } else {
                                        echo $_SESSION['admin']['patronymic'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="title">Паспорт:</td>
                                <td class="field">
                                    <?php
                                    if (!isset($_SESSION['admin']['passport']) || $_SESSION['admin']['passport'] == null) {
                                        echo "<p class='empty'>не указан</p>";
                                    } else {
                                        echo $_SESSION['admin']['passport'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="title">Уровень подготовки:</td>
                                <td class="field"><?= $_SESSION['admin']['level'] ?></td>
                            </tr>
                            <tr>
                                <td class="title">Почта:</td>
                                <td class="field"><?= $_SESSION['admin']['email'] ?></td>
                            </tr>

                            <tr>
                                <td class="title">Телефон:</td>
                                <td class="field"><?= $_SESSION['admin']['phone'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="#popup_2" class="account-update popup-link">Редактировать профиль</a>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="button_block">
                        <a href="../includes/logout.php">Выйти из профиля</a>
                    </div>
                </div>
            </section>

            <!---------------ONLY GUIDES------------->
            <?php if ($_SESSION['admin']['role_id'] == 2): ?>
                <section class="bottom_account_block">
                    <table class="all-user-excursion">
                        <tr>
                            <td class="title">Планируемые экскурсии:</td>
                            <td class="field">
                                <?php include "../includes/all_guide_excursion_future.php" ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Прошедшие экскурсии:</td>
                            <td class="field">
                                <?php include "../includes/all_guide_excursion_last.php" ?>
                            </td>
                        </tr>
                    </table>

                </section>
            <?php endif; ?>
            <!---------------ONLY ADMINS------------->
            <?php if ($_SESSION['admin']['role_id'] == 1): ?>
                <section class="all-users bottom_account_block">
                    <h1>Пользователи сайта</h1>
                    <table class="all-users-table">
                        <tr>
                            <td>Аватар</td>
                            <td>Имя</td>
                            <td>Email</td>
                            <td>Телефон</td>
                            <td>Паспорт</td>
                            <td>Уровень</td>
                            <td>Роль</td>
                        </tr>
                        <?php include "../includes/all_uses_table.php" ?>
                    </table>
                </section>

            <?php endif; ?>
        <?php endif; ?>
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

    <!-------POPUP DELETE------->
    <!----FOR USERS----->
    <?php if (isset($_SESSION['user'])) : ?>
    <div id="popup" class="popup">
        <div class="popup-body">
            <div class="popup-content popup-delete">
                <a href="#" class="popup-close close-popup"></a>
                <form action="../includes/delete_account.php" method="post">
                    <h3>Вы уверены, что хотите удалить аккаунт?</h3>
                    <p>Все данные о вас будут удалены без возможности восстановления. Записи на экскурсии
                        аннулируются.</p>
                    <input class="button-form" name="delete_user" type="submit" value="Да">
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!----FOR ADMINS----->
    <?php if (isset($_SESSION['admin'])): ?>
    <div id="popup" class="popup">
        <div class="popup-body">
            <div class="popup-content popup-delete">
                <a href="#" class="popup-close close-popup"></a>
                <h3>Вы уверены, что хотите удалить этот аккаунт?</h3>
                <p>Все данные о пользователе будут удалены без возможности восстановления. Его на экскурсии
                    аннулируются.</p>
                <a class="delete-get-id button-delete" href="../includes/delete_account_by_admin.php?id=">Да</a>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-------POPUP UPDATE------->
    <!----FOR USERS----->
    <?php if (isset($_SESSION['user'])) : ?>
        <div id="popup_2" class="popup">
            <div class="popup-body">
                <div class="popup-content">
                    <a href="#" class="popup-close close-popup"></a>
                    <h1>Редактирование данных</h1>
                    <form action="../includes/update_account_user.php" method="post" enctype="multipart/form-data">
                        <div class="authorization-form update-form">
                            <input class="input-form" name="last_name" type="text"
                                   value="<?= $_SESSION['user']['last_name'] ?>" placeholder="Фамилия" required><br>
                            <input class="input-form" name="first_name" type="text"
                                   value="<?= $_SESSION['user']['first_name'] ?>" placeholder="Имя" required><br>

                            <div class="radio-item">
                                <input class="input-radio" name="gender" type="radio" value="1"
                                       id="male" <?php if ($_SESSION['user']['gender_id'] == 1) echo "checked" ?>>
                                <label class="label-radio" for="male">Мужчина</label>
                            </div>
                            <div class="radio-item">
                                <input class="input-radio" name="gender" type="radio" value="2"
                                       id="female" <?php if ($_SESSION['user']['gender_id'] == 2) echo "checked" ?>>
                                <label class="label-radio" for="female">Женщина</label>
                            </div>
                            <input class="input-form" name="age" type="number" value="<?= $_SESSION['user']['age'] ?>"
                                   placeholder="Возраст"><br>
                            <label>
                                Уровень подготовки:
                                <select class="input-form" name="level">
                                    <option <?php if ($_SESSION['user']['level_id'] == 1) echo "selected" ?> value="1">
                                        Новичок
                                    </option>
                                    <option <?php if ($_SESSION['user']['level_id'] == 2) echo "selected" ?>
                                            value="2">Любитель
                                    </option>
                                    <option <?php if ($_SESSION['user']['level_id'] == 3) echo "selected" ?>
                                            value="3">Профессионал
                                    </option>
                                </select>
                            </label>

                            <input id="delete_avatar" class="checkbox_input" name="delete_avatar" type="checkbox"
                                   value="">
                            <label for="delete_avatar" class="checkbox_label">Удалить аватар</label><br>

                            <label>
                                Изменить аватар:
                                <input class="input-form input-form-file" name="new_avatar" type="file" value="">
                            </label>

                            <input class="input-form" name="phone" type="number"
                                   value="<?= $_SESSION['user']['phone'] ?>"
                                   onkeypress="return event.charCode >= 48" placeholder="Мобильный телефон"
                                   required><br>
                            <input class="input-form" name="email" type="email"
                                   value="<?= $_SESSION['user']['email'] ?>"
                                   placeholder="Email" required><br>
                            <input class="input-form update-button" name="update-info" type="submit"
                                   value="Обновить"><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!----FOR ADMINS----->
    <?php if (isset($_SESSION['admin'])): ?>
        <div id="popup_2" class="popup">
            <div class="popup-body">
                <div class="popup-content">
                    <a href="#" class="popup-close close-popup"></a>
                    <h1>Редактирование данных</h1>
                    <form action="../includes/update_account_admin.php" method="post" enctype="multipart/form-data">
                        <div class="authorization-form update-form">
                            <input class="input-form" name="last_name" type="text"
                                   value="<?= $_SESSION['admin']['last_name'] ?>" placeholder="Фамилия" required><br>
                            <input class="input-form" name="first_name" type="text"
                                   value="<?= $_SESSION['admin']['first_name'] ?>" placeholder="Имя" required><br>
                            <input class="input-form" name="patronymic" type="text"
                                   value="<?= $_SESSION['admin']['patronymic'] ?>" placeholder="Отчество"><br>
                            <input class="input-form" name="passport" type="number"
                                   value="<?= $_SESSION['admin']['passport'] ?>"
                                   onkeypress="return event.charCode >= 48" placeholder="Паспорт"><br>

                            <label>
                                Уровень подготовки:
                                <select class="input-form" name="level">
                                    <option <?php if ($_SESSION['admin']['level_id'] == 1) echo "selected" ?> value="1">
                                        Новичок
                                    </option>
                                    <option <?php if ($_SESSION['admin']['level_id'] == 2) echo "selected" ?>
                                            value="2">Любитель
                                    </option>
                                    <option <?php if ($_SESSION['admin']['level_id'] == 3) echo "selected" ?>
                                            value="3">Профессионал
                                    </option>
                                </select>
                            </label>

                            <input id="delete_avatar" class="checkbox_input" name="delete_avatar" type="checkbox"
                                   value="">
                            <label for="delete_avatar" class="checkbox_label">Удалить аватар</label><br>

                            <label>
                                Изменить аватар:
                                <input class="input-form input-form-file" name="new_avatar" type="file" value="">
                            </label>

                            <input class="input-form" name="phone" type="number"
                                   value="<?= $_SESSION['admin']['phone'] ?>"
                                   onkeypress="return event.charCode >= 48" placeholder="Мобильный телефон"
                                   required><br>
                            <input class="input-form" name="email" type="email"
                                   value="<?= $_SESSION['admin']['email'] ?>"
                                   placeholder="Email" required><br>
                            <input class="input-form update-button" name="update-info" type="submit"
                                   value="Обновить"><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!---------EDIT BY ADMIN------>
    <div id='popup_3' class='popup'>
        <div class='popup-body'>
            <div class='popup-content popup-delete'>
                <a href='#' class='popup-close close-popup'></a>
                <form class='edit-get-id' action='../includes/edit_role.php?id=' method='post'>
                    <h3>Изменить роль?</h3>
                    <select class='input-form' name='role'>
                        <option value='1'>Администратор</option>
                        <option value='2'>Гид</option>
                    </select>
                    <input class='button-form' name='edit_role' type='submit' value='Сохранить'>
                </form>
            </div>
        </div>
    </div>
    <!---------AFTER DELETE------->
    <?php if (isset($_SESSION['message_delete_user'])): ?>
        <div id="popup" class="popup open">
            <div class="popup-body">
                <div class="popup-content popup-delete">
                    <a href="#" class="popup-close close-popup"></a>
                    <h3><?= $_SESSION['message_delete_user'] ?></h3>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['message_delete_user']); endif; ?>
    <script src="../js/get_id.js"></script>
    <script src="../js/popup.js"></script>
    </body>
<?php endif; ?>
</html>

