<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Изменение пароля</title>
    <link rel="stylesheet" href="../css/change_data.css">
    <link rel="apple-touch-icon" sizes="57x57" href="../changedata_favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../changedata_favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../changedata_favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../changedata_favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../changedata_favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../changedata_favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../changedata_favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../changedata_favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../changedata_favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../changedata_favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../changedata_favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../changedata_favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../changedata_favicon/favicon-16x16.png">
    <link rel="manifest" href="../changedata_favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../js/change_password.js"></script>
</head>
<body>
<div>
    <label>Старый пароль</label>
    <input type="password" id="old-password" placeholder="Введите свой старый пароль">
    <label>Новый пароль</label>
    <input type="password" id="new-password" placeholder="Введите новый пароль">
    <label>Повторите пароль</label>
    <input type="password" id="password-confirm" placeholder="Подтвердите пароль">
    <span class="choice">
            <input type="button" class="btn" id="btn" value="Изменить" onclick="change()">
            <a href="profile.php" id="cancel">Отмена</a>
        </span>
    <p id="msg" class="msg none">Some Error</p>
</div>
</body>
</html>