<?php
session_start();
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    $link = "account.php";
    $name_link = "Мой профиль";
} else {
    $link = "authorization.php";
    $name_link = "Войти";
}
$main_title = "Наши гиды";
$a1 = "<a href='../index.php'>Главная</a>";
$a2 = "<a href='#'>Экскурсионные программы</a>";
$a3 = "<a href='#'>Контакты</a>";
$a4 = "<a href='$link'>$name_link</a>";
$breadcrumbs = "<li><a href='../index.php'>Главная страница</a></li><li>Наши гиды</li>";
$content = "тут будут гиды";
include "template.tpl";


