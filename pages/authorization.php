<?php
session_start();
$email = "";
$password = "";
if(isset($_COOKIE['email'])) $email = $_COOKIE['email'];
if(isset($_COOKIE['password'])) $password = $_COOKIE['password'];
?>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/index_style.css">
    <title>Авторизация</title>
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
        <h1 class="page-title">Авторизация</h1>
        <ul class="breadcrumbs">
            <li><a href="../index.php">Главная страница</a></li>
            <li>Авторизация</li>
        </ul>
    </div>
</header>

<div class="container">
    <div class="authorization">
        <div class="message">
            <?php if (isset($_SESSION['error_authorization'])) {
                echo $_SESSION['error_authorization'];
                unset($_SESSION['error_authorization']);
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
        <form action="../includes/signin.php" method="post">
            <div class="authorization-form">
                <input class="input-form" name="email" type="email" value="<?= $email ?>" placeholder="Email" required><br>
                <input class="input-form" name="password" type="password" value="<?= $password ?>"
                       placeholder="Пароль" required><br>
                <input class="input-form" name="sign_in" type="submit" value="Войти"><br>
                <a href="#">Забыли пароль?</a>
                <a href="registration.php">Регистрация</a>
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
