<?php
$dsn = 'mysql:dbname=team4;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try{
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '接続に成功しています';

}catch (PDOException $e){
    print('Connection failed:'.$e->getMessage());
    die();
}
?>