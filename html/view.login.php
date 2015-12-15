<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		#panel {
			min-height: 100px;
			width: 400px;
			background: yellow;
		}
		#form-control {
			padding-top: 100px;
			padding-left: 50px;
		}
	</style>
</head>
<body>
<center>
	<div id="panel">
		<div id="form-control">
		<form action="?page=validate" method="POST">
			<table>
				<tr>
					<td>Usename</td>
					<td><input type="text" name="_user" required></td>					
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="_pass" required></td>					
				</tr>
				<tr>
					<td colspan="2" style="text-align:right">
						<input type="submit" value="Login"> <a href="#">Lupa password</a>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<a href="#">Silahkan klik untuk melakukan registrasi</a>						
					</td>
				</tr>
			</table>
		</form>
		</div>
		
	</div>
</center>	
</body>
</html>