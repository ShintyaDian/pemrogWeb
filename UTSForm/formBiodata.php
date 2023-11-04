<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
</head>

<body>
<h2 align="center">FORM BIODATA</h2>
<form action="simpan.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
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
      <input type="text" name="nama" id="nama" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>NIK</td>
    <td>:</td>
    <td colspan="2">
      <input type="text" name="nik" id="nik" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>:</td>
    <td colspan="2">
      <textarea name="alamat" id="alamat" cols="45" rows="5"></textarea></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tempat Kelahiran</td>
    <td>:</td>
    <td colspan="2"><label for="textfield3"></label>
      <input type="text" name="tempatLahir" id="tempatLahir" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td colspan="2"><p>
      <label>
        <input type="radio" name="gender" value="Laki-Laki" id="gender" />
        Laki-Laki</label>
      <label>
        <input type="radio" name="gender" value="Perempuan" id="gender" />
        Perempuan</label>
      <br />
    </p></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tanggal Kelahiran</td>
    <td>:</td>
    <td colspan="2"><select name="tgl" id="tgl">
      <?php
	for ($i=1;$i<=31;$i++) {
	echo "<option value=".$i.">".$i."</option>";
	}
	?>
      </select>
      <select name="bln" id="bln">
        <?php
	  $bulan=array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "Setember", "Oktober", "November", "Desember");
	  for ($i=0;$i<12;$i++) {
		  echo "<option value=".$bulan[$i].">" .$bulan[$i]. "</option>"; }
	  ?>
        </select>
      <input type="text" name="thn" id="thn" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pekerjaan Orang Tua/Wali</td>
    <td>:</td>
    <td width="15%"><p>
      <label>
        <input type="checkbox" name="pekerjaan" value="PNS" id="pekerjaan_0" />
        PNS</label>
      <br />
      <label>
        <input type="checkbox" name="pekerjaan" value="TNI/Polri" id="pekerjaan_1" />
        TNI/Polri</label>
      <br />
      <label>
        <input type="checkbox" name="pekerjaan" value="Lain-Lain" id="pekerjaan_0" />
        Lain-Lain</label>
    </p></td>
    <td width="44%" valign="top"><p>
      <label>
        <input type="checkbox" name="pekerjaan" value="Wiraswasta" id="pekerjaan_0" />
        Wiraswasta</label>
      <br />
      <label>
        <input type="checkbox" name="pekerjaan" value="Petani/Nelayan" id="pekerjaan_1" />
        Petani/Nelayan</label>
      <br />
    </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Unggah Foto</td>
    <td>:</td>
    <td colspan="2">
      <input type="file" name="foto" id="foto" /></td>
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