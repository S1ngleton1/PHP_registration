<?php
session_start();
if ($_SESSION['user']) {
    header('Location: include/profile.php');
}
if ($_SESSION['admin']) {
    header('Location: include/admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="apple-touch-icon" sizes="57x57" href="login_favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="login_favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="login_favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="login_favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="login_favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="login_favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="login_favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="login_favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="login_favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="login_favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="login_favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="login_favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="login_favicons/favicon-16x16.png">
    <link rel="manifest" href="login_favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="login_favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/copy_main.css">
<!--    <link rel="stylesheet" href="css/main.css">-->
    <script src="js/main.js"></script>
</head>
<body>
<div class = "main_container">
    <div class="container">
        <h1 style="color: white">Авторизация</h1>
    </div>
    <div class="div-input">
        <input type="text" id="login" placeholder="Введите свой логин/ E-mail">
        <input type="password" id="password" placeholder="Введите пароль">
    </div>
    <div class="div-btn-p">
        <input type="button" class="btn" value="Войти" onclick="SignIn()">
        <p style="color: white">
            У Вас еще нет аккаунта? - <a href="registration.php">зарегистрируйтесь!</a>
        </p>
        <p id="msg" class="msg none">Some Error</p>
    </div>
<!--    <h2>Авторизация</h2>-->
<!---->
<!--    <div class="input">-->
<!--        <input type="text" id="login" placeholder="Введите свой логин/ E-mail">-->
<!--        <input type="password" id="password" placeholder="Введите пароль">-->
<!--    </div>-->
<!--    <input type="button" class="btn" value="Войти" onclick="SignIn()">-->
<!--    <div class="margin">-->
<!--        <p style="color: white">-->
<!--            У Вас еще нет аккаунта? - <a href="registration.php">зарегистрируйтесь!</a>-->
<!--        </p>-->
<!--        <p id="msg" class="msg none">Some Error</p>-->
<!--    </div>-->
</div>

<!--    <div class="container">-->
<!--        <div class="input">-->
<!--            <input type="text" id="login" placeholder="Введите свой логин/ E-mail">-->
<!--            <input type="password" id="password" placeholder="Введите пароль">-->
<!--        </div>-->
<!--        <input type="button" class="btn" value="Войти" onclick="SignIn()">-->
<!--        <div class="margin">-->
<!--            <p style="color: white">-->
<!--                У Вас еще нет аккаунта? - <a href="registration.php">зарегистрируйтесь!</a>-->
<!--            </p>-->
<!--            <p id="msg" class="msg none">Some Error</p>-->
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->
</body>
</html>