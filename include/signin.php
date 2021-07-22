<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
session_start();
require_once 'connection.php';
$login = strip_tags($_REQUEST['login']);
$password = strip_tags($_REQUEST['password']);

$error_fields = [];

if ($login === '') {
    $error_fields[] = 'login';
}

if ($password === '') {
    $error_fields[] = 'password';
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
$password = md5($password);
$check_user = $dbh->prepare("SELECT * FROM users where (login = :login AND password = :password) 
                                        OR (email = :login AND password = :password)");
$check_user->execute(array(':login' => $login, ':password' => $password));
$row = $check_user->rowCount();
$user = $check_user->fetchAll(PDO::FETCH_ASSOC);
if ($row > 0) {
    if ($user[0]['status'] === "User") {
        $_SESSION['user'] = [
            "id" => $user[0]['id'],
            "name" => $user[0]['name'],
            "surname" => $user[0]['surname'],
            "lastname" => $user[0]['lastname'],
            "login" => $user[0]['login'],
            "email" => $user[0]['email'],
            "avatar" => $user[0]['avatar'],
            "date" => $user[0]['date'],
            "city" => $user[0]['city']
        ];
        $response = [
            "status" => true,
            "person" => "User"
        ];
        echo json_encode($response);
    } else if ($user[0]['status'] === "Admin") {
        $_SESSION['admin'] = [
            "id" => $user[0]['id'],
            "name" => $user[0]['name'],
            "surname" => $user[0]['surname'],
            "lastname" => $user[0]['lastname'],
            "login" => $user[0]['login'],
            "email" => $user[0]['email'],
            "avatar" => $user[0]['avatar'],
            "date" => $user[0]['date'],
            "city" => $user[0]['city']
        ];
        $response = [
            "status" => true,
            "person" => "Admin"
        ];
        echo json_encode($response);
    }
}
else {

    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];

    echo json_encode($response);
}
