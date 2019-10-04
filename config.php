<?php

$server = 'localhost';
$host	= 'root';
$password = '';
$database = 'project_php';

$connect = mysqli_connect($server, $host, $password, $database);

if(mysqli_connect_errno()){
	echo "Koneksi database gagal : ". mysqli_connect_error();
}

?>