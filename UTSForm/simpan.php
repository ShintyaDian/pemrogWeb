<?php
	//ambil data dari formulir
	$nama = $_POST['nama'];
	$nik = $_POST['nik'];
	$alamat = $_POST['alamat'];
    $tempatLahir = $_POST['tempatLahir'];
    $gender = $_POST['gender'];
    $tglLahir = $_POST['tgl'];
    $blnLahir = $_POST['bln'];
    $thnLahir = $_POST['thn'];
    $pekerjaan = $_POST['pekerjaan'];
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, 'listFoto/'.$foto);

	//koneksi ke database
	$conn = new mysqli("localhost", "root", "", "tugasForm");

	//periksa koneksi
	if ($conn -> connect_error) {
		die("Koneksi gagal: " . $conn -> connect_error);
	}

	//masukkan data ke database
	$sql = "INSERT INTO form (nama, nik, alamat, tempatLahir, gender, tglLahir, blnLahir, thnLahir, pekerjaanOrtu, foto) VALUES ('$nama', '$nik', '$alamat', '$tempatLahir', '$gender', '$tglLahir', '$blnLahir', '$thnLahir', '$pekerjaan', '$foto')";

	if ($conn -> query($sql) === true) {
		echo "Pesan berhasil ditambahkan";
        echo "<br/>";
        echo "<h3><a href='formBiodata.php'>Tambah Anggota</a> <a href='tampil.php'>Tampilkan</a></h3>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<h3><a href='formBiodata.php'>Kembali</a>";
	}

	//tutup koneksi
	$conn->close();

	exit();
?>