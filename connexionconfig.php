<?php
// try
// {
//     $access=new pdo("mysql:host=localhost; dbname=leboncoin; charset=utf8","root","");
// }catch(Exception $e)
// {
//     $e->getMessage();
  
//  } 

// 


$host = "localhost";
$dbname = "LeboncoinM2L";
$srv_username = "root";
$port = "8888";
$srv_password = "root";

try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8;", $srv_username, $srv_password);
} catch (PDOException $e) {
    die("Erreur !: " . $e->getMessage());
}?>