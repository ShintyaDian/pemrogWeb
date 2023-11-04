<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Hasil Pencarian</h2>
    <?php
        //ambil data dari formulir
        $name = $_POST['name'];

        //koneksi ke database
        $conn = new mysqli("localhost", "root", "", "dataku");

        //periksa koneksi
        if ($conn -> connect_error) {
            die("Koneksi gagal: " . $conn -> connect_error);
        }

        //cari tamu menurut nama
        $sql = "SELECT * FROM guestbook WHERE name LIKE '%$name%'";
        $result = $conn -> query($sql);

        if ($result->num_rows >0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>Nama: " . $row["name"]. " - Email: " . $row["email"]. " - Komentar: " . $row["message"]. "</li>";
            }
            echo "</ul>";
        } else {
            echo "Tidak ada tamu yang cocok dengan kata kunci pencarian.";
        }

        //tutup koneksi
        $conn->close();
    ?>    
</body>
</html>
