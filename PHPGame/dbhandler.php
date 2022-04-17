<?php
$connection = mysqli_connect('remotemysql.com', 'HrrNNJwBdl', 'knGB5HVa0j');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'HrrNNJwBdl');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
//Remove mysqli_connect_error() when released. Otherwise you are prone to SQL injection (hacking).
?>