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
			<th>Nip</th>
			<th>Jabatan Akademik</th>
			<th>Gelar Akadmik</th>
			<th>Email</th>
			<th>Foto</th>
		</tr>
		<tr>
			<?php
			$i = 1;
			foreach ($nama as $n): ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $n['nama']; ?></td>
				<td><?= $n['nip']; ?></td>
				<td><?= $n['jabatan']; ?></td>
				<td><?= $n['gelar']; ?></td>
				<td><?= $n['email']; ?></td>
				<td><img src="<?=base_url('assets/img/img_dosen/') . $n['image']; ?>" class="img-thumbnail" width="50px"></td>
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