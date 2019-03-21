<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
</head>
<body>
	<form method="POST" action="<?php echo base_url();?>index.php/mahasiswa_controller/post">
		<input type="text" name="nama" placeholder="Nama">
		<input type="text" name="alamat" placeholder="Alamat">
		<input type="text" name="jurusan" placeholder="Jurusan">
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>