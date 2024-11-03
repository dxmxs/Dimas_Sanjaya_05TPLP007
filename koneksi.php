<?php
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_karyawan";
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn){
  die("connection failed" . mysqli_connect_error());
}

?>