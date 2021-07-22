<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование данных</title>
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
    <link rel="stylesheet" href="../css/change_data.css">
    <script src="../js/change_data.js"></script>
</head>
<body>
<div>
    <label>Редактировать имя</label>
    <input type="text" id="new-name" placeholder="Введите новое имя">
    <label>Редактировать фамилию</label>
    <input type="text" id="new-surname" placeholder="Введите новую фамилию">
    <label>Редактировать отчество</label>
    <input type="text" id="new-lastname" placeholder="Введите новое отчество">
    <label>Редактировать дату рождения</label>
    <input type="date" id="new-date">
    <label>Редактировать город</label>
    <input type="text" id="new-city" placeholder="Введите новое название">
    <label>Редактировать почту</label>
    <input type="email" id="new-email" placeholder="Введите новый E-mail">
    <label>Редактировать изображение профиля</label>
    <input type="file" id="new-avatar" onchange="new_img()">
    <span class="choice">
            <input type="button" id="btn" class="btn" value="Изменить" onclick="change()">
            <a href="profile.php" id="cancel">Отмена</a>
    </span>
    <p id="msg" class="msg none">Some Error</p>
</div>
</body>
</html>