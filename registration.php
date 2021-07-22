<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="apple-touch-icon" sizes="57x57" href="signup_favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="signup_favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="signup_favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="signup_favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="signup_favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="signup_favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="signup_favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="signup_favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="signup_favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="signup_favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="signup_favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="signup_favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="signup_favicon/favicon-16x16.png">
    <link rel="manifest" href="signup_favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="css/registration.css">
    <script src="js/registration.js"></script>
</head>
<body>

<div class="div-main">
    <h2>Регистрация</h2>

<div class="container">
    <div class="input-left">
        <label>Имя</label>
        <input type="text" id="name" placeholder="Введите свое имя">
        <label>Фамилия</label>
        <input type="text" id="surname" placeholder="Введите свою фамилию">
        <label>Отчество</label>
        <input type="text" id="lastname" placeholder="Введите свое отчество">
        <label>Дата рождения</label>
        <input type="date" id="date">
        <label>Логин</label>
        <input type="text" id="login" placeholder="Введите свой логин">
    </div>
    <div class="input-right">
        <label>Почта</label>
        <input type="email" id="email" placeholder="Введите свой E-mail">
        <label>Родной город</label>
        <input type="text" id="city" placeholder="Введите свой город">
        <label>Изображение профиля</label>
        <input type="file" id="avatar" onchange="img()">
        <label>Пароль</label>
        <input type="password" id="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" id="password_confirm" placeholder="Подтвердите пароль">
    </div>
</div>
</div>
    <input id="btn" type="button" class="btn" value="Зарегистрироваться" onclick="reg()">
    <div class="margin">
        <p style="color: white" id="remove_p" >
            У Вас уже есть аккаунт?  - <a href="index.php">авторизируйтесь!</a>
        </p>
        <p id="msg" class="msg none">Some Error</p>
    </div>



</body>
</html>