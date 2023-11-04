<?php
	//ambil data dari formulir
	$name = $_POST['name'];

	//koneksi ke database
	$conn = new mysqli("localhost", "root", "", "dataku");

	//periksa koneksi
	if ($conn -> connect_error) {
		die("Koneksi gagal: " . $conn -> connect_error);
	}

	//hapus tamu menurut nama
	$sql = "DELETE FROM guestbook WHERE name='$name'";

	if ($conn -> query($sql) === true) {
		echo "Data tamu dengan nama '$name' berhasil dihapus";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	//tutup koneksi
	$conn->close();
?>