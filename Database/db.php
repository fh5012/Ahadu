<?php

session_start();
//   var_dump($_SESSION);

 header('content-type: text/html; charset=uft-8');
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "ahadu";
$DB_charset = "utf8";


try
{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};charset={$DB_charset};",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //  var_dump($DB_con);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

