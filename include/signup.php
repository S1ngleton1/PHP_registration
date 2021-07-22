<?php
session_start();
require_once 'connection.php';
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");

$name = strip_tags($_POST['name']);
$surname = strip_tags($_POST['surname']);
$lastname = strip_tags($_POST['lastname']);
$date = strip_tags($_POST['date']);
$login = strip_tags($_POST['login']);
$email = strip_tags($_POST['email']);
$city = strip_tags($_POST['city']);
$avatar = $_FILES['avatar'];
$password = strip_tags($_POST['password']);
$password_confirm = strip_tags($_POST['password_confirm']);
$keywords  = preg_split("/[\s-,]+/", $date);
$date = $keywords[2]."-".$keywords[1]."-".$keywords[0];
$check_login = $dbh->prepare('SELECT * FROM users WHERE login = :login');
$check_login->execute(array(':login' => $login));
if($check_login->rowCount() > 0){
    $response = [
        "status"=>false,
        "type" =>1,
        "message" => "Такой логин уже существует",
        "fields" =>['login']
    ];
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
    die();
}

$check_email = $dbh->prepare('SELECT * FROM users WHERE email = :email');
$check_email->execute(array(':email' => $email));
if($check_email->rowCount() > 0){
    $response = [
        "status"=>false,
        "type" =>1,
        "message" => "Такая почта уже существует",
        "fields" =>['email']
    ];
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
    die();
}

$error_fields = [];

if ($name === '') {
    $error_fields[] = 'name';
}

if ($surname === '') {
    $error_fields[] = 'surname';
}

if ($lastname === '') {
    $error_fields[] = 'lastname';
}

if ($date === '') {
    $error_fields[] = 'date';
}

if ($login === '') {
    $error_fields[] = 'login';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

if ($city === '') {
    $error_fields[] = 'city';
}

if (!$_FILES['avatar']) {
    $error_fields[] = 'avatar';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];
    echo json_encode($response);
    die();
}

if($password===$password_confirm){

    $path = 'images/'.time(). $_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'. $path)){
        $response = [
            "status"=>false,
            "type" =>2,
            "message" => 'Ошибка при загрузки изображения',
        ];
        echo json_encode($response);
    }
    $password = md5($password);
    $sqlInsert = $dbh->prepare("INSERT INTO users (id, name, surname, lastname, login, email, password, avatar, status, date,city)
                  VALUES (NULL, :name, :surname, :lastname, :login, :email, :password, :path, :user, :date, :city )");
    $sqlInsert->execute(array(':name' => $name, ':surname' => $surname, ':lastname' => $lastname,':login' => $login,':email' => $email,':password' => $password,
        ':path' => $path,':user' => "User",':date' => $date,':city' => $city));




//    $sqlInsert = "INSERT INTO `users` (`id`, `name`, `surname`, `lastname`, `login`, `email`, `password`, `avatar`,`status`,`date`,`city`)
//                  VALUES (NULL, '$name', '$surname', '$lastname', '$login', '$email', '$password', '$path', 'User', '$date', '$city' )";
//    $dbh->exec($sqlInsert);
    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно, переход на страницу авторизации через :",
    ];
    echo json_encode($response);


} else {
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают",
    ];
    echo json_encode($response);
}






