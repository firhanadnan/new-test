<?php

//aktifkan session
session_start();

//panggil file koneksi
include 'config.php';

//get data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

//seleksi data user
$login = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

//periksa db
$cek = mysqli_num_rows($login);

if($cek > 0){
	
	$data = mysqli_fetch_assoc($login);

	//user admin
	if($data['level'] === 'admin'){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = 'admin';

		header('location:halaman_admin.php');
	} else if ($data['level'] === 'pegawai'){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = 'pegawai';

		header('location:halaman_admin.php');
	} else {
		header('location:login.php?pesan=gagal');
	}	
}

?>