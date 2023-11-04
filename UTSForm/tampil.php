<?php
	$conn = new mysqli("localhost", "root", "", "tugasForm");
	
	if ($conn->connect_error) {
		die ("Koneksi gagal: " . $conn->connect_error);
	}
	
	$sql = "SELECT * FROM form";
	$result = mysqli_query($conn, $sql);

echo "<style>
table, th, td {
    border: 1px solid black;
   
}
</style>";

echo "<h1 align='center'>Daftar Anggota</h1> <br>";

if(mysqli_num_rows($result) > 0)
{
 echo "<table width='90%' align='center' cellspacing='0'>";
            echo "<tr bgcolor='lightgrey' height='50'>";
                echo "<th>Nama</th>";
                echo "<th>NIK</th>";
                echo "<th>Alamat</th>";
                echo "<th>Tempat Lahir</th>";
                echo "<th>Jenis Kelamin</th>";
                echo "<th>Tanggal Lahir</th>";
                echo "<th>Pekerjaan Orang Tua/Wali</th>";
                echo "<th>Foto</th>";
            echo "</tr>";
  
 while($row =mysqli_fetch_array($result))
 {
  echo "<tr height='35' align='center'>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['nik'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['tempatLahir'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['tglLahir'] . " " . $row['blnLahir'] . " " . $row['thnLahir'] . "</td>";
                echo "<td>" . $row['pekerjaanOrtu'] . "</td>";
                echo "<td> <img src='listFoto/". $row['foto'] ." 'style='width:120px;''></td>";
        echo "</tr>";
 }
 echo "</table>";
 echo "<br/>";
 echo "<h3 align='center'><a href='formBiodata.php'>Tambah Anggota</a> <a href='edit.php'>Edit Anggota</a> <a href='hapus.php'>Hapus Anggota</a></h3>";
		}
		else {
		echo "Tidak ada tamu yang terdaftar.";
        echo "<h3><a href='formBiodata.php'>Tambah Anggota</a>";
	}
		echo "</ul>";
	$conn -> close();
?>
