<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="apple-touch-icon" sizes="57x57" href="../profile_favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../profile_favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../profile_favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../profile_favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../profile_favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../profile_favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../profile_favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../profile_favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../profile_favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../profile_favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../profile_favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../profile_favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../profile_favicon/favicon-16x16.png">
    <link rel="manifest" href="../profile_favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
        <div class="head">
            <ul>
                <li class="personal">Персональная страница - <?= $_SESSION['user']['login']?></li>
                <li>
                    <a>Изменить данные</a>
                        <ul>
                            <li><a href="change_login.php">Логин</a></li>
                            <li><a href="change_password.php">Пароль</a></li>
                        </ul>
                </li>
                <li><a href="change_data.php">Редактировать профиль</a></li>
                <li><a href="logout.php">Выйти</a></li>
            </ul>
        </div>

    <div class="info">
        <div class="img">
            <img src="../<?= $_SESSION['user']['avatar'] ?>" style="width: 350px; height: 350px;" alt="">
            <p class="status">Пользователь</p>
        </div>
        <table class="table">
            <tr>
                <td id="leftcol">Имя</td>
                <td id="rightcol"><?= $_SESSION['user']['name']?></td>
            </tr>
            <tr>
                <td id="leftcol">Фамилия</td>
                <td id="rightcol"><?= $_SESSION['user']['surname']?></td>
            </tr>
            <tr>
                <td id="leftcol">Отчество</td>
                <td id="rightcol"><?= $_SESSION['user']['lastname']?></td>
            </tr>
            <tr>
                <td id="leftcol">Дата рождения</td>
                <td id="rightcol"><?= $_SESSION['user']['date']?></td>
            </tr>
            <tr>
                <td id="leftcol">Родной город</td>
                <td id="rightcol"><?= $_SESSION['user']['city']?></td>
            </tr>
            <tr>
                <td id="leftcol">E-mail</td>
                <td id="rightcol"><?= $_SESSION['user']['email']?></td>
            </tr>
        </table>
    </div>

</body>
</html>