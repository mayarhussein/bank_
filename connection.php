<?php ob_start();      
$db["db_host"]='localhost';
$db["db_username"]='root';
$db["db_password"]='';
$db["db_name"]='bank1';

foreach($db as $key => $value)
define(strtoupper($key),$value);  


$connection =mysqli_connect(
       DB_HOST,
       DB_USERNAME,
       DB_PASSWORD,
       DB_NAME);


if(!$connection)
   die("Not Connected!");

   ?>