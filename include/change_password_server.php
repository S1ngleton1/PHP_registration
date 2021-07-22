<?php
session_start();
require_once 'connection.php';
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");

$old_password = strip_tags($_POST['old-password']);
$new_password = strip_tags($_POST['new-password']);
$password_confirm = strip_tags($_POST['password-confirm']);

$error_fields = [];
if ($old_password === '') {
    $error_fields[] = 'old-password';
}

if ($new_password === '') {
    $error_fields[] = 'new-password';
}

if ($password_confirm === '') {
    $error_fields[] = 'password-confirm';
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
    $old_password = md5($old_password);
    $check_password = $dbh->prepare('SELECT password FROM users WHERE login = :login AND password = :password');
    $check_password->execute(array(':login' => $_SESSION['admin']['login'], ':password' => $old_password));
    $result = $check_password->fetchAll(PDO::FETCH_ASSOC);
    if($old_password === $result[0]['password']){
        if($new_password ===$password_confirm){
            $new_password = md5($new_password);
            $update_password = $dbh->prepare('UPDATE users SET password = :new_password WHERE password = :old_password AND login = :login');
            $update_password->execute(array(':new_password' => $new_password, ':old_password' => $old_password,':login'=>$_SESSION['admin']['login']));
            $response = [
                "status" => true,
                "message" => "Пароль успешно изменен, переход на страницу профиля через : "
            ];
            echo json_encode($response);
        }
        else{
            $response = [
                "status" => false,
                "message" => "Пароли не совпадают"
            ];
            echo json_encode($response);
        }
    }
    else{
        $response = [
            "status"=>false,
            "type" =>1,
            "message" => "Не верно введен старый пароль !",
            "fields"=>['old-password']

        ];
        echo json_encode($response);
        die();
    }
}


if(isset($_SESSION['user'])){
    $old_password = md5($old_password);
    $check_password = $dbh->prepare('SELECT password FROM users WHERE login = :login AND password = :password');
    $check_password->execute(array(':login' => $_SESSION['user']['login'], ':password' => $old_password));
    $result = $check_password->fetchAll(PDO::FETCH_ASSOC);
    if($old_password === $result[0]['password']){
        if($new_password ===$password_confirm){
            $new_password = md5($new_password);
            $update_password = $dbh->prepare('UPDATE users SET password = :new_password WHERE password = :old_password AND login = :login');
            $update_password->execute(array(':new_password' => $new_password, ':old_password' => $old_password,':login'=>$_SESSION['user']['login']));
            $response = [
                "status" => true,
                "message" => "Пароль успешно изменен, переход на страницу профиля через : "
            ];
            echo json_encode($response);
        }
        else{
            $response = [
                "status" => false,
                "message" => "Пароли не совпадают"
            ];
            echo json_encode($response);
        }
    }
    else{
        $response = [
            "status"=>false,
            "type" =>1,
            "message" => "Не верно введен старый пароль !",
            "fields"=>['old-password']

        ];
        echo json_encode($response);
        die();
    }
}