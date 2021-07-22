<?php
session_start();
if (!$_SESSION['user_account']) {
    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пользователь</title>
    <script src="../js/delete_acc.js"></script>
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
    <link rel="stylesheet" href="../css/show-acc.css">

</head>
<body>
<div class="head">
    <ul>
        <li class="personal">Персональная страница - &nbsp;<p id="user" class="none">qwe</p></li>
        <li class="btn-li">
            <input type="button" class="btn" value="Удалить аккаунт" onclick="delete_acc()">
        </li>
        <li><a href="admin.php" onclick="<?php unset($_SESSION['user_account'])?>">Назад</a></li>
    </ul>
</div>

<div class="info">
    <div class="img">
        <img id="avatar" style="width: 350px; height: 350px">
        <p class="status">Пользователь</p>
    </div>
    <table class="table">
        <tr>
            <td id="leftcol">Имя</td>
            <td id="rightcol" class="name">qeqweqweq</td>
        </tr>
        <tr>
            <td id="leftcol">Фамилия</td>
            <td id="rightcol" class="surname">qeqweqweq</td>
        </tr>
        <tr>
            <td id="leftcol">Отчество</td>
            <td id="rightcol" class="lastname">qeqweqweq</td>
        </tr>
        <tr>
            <td id="leftcol">Дата рождения</td>
            <td id="rightcol" class="date">qeqweqweq</td>
        </tr>
        <tr>
            <td id="leftcol">Родной город</td>
            <td id="rightcol" class="city">qeqweqweq</td>
        </tr>
        <tr>
            <td id="leftcol">E-mail</td>
            <td id="rightcol" class="email">qeqweqweq</td>
        </tr>
    </table>
</div>
<script src="../js/select_user.js"></script>
</body>
</html>
