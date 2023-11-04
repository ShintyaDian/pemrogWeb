<?php
// Ambil nama tamu dari formulir
$name = $_POST['nama'];

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "tugasform");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cari tamu berdasarkan nama
$sql = "SELECT * FROM form WHERE nama='$name'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Tampilkan formulir dengan data tamu yang ditemukan
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Anggota</title>
</head>
<body>
    <h2 align="center">Edit Anggota</h2>
    <form action="simpanedit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <table width="50%" border="0" align="center" bgcolor="#CCFF66">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td width="8%">&nbsp;</td>
                <td width="30%">Nama</td>
                <td width="3%">:</td>
                <td colspan="2"><label for="textfield"></label>
                <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>NIK</td>
                <td>:</td>
                <td colspan="2">
                <input type="text" name="nik" id="nik" value="<?php echo $row['nik']; ?>" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Alamat</td>
                <td>:</td>
                <td colspan="2">
                <textarea name="alamat" id="alamat" cols="45" rows="5"><?php echo $row['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tempat Kelahiran</td>
                <td>:</td>
                <td colspan="2"><label for="textfield3"></label>
                <input type="text" name="tempatLahir" id="tempatLahir" value="<?php echo $row['tempatLahir']; ?>"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td colspan="2"><p>
                <label>
                    <input type="radio" name="gender" value="Laki-Laki" id="gender" <?php if($row['gender']=="Laki-Laki") { echo "checked";} ?>/>
                    Laki-Laki</label>
                <label>
                    <input type="radio" name="gender" value="Perempuan" id="gender" <?php if($row['gender']=="Perempuan") { echo "checked";} ?>/>
                    Perempuan</label>
                <br />
                </p></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal Kelahiran</td>
                <td>:</td>
                <td colspan="2">
                    <select name="tgl" id="tgl">
                        <option value="<?= $row['tglLahir'] ?>"><?= $row['tglLahir'] ?></option>
                        <?php
                        for ($i=1;$i<=31;$i++) {
                        echo "<option value=".$i." >".$i."</option>";
                        }
                        ?>
                    </select>
                    <select name="bln" id="bln">
                        <option value="<?= $row['blnLahir'] ?>"><?= $row['blnLahir'] ?></option>
                        <?php
                            $bulan=array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "Setember", "Oktober", "November", "Desember");
                            for ($i=0;$i<12;$i++) {
                                echo "<option value=".$bulan[$i].">" .$bulan[$i]. "</option>"; }
                            ?>
                    </select>
                    <input type="text" name="thn" id="thn" value="<?php echo $row['thnLahir']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Pekerjaan Orang Tua/Wali</td>
                <td>:</td>
                <td width="15%"><p>
                <label>
                    <input type="checkbox" name="pekerjaan" value="PNS" id="pekerjaan_0" <?php if($row['pekerjaanOrtu']=="PNS") { echo "checked";} ?>/>
                    PNS</label>
                <br />
                <label>
                    <input type="checkbox" name="pekerjaan" value="TNI/Polri" id="pekerjaan_1" <?php if($row['pekerjaanOrtu']=="TNI/Polri") { echo "checked";} ?>/>
                    TNI/Polri</label>
                <br />
                <label>
                    <input type="checkbox" name="pekerjaan" value="Lain-Lain" id="pekerjaan_0" <?php if($row['pekerjaanOrtu']=="Lain-Lain") { echo "checked";} ?>/>
                    Lain-Lain</label>
                </p></td>
                <td width="44%" valign="top"><p>
                <label>
                    <input type="checkbox" name="pekerjaan" value="Wiraswasta" id="pekerjaan_0" <?php if($row['pekerjaanOrtu']=="Wiraswasta") { echo "checked";} ?>/>
                    Wiraswasta</label>
                <br />
                <label>
                    <input type="checkbox" name="pekerjaan" value="Petani/Nelayan" id="pekerjaan_1" <?php if($row['pekerjaanOrtu']=="Petani/Nelayan") { echo "checked";} ?>/>
                    Petani/Nelayan</label>
                <br />
                </p></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Foto Terunggah</td>
                <td>:</td>
                <td colspan="2">
                <img src="listFoto/<?php echo $row['foto']; ?>" style="width:120px;"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"><input type="submit" name="save" id="save" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table>
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