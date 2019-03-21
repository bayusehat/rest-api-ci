<!DOCTYPE html>
<html>
<head>
	<title>Mahasiswa</title>
</head>
<body>
	<?php
		$notif = $this->session->flashdata('notif');

		if(!empty($notif)){
			echo '<h4>'.$notif.'</h4>';
		}
	?>
	<form method="post" action="<?php echo base_url();?>index.php/mahasiswa_controller/search">
		<input type="text" name="nama" placeholder="Search">
		<input type="submit" name="submit" value="Search">
	</form>
	
	<a href="<?php echo base_url();?>index.php/mahasiswa_controller/tambah"> Tambah</a>
	<table border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jurusan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($mahasiswa['data'] as $data) {
				echo'<tr>
					<td>'.$data['id'].'</td>
					<td>'.$data['nama'].'</td>
					<td>'.$data['alamat'].'</td>
					<td>'.$data['jurusan'].'</td>
					<td>
						<a href="'.base_url().'index.php/mahasiswa_controller/edit/'.$data['id'].'"> Edit</a>
						<a href="'.base_url().'index.php/mahasiswa_controller/delete/'.$data['id'].'"> Delete</a>
					</td>
				</tr>';
			}
			?>
		</tbody>
	</table>
</body>
</html>