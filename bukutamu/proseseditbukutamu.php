<?php
// Ambil nama tamu dari formulir
$name = $_POST['name'];

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "dataku");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cari tamu berdasarkan nama
$sql = "SELECT * FROM guestbook WHERE name='$name'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Tampilkan formulir dengan data tamu yang ditemukan
    $row = $result->fetch_assoc();
?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Edit Tamu</title>
    </head>
    <body>
        <h2>Edit Tamu</h2>
        <form action="simpaneditbukutamu.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nama: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
        Komentar: <textarea name="message"><?php echo $row['message']; ?></textarea><br>
        <input type="submit" value="Simpan">
        </form>
    </body>
    </html>
<?php
} else {
    echo "Tamu tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>