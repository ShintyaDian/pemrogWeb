<?php
	//ambil data dari formulir
	$name = $_POST['nama'];

	//koneksi ke database
	$conn = new mysqli("localhost", "root", "", "tugasform");
    $result = $conn -> query("SELECT * FROM form WHERE nama='$name'");
    $row = $result ->fetch_assoc();
    $foto = $row['foto'];

	//periksa koneksi
	if ($conn -> connect_error) {
		die("Koneksi gagal: " . $conn -> connect_error);
	}

	//hapus tamu menurut nama
	$sql = "DELETE FROM form WHERE nama='$name'";
    if (file_exists("listFoto/$foto")) {
        unlink("listFoto/$foto");
    }

	if ($conn -> query($sql) === true) {
		echo "Data anggota dengan nama '$name' berhasil dihapus";
        echo "<br/>";
        echo "<h3><a href='hapus.php'>Kembali</a> <a href='tampil.php'>Tampilkan</a></h3>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<h3><a href='hapus.php'>Kembali</a>";
	}

	//tutup koneksi
	$conn->close();
?>