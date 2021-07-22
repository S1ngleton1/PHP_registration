<?php
session_start();
require_once 'connection.php';
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");

$name = strip_tags($_POST['new-name']);
$surname = strip_tags($_POST['new-surname']);
$lastname = strip_tags($_POST['new-lastname']);
$date = strip_tags($_POST['new-date']);
$email = strip_tags($_POST['new-email']);
$city = strip_tags($_POST['new-city']);
if($date!==''){
    $keywords  = preg_split("/[\s-,]+/", $date);
    $date = $keywords[2]."-".$keywords[1]."-".$keywords[0];
}
if(isset($_SESSION['admin'])){
    if($email !== ''){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $check_email = $dbh->prepare('SELECT * FROM users WHERE email = :email');
            $check_email->execute(array(':email' => $email));
            if($check_email->rowCount() > 0){
                $response = [
                    "status"=>false,
                    "type" =>1,
                    "message" => "Такая почта уже существует",
                    "fields" =>"new-email"
                ];
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                die();
            }
            else {
                $check_email = $dbh->prepare('UPDATE users SET email = :email WHERE login = :login');
                $check_email->execute(array(':email' => $email, ':login' => $_SESSION['admin']['login']));
                $_SESSION['admin']['email'] = $email;
                $response = [
                    "status" => true,
                    "message" => "Данные успешно изменены, переход на страницу профиля через : "
                ];
//            echo json_encode($response);
            }
//    die();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//else{
            $response = [
                "status"=>false,
                "type" =>1,
                "message" => "Не верный E-mail !",
                "fields"=>"new-email"
            ];
            echo json_encode($response);
            die();
        }
    }
    if(isset($_FILES['new-avatar'])){
        $path = 'images/'.time(). $_FILES['new-avatar']['name'];
        if(!move_uploaded_file($_FILES['new-avatar']['tmp_name'], '../'. $path)){
            $response = [
                "status"=>false,
                "type" =>2,
                "message" => 'Ошибка при загрузки изображения',
            ];
            echo json_encode($response);
        }
        $update_avatar = $dbh->prepare('UPDATE users SET avatar = :avatar WHERE login = :login');
        $update_avatar->execute(array(':avatar'=>$path,':login'=>$_SESSION['admin']['login']));
        $_SESSION['admin']['avatar'] = $path;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
    }
    if ($name !== '') {
        $check_name = $dbh->prepare('UPDATE users SET name = :name WHERE login = :login');
        $check_name->execute(array(':name' => $name, ':login'=>$_SESSION['admin']['login']));
        $_SESSION['admin']['name'] = $name;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//        echo json_encode($response,JSON_UNESCAPED_UNICODE);
//    die();
    }
    if ($surname !== '') {
        $check_surname = $dbh->prepare('UPDATE users SET surname = :surname WHERE login = :login');
        $check_surname->execute(array(':surname' => $surname, ':login'=>$_SESSION['admin']['login']));
        $_SESSION['admin']['surname'] = $surname;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//    echo json_encode($response,JSON_UNESCAPED_UNICODE);
//    die();
    }
    if ($lastname !== '') {
        $check_lastname = $dbh->prepare('UPDATE users SET lastname = :lastname WHERE login = :login');
        $check_lastname->execute(array(':lastname' => $lastname, ':login'=>$_SESSION['admin']['login']));
        $_SESSION['admin']['lastname'] = $lastname;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//    echo json_encode($response,JSON_UNESCAPED_UNICODE);
//    die();
    }
    if ($date !== '') {
        $check_date = $dbh->prepare('UPDATE users SET date = :date WHERE login = :login');
        $check_date->execute(array(':date' => $date, ':login'=>$_SESSION['admin']['login']));
        $_SESSION['admin']['date'] = $date;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//    echo json_encode($response);
//    die();
    }
    if ($city !== '') {
        $check_city = $dbh->prepare('UPDATE users SET city = :city WHERE login = :login');
        $check_city->execute(array(':city' => $city, ':login'=>$_SESSION['admin']['login']));
        $_SESSION['admin']['city'] = $city;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//    echo json_encode($response);
//    die();
    }
