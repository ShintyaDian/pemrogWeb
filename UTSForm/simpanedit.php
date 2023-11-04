<?php
// Ambil data dari formulir edit
$id = $_POST['id'];
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$tempatLahir = $_POST['tempatLahir'];
$gender = $_POST['gender'];
$tglLahir = $_POST['tgl'];
$blnLahir = $_POST['bln'];
$thnLahir = $_POST['thn'];
$pekerjaan = $_POST['pekerjaan'];

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "tugasform");
// Periksa koneksi
if ($conn->connect_error) {
die("Koneksi gagal: " . $conn->connect_error);
}
// Update data tamu berdasarkan id
$sql = "UPDATE form SET nama='$nama', nik='$nik', alamat='$alamat', tempatLahir='$tempatLahir', gender='$gender', tglLahir='$tglLahir', blnLahir='$blnLahir', thnLahir='$thnLahir', pekerjaanOrtu='$pekerjaan' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
echo "Data anggota berhasil diupdate";
echo "<br/>";
echo "<h3><a href='edit.php'>Kembali</a> <a href='tampil.php'>Tampilkan</a></h3>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
// Tutup koneksi
$conn->close();
?>