<?php
require_once 'connection.php';
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
$login = $_POST['login'];
$select = $dbh->prepare('SELECT * FROM users WHERE login = :login');
$select->execute(array(':login' => $login));
$result = $select->fetchAll(PDO::FETCH_ASSOC);

$response = [
    "login"=>$result[0]['login'],
    "name" =>$result[0]['name'],
    "surname" =>$result[0]['surname'],
    "lastname" =>$result[0]['lastname'],
    "date" =>$result[0]['date'],
    "city" =>$result[0]['city'],
    "email" =>$result[0]['email'],
    "avatar" =>$result[0]['avatar'],
];
echo json_encode($response);