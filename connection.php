<?php

$servername="localhost"; 
$databaseUsername="root";
$databasePassword="";
$databaseName="tipszmix";

$connection=new mysqli($servername, $databaseUsername, $databasePassword, $databaseName);
if($connection->connect_error === TRUE)
{
    die("Connection Error:".$connection->connect_error);
}
?>

