<?php
// Ambil data dari formulir edit
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "dataku");
// Periksa koneksi
if ($conn->connect_error) {
die("Koneksi gagal: " . $conn->connect_error);
}
// Update data tamu berdasarkan id
$sql = "UPDATE guestbook SET name='$name', email='$email', message='$message' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
echo "Data tamu berhasil diupdate";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
// Tutup koneksi
$conn->close();
?>