<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/index_style.css">
    <title><?= $main_title ?></title>
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
                    <li><?= $a1 ?></li>
                    <li><?= $a2 ?></li>
                    <li><?= $a3 ?></li>
                    <li><?= $a4 ?></li>
                </ul>
            </nav>
        </div>
        <h1 class="page-title"><?= $main_title ?></h1>
        <ul class="breadcrumbs">
            <?= $breadcrumbs ?>
        </ul>
    </div>
</header>

<div class="container">
 <?= $content ?>
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
</html>

