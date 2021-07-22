<?php
session_start();
require_once 'connection.php';
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");

$old_login = strip_tags($_POST['old-login']);
$new_login = strip_tags($_POST['new-login']);

$error_fields = [];

if ($old_login === '') {
    $error_fields[] = 'old-login';
}

if ($new_login === '') {
    $error_fields[] = 'new-login';
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
if(isset($_SESSION['admin'])){
    $check_login = $dbh->prepare('SELECT login FROM users WHERE login = :login');
    $check_login->execute(array(':login' => $_SESSION['admin']['login']));
    $result = $check_login->fetchAll(PDO::FETCH_ASSOC);
    if($old_login === $result[0]['login']){
        $check_new_login = $dbh->prepare('SELECT * FROM users WHERE login = :login');
        $check_new_login->execute(array(':login' => $new_login));
        if($check_new_login->rowCount() > 0){
            $response = [
                "status"=>false,
                "type" =>1,
                "message" => "Такой логин уже существует",
                "fields" =>['new-login']
            ];
            echo json_encode($response,JSON_UNESCAPED_UNICODE);
            die();
        }
        else {
            $check_new_login = $dbh->prepare('UPDATE users SET login = :new_login WHERE login = :old_login');
            $check_new_login->execute(array(':new_login' => $new_login, ':old_login' => $_SESSION['admin']['login']));
            $_SESSION['admin']['login'] = $new_login;
            $response = [
                "status" => true,
                "message" => "Данные успешно изменены, переход на страницу профиля через : "
            ];
            echo json_encode($response);
        }
    }
    else{
        $response = [
            "status"=>false,
            "message" => "Не верный логин !",
            "fields"=>['old-login']

        ];
        echo json_encode($response);
        die();
    }
}

if(isset($_SESSION['user'])){
    $check_login = $dbh->prepare('SELECT login FROM users WHERE login = :login');
    $check_login->execute(array(':login' => $_SESSION['user']['login']));
    $result = $check_login->fetchAll(PDO::FETCH_ASSOC);
    if($old_login === $result[0]['login']){
        $check_new_login = $dbh->prepare('SELECT * FROM users WHERE login = :login');
        $check_new_login->execute(array(':login' => $new_login));
        if($check_new_login->rowCount() > 0){
            $response = [
                "status"=>false,
                "type" =>1,
                "message" => "Такой логин уже существует",
                "fields" =>['new-login']
            ];
            echo json_encode($response,JSON_UNESCAPED_UNICODE);
            die();
        }
        else {
            $check_new_login = $dbh->prepare('UPDATE users SET login = :new_login WHERE login = :old_login');
            $check_new_login->execute(array(':new_login' => $new_login, ':old_login' => $_SESSION['user']['login']));
            $_SESSION['user']['login'] = $new_login;
            $response = [
                "status" => true,
                "message" => "Данные успешно изменены, переход на страницу профиля через : "
            ];
            echo json_encode($response);
        }
    }
    else{
        $response = [
            "status"=>false,
            "message" => "Не верный логин !",
            "fields"=>['old-login']

        ];
        echo json_encode($response);
        die();
    }
}
