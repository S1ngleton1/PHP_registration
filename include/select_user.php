<?php
require_once 'connection.php';
$select = $dbh->prepare('SELECT login FROM users WHERE status = "User"');
$select->execute();
$result = $select->fetchAll(PDO::FETCH_ASSOC);
$array = array();
foreach ($result as $item) {
    $array[]= $item['login'];
}
$_SESSION['user_account'] = $array;