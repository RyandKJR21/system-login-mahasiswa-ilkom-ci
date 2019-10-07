<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="800">
		<tr>
			<th>Id</th>
			<th>Nama</th>
			<th>Nim</th>
			<th>Email</th>
			<th>Jumlah UKT</th>
			<th>Alamat</th>
			<th>Angkatan</th>
			<th>Foto</th>
		</tr>
		<tr>
			<?php
			$i = 1;
			foreach ($nama as $n): ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $n['nama']; ?></td>
				<td><?= $n['nim']; ?></td>
				<td><?= $n['email']; ?></td>
				<td><?= $n['ukt']; ?></td>
				<td><?= $n['alamat']; ?></td>
				<td><?= $n['angkatan']; ?></td>
				<td><img src="<?=base_url('assets/img/img_mahasiswa/') . $n['image']; ?>" class="img-thumbnail" width="50px"></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach?>
		</tr>
	</table>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>