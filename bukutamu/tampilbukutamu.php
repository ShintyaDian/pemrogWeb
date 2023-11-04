<?php
	$conn = new mysqli("localhost", "root", "", "dataku");
	
	if ($conn->connect_error) {
		die ("Koneksi gagal: " . $conn->connect_error);
	}
	
	$sql = "SELECT * FROM guestbook";
	$result = mysqli_query($conn, $sql);

echo "<style>
table, th, td {
    border: 1px solid black;
   
}
</style>";

echo "<h2 align='center'>Tampil Buku Tamu</h2> <br>";

if(mysqli_num_rows($result) > 0)
{
 echo "<table width='90%' align='center' cellspacing='0'>";
            echo "<tr bgcolor='grey' height='50'>";
                echo "<th>Nama</th>";
                echo "<th>Email</th>";
                echo "<th>Komentar</th>";
            echo "</tr>";
  
 while($row =mysqli_fetch_array($result))
 {
  echo "<tr height='35'>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
        echo "</tr>";
 }
 echo "</table>";
		}
		else {
		echo "Tidak ada tamu yang terdaftar.";
	}
		echo "</ul>";
	$conn -> close();
?>