//if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {

    if($response === null){
        $response = [
            "status"=>false,
            "type" =>2,
            "message" => "Вы ничего не ввели!"
        ];
        echo json_encode($response);
    }
    else{
        echo json_encode($response);
    }
}



if(isset($_SESSION['user'])){
    if($email !== ''){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $check_email = $dbh->prepare('SELECT * FROM users WHERE email = :email');
            $check_email->execute(array(':email' => $email));
            if($check_email->rowCount() > 0){
                $response = [
                    "status"=>false,
                    "type" =>1,
                    "message" => "Такая почта уже существует",
                    "fields" =>"new-email"
                ];
                echo json_encode($response,JSON_UNESCAPED_UNICODE);
                die();
            }
            else {
                $check_email = $dbh->prepare('UPDATE users SET email = :email WHERE login = :login');
                $check_email->execute(array(':email' => $email, ':login' => $_SESSION['user']['login']));
                $_SESSION['user']['email'] = $email;
                $response = [
                    "status" => true,
                    "message" => "Данные успешно изменены, переход на страницу профиля через : "
                ];
//            echo json_encode($response);
            }
//    die();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//else{
            $response = [
                "status"=>false,
                "type" =>1,
                "message" => "Не верный E-mail !",
                "fields"=>"new-email"
            ];
            echo json_encode($response);
            die();
        }
    }
    if(isset($_FILES['new-avatar'])){
        $path = 'images/'.time(). $_FILES['new-avatar']['name'];
        if(!move_uploaded_file($_FILES['new-avatar']['tmp_name'], '../'. $path)){
            $response = [
                "status"=>false,
                "type" =>2,
                "message" => 'Ошибка при загрузки изображения',
            ];
            echo json_encode($response);
        }
        $update_avatar = $dbh->prepare('UPDATE users SET avatar = :avatar WHERE login = :login');
        $update_avatar->execute(array(':avatar'=>$path,':login'=>$_SESSION['user']['login']));
        $_SESSION['user']['avatar'] = $path;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
    }
    if ($name !== '') {
        $check_name = $dbh->prepare('UPDATE users SET name = :name WHERE login = :login');
        $check_name->execute(array(':name' => $name, ':login'=>$_SESSION['user']['login']));
        $_SESSION['user']['name'] = $name;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//        echo json_encode($response,JSON_UNESCAPED_UNICODE);
//    die();
    }
    if ($surname !== '') {
        $check_surname = $dbh->prepare('UPDATE users SET surname = :surname WHERE login = :login');
        $check_surname->execute(array(':surname' => $surname, ':login'=>$_SESSION['user']['login']));
        $_SESSION['user']['surname'] = $surname;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//    echo json_encode($response,JSON_UNESCAPED_UNICODE);
//    die();
    }
    if ($lastname !== '') {
        $check_lastname = $dbh->prepare('UPDATE users SET lastname = :lastname WHERE login = :login');
        $check_lastname->execute(array(':lastname' => $lastname, ':login'=>$_SESSION['user']['login']));
        $_SESSION['user']['lastname'] = $lastname;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//    echo json_encode($response,JSON_UNESCAPED_UNICODE);
//    die();
    }
    if ($date !== '') {
        $check_date = $dbh->prepare('UPDATE users SET date = :date WHERE login = :login');
        $check_date->execute(array(':date' => $date, ':login'=>$_SESSION['user']['login']));
        $_SESSION['user']['date'] = $date;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//    echo json_encode($response);
//    die();
    }
    if ($city !== '') {
        $check_city = $dbh->prepare('UPDATE users SET city = :city WHERE login = :login');
        $check_city->execute(array(':city' => $city, ':login'=>$_SESSION['user']['login']));
        $_SESSION['user']['city'] = $city;
        $response = [
            "status"=>true,
            "message" => "Данные успешно изменены, переход на страницу профиля через : "
        ];
//    echo json_encode($response);
//    die();
    }
//if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {

    if($response === null){
        $response = [
            "status"=>false,
            "type" =>2,
            "message" => "Вы ничего не ввели!"
        ];
        echo json_encode($response);
    }
    else{
        echo json_encode($response);
    }
}