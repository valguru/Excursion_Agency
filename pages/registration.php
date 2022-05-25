<?php
session_start();
$last_name = "";
$first_name = "";
$gender = "";
$age = "";
$level = "";
$phone = "";
$email = "";
$password = "";

if(isset($_COOKIE['last_name'])) $last_name = $_COOKIE['last_name'];
if(isset($_COOKIE['first_name'])) $first_name = $_COOKIE['first_name'];
if(isset($_COOKIE['gender'])) $gender = $_COOKIE['gender'];
if(isset($_COOKIE['age'])) $age = $_COOKIE['age'];
if(isset($_COOKIE['level'])) $level = $_COOKIE['level'];
if(isset($_COOKIE['phone'])) $phone = $_COOKIE['phone'];
if(isset($_COOKIE['email'])) $email = $_COOKIE['email'];
if(isset($_COOKIE['password'])) $password = $_COOKIE['password'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/index_style.css">
    <title>Регистрация</title>
</head>

<?php if(!isset($_SESSION['user'])):?>
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
        <h1 class="page-title">Регистрация</h1>
        <ul class="breadcrumbs">
            <li><a href="../index.php">Главная страница</a></li>
            <li>Регистрация</li>
        </ul>
    </div>
</header>

<div class="container">
    <div class="authorization">
        <div class="message">
            <?php if (isset($_SESSION['wrong_password_confirm'])) {
                echo $_SESSION['wrong_password_confirm'];
                unset($_SESSION['wrong_password_confirm']);
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
            <?php if (isset($_SESSION['error_upload_avatar'])) {
                echo $_SESSION['error_upload_avatar'];
                unset($_SESSION['error_upload_avatar']);
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

        <form action="../includes/signup.php" method="post" enctype="multipart/form-data">
            <div class="authorization-form">
                <input class="input-form" name="last_name" type="text" value="<?= $last_name ?>" placeholder="Фамилия" required><br>
                <input class="input-form" name="first_name" type="text" value="<?= $first_name ?>" placeholder="Имя" required><br>

                <div class="radio-item">
                    <input class="input-radio" name="gender" type="radio" value="1" id="male" checked <?php if($gender == 1) echo 'checked'; ?>>
                    <label class="label-radio" for="male">Мужчина</label>
                </div>
                <div class="radio-item">
                    <input class="input-radio" name="gender" type="radio" value="2" id="female" <?php if($gender == 2) echo 'checked'; ?>>
                    <label class="label-radio" for="female">Женщина</label>
                </div>
                <input class="input-form" name="age" type="number" value="<?= $age ?>" placeholder="Возраст">
                <label>
                    Уровень подготовки:
                    <select class="input-form" name="level">
                        <option value="1" <?php if($level == 1) echo 'selected'; ?>>Новичок</option>
                        <option value="2" <?php if($level == 2) echo 'selected'; ?>>Любитель</option>
                        <option value="3" <?php if($level == 3) echo 'selected'; ?>>Профессионал</option>
                    </select>
                </label>

                <label>
                    Загрузите аватар:
                    <input class="input-form input-form-file" name="avatar" type="file" value="">
                </label>

                <input class="input-form" name="phone" type="number" value="<?= $phone ?>" onkeypress="return event.charCode >= 48" placeholder="Мобильный телефон"
                       required><br>
                <input class="input-form" name="email" type="email" value="<?= $email ?>" placeholder="Email" required><br>
                <input class="input-form" name="password" type="password" value="<?= $password ?>"
                       placeholder="Пароль" required><br>
                <input class="input-form" name="password_confirm" type="password" value=""
                       placeholder="Повторите пароль" required><br>
                <input class="input-form" name="sign_up" type="submit" value="Зарегистрироваться"><br>
                <a href="authorization.php">Уже зарегистрированы?</a>
            </div>
        </form>
    </div>
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
</body>
<?php endif; ?>
</html>
