<!DOCTYPE html>
<html>
<head>
	<title>Instansi</title>
	<style type="text/css">
		#panel {
			min-height: 60%;
			width: 60%;
			background: #BBBBC3;
			border: 1 px solid black;
		}
		#head {
			padding-top: 10px;
			height: 100px;
			width: 95%;
			background: #D0C5C5;
		}
		#body {
			padding-top: 10px;
			margin-top: 10px;
			height: 200px;
			width: 95%;
			background: #D0C5C5;			
		}
		#table {
			width: 95%;
			background: yellow;
		}
		#link{
			width: 95%;
			text-align: left;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>	
<center>

	<div id="panel">
		Instansi
		<div id="head">
			<form action="" method="POST">
				<table>
					<tr>
						<td>Instansi</td>
						<td><input type="text" name="q"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:right"><input type="submit" value="Cari"></td>
					</tr>
				</table>
			</form>
		</div>

		<div id="body">
		<div id="link">
			<a href="?page=add"><button>Tambah</button></a>
		</div>
			<table border="1" id="table">
				<thead>
					<td>No</td>
					<td>Aksi</td>
					<td>Instansi</td>
					<td>Deskripsi</td>
				</thead>
				
				<?php $no = 1 ?>
				
				<?php foreach ($listdata as $instansi): ?>
					<tbody>
						<td><?php echo $no++ ?></td>
						<td>
							<a href="?page=edit&id=<?php echo $instansi['id'] ?>">Edit</a> |
							<a href="?page=delete&id=<?php echo $instansi['id'] ?>">Delete</a>
						</td>
						<td><?php echo $instansi['instansi'] ?></td>
						<td><?php echo $instansi['instansi'] ?></td>
					</tbody>
				<?php endforeach ?>

			</table>
		</div>

		<div id="foot">
			
		</div>
	</div>	
</center>
</body>
</html>