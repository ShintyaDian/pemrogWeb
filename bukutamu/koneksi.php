<?php

// function open_connection()
// {	$host="localhost";
// 	$username="root";
// 	$password="";
// 	$databasename="dataku";
// 	$link=mysql_connect($host,$username,$password) or die 
// 	("Database 	tidak dapat dihubungan!");
// 	mysql_Select_db($databasename,$link);
// 	return $link;
// }

	//ambil data dari formulir
	$name = $_POST['nama'];
	$email = $_POST['email'];
	$message = $_POST['komentar'];

	//koneksi ke database
	$conn = new mysqli("localhost", "root", "", "dataku");

	//periksa koneksi
	if ($conn -> connect_error) {
		die("Koneksi gagal: " . $conn -> connect_error);
	}

	//masukkan data ke database
	$sql = "INSERT INTO guestbook (name, email, message) VALUES ('$name', '$email', '$message')";

	if ($conn -> query($sql) === true) {
		echo "Pesan berhasil ditambahkan";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	//tutup koneksi
	$conn->close();

	exit();
?>