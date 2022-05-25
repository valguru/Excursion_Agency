<?php
session_start();
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    $link = "pages/account.php";
    $name_link = "Мой профиль";
} else {
    $link = "pages/authorization.php";
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
    <link rel="stylesheet" href="css/index_style.css">
    <title>Elite Travel</title>
</head>

<body>

<header class="main-header">
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <img src="img/logo.png" width="182" height="81" alt="Elite Travel">
            </div>
            <nav class="main-menu">
                <ul>
                    <li><a href="pages/regions.php">Экскурсионные программы</a></li>
                    <li><a href="pages/guides.php">Наши гиды</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="<?= $link ?>"><?= $name_link ?></a></li>
                </ul>
            </nav>
        </div>
        <div class="promo">
            <div class="promo-block info">
                <div class="promo-title">Путешествовать еще никогда не было так просто!</div>
                <p>Помогаем увидеть самые прекрасные и удивительные места необъятной России. Только наши экскурсоводы
                    покажут вам город таким, каким его видят коренные жители, а природу в ее первозданном виде.</p>
                <a href="pages/regions.php" class="btn btn-brown">Оставить заявку</a>
            </div>
            <div class="promo-block" id="promo-photo">

            </div>
        </div>
    </div>
</header>

<section class="features">
    <div class="container">
        <div class="features-item">
            <div class="features-icon features-icon-schedule"></div>
            <h2 class="features-title">Лучшие локации</h2>
            <p>Наша цель показать вам самые лучшие и интересные места на любой вкус</p>
        </div>
        <div class="features-item">
            <div class="features-icon features-icon-practice"></div>
            <h2 class="features-title">Опытные гиды</h2>
            <p>Наши гиды проведут вас в самые интересные места и все расскажут.</p>
        </div>
        <div class="features-item">
            <div class="features-icon features-icon-work"></div>
            <h2 class="features-title">Не оставим без эмоций</h2>
            <p>Главная цель путешествия - радостные эмоции. С нами вы без них точно не останетесь.</p>
        </div>
    </div>
</section>

<section class="feedback">
    <div class="container">
        <h2 class="feedback-title">Отзывы клиентов</h2>
        <a href="#" class="feedback-all">Показать все</a>
        <div class="feedback-item">
            <div class="feedback-author">
                <img src="img/user_male.png" width="133" height="133" alt="Иванов Петр">
                <h3>Иванов<br>Петр</h3>
                <p>20.07.2021</p>
            </div>
            <blockquote class="feedback-content">
                <h3>Обзорный тур по Москве</h3>
                <p>Во время обучения было очень интересно, Экскурсовод показал все достопримечательности, которые
                    хотелось бы увидеть. Если решу куда-то поехать, обязательно обращусь к вам! Поездкой очень
                    доволен!</p>
            </blockquote>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="container">
        <h2 class="contacts-title">Обратная связь</h2>
        <form class="contacts-form" action="" method="post">
            <table>
                <tr>
                    <td class="title">
                        <label for="fullname">Имя:</label>
                    </td>
                    <td class="field">
                        <input type="text" id="fullname" name="fullname" placeholder="Представьтесь, пожалуйста">
                    </td>
                </tr>
                <tr>
                    <td class="title">
                        <label for="age">Телефон:</label>
                    </td>
                    <td class="field">
                        <input type="text" id="age" name="age" placeholder="Укажите номер телефона для связи с вами">
                    </td>
                </tr>
                <tr>
                    <td class="title">
                        <label for="message">Вопрос:</label>
                    </td>
                    <td class="field">
                        <textarea id="message" name="message"
                                  placeholder="Сообщите все, что считаете нужным"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="title"></td>
                    <td class="field">
                        <input type="submit" class="btn btn-brown" value="Отправить">
                    </td>
                </tr>
            </table>
        </form>
        <div class="contacts-instruction">
            <h3>Заинтересовались экскурсионной программой или есть вопросы?</h3>
            <p>Заполните короткую форму обратной связи и отправьте нам.</p>
            <p>Мы подготовим для вас ответ и выйдем на связь!</p>
            <p class="contacts-alert"><strong>Внимание!</strong> Все поля обязательны для заполнения.</p>
        </div>
    </div>
</section>
<!--<a href="#popup" class="popup-link">popup</a>-->
<footer class="main-footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-address">
                <div class="logo">
                    <img src="img/logo.png" width="180" height="81" alt="A+">
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

<script src="js/popup.js"></script>
<script src="js/animation.js"></script>
</body>
</html>
