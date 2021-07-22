<?php
session_start();
require_once 'connection.php';
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
$login = strip_tags($_POST['login']);
if(isset($_SESSION['admin'])){
    $delete = $dbh->prepare('DELETE FROM users WHERE login = :login');
    $delete->execute(array(':login' => $login));
    if($delete->rowCount()>0){
        $response = [
            "status"=>1,
            "message"=>"Аккаунт - " . $login . " был успешно удален !"
        ];
        echo json_encode($response);
    }
    else{
        $response = [
            "status"=>2,
            "result"=>"При удалении произошла ошибка  ! "
        ];
        echo json_encode($response);
    }
}

