<?php 
// getting connected the details to connect to dataBase
$host= "localhost";
$user = "root";
$pass = "";
$dbname="customersbook";
$charset="utf8";

try{
    $dsn  = "mysql: host=".$host."; dbname=".$dbname."; charset=".$charset;
    $pdo = new PDO($dsn , $user , $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
}catch (PDOException $e){
    echo "Connection failed : ".$e->getMessage();
}

?>