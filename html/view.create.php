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
	</style>
</head>
<body>	
<center>

	<div id="panel">
		Tambah Instansi
		<div id="head">
			<form action="?page=store" method="POST">
				<table>
					<tr>
						<td>Intansi</td>
						<td><input type="text" name="_instansi"></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td><textarea name="_deskripsi"></textarea></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:right">
							<input type="submit" value="simpan"><button>Reset</button> 
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>	
</center>
</body>
</html>