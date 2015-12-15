<?php 

$page = isset($_GET['page']) ? $_GET['page'] : null;

if (empty($page)) 
{
	require_once 'html/view.login.php';
}
else
{
	require_once 'Instansi.php';

	$instansiObj =  new Instansi();

	switch ($page) 
	{
		case 'validate':
			$user	= strip_tags($_POST['_user']);
			$pass	= strip_tags($_POST['_pass']);

			$errors = [];

			if (empty($user)) 
			{
				array_push($errors, "[x] Username tidak boleh kosong");
			}

			if (empty($pass)) 
			{
				array_push($errors, "[x] Password tidak boleh kosong");
			}

			if (preg_match("/^([a-zA-Z\._]{3,25})*$/",$user )==false) 
			{
				array_push($errors, "[x] Karakter maksimal username 25 karakter");
			}

			if (count($errors) > 0) 
			{
				foreach ($errors as  $value) 
				{
					echo $value."<br>";
				}

				exit();
			}

			require_once 'Auth.php';

			$auth = new Auth();

			$auth->username = $user;
			$auth->password = $pass;

			$dd = $auth->getUser();

			if ($dd !== FALSE) 
			{
				if (password_verify($auth->password,$dd['password'])) 
				{
					session_start();
					$_SESSION['islogged'] 	= TRUE;
					$_SESSION['name']		= $dd['username'];

					header('location:?page=instansi');
				}
			}
			break;
		
		case 'instansi':
			$instansiObj->instansi = isset($_POST['q']) ? $_POST['q'] : null;
			$listdata =	$instansiObj->all();
			require_once 'html/view.index.php';

			break;

		case 'add':
			
			require_once 'html/view.create.php';	
			
			break;

		case 'store': 
			$instansi	= strip_tags($_POST['_instansi']);
			$deskripsi	= strip_tags($_POST['_deskripsi']);

			$errors = [];

			if (empty($instansi)) 
			{
				array_push($errors, "[x] Instansi tidak boleh kosong");
			}

			if (empty($deskripsi))
			{
				array_push($errors, "[x] Deskripsi tidak boleh kosong");
			}

			if (preg_match("/^[ a-zA-Z0-9\.,_]*$/",$instansi)==false) 
			{
				array_push($errors, "[x] Karakter tidak diperbolehkan");
			}

			if (preg_match("/^[ a-zA-Z0-9\.,_]*$/",$deskripsi)==false) 
			{
				array_push($errors, "[x] Karakter tidak diperbolehkan");
			}

			if (count($errors) > 0) 
			{
				foreach ($errors as  $value) 
				{
					echo $value."<br>";
				}

				exit();
			}

			//echo $instansi; echo $deskripsi; exit();

			$instansiObj->instansi 	= $instansi;
			$instansiObj->deskripsi = $deskripsi;
			$instansiObj->insert();

			header('location:?page=instansi');

			break;

			case 'edit': 
				$id = isset($_GET['id']) ? $_GET['id'] : null;

				$instansiObj->find = $id;

				$getRow = $instansiObj->findData();

				require_once 'html/view.edit.php';
			
				break;

			case 'update':
			
				$instansi	= strip_tags($_POST['_instansi']);
				$deskripsi	= strip_tags($_POST['_deskripsi']);
				$id 		= strip_tags($_POST['_id']);

				$errors = [];

				if (empty($instansi)) 
				{
					array_push($errors, "[x] Instansi tidak boleh kosong");
				}

				if (empty($deskripsi))
				{
					array_push($errors, "[x] Deskripsi tidak boleh kosong");
				}

				if (preg_match("/^[ a-zA-Z0-9\.,_]*$/",$instansi)==false) 
				{
					array_push($errors, "[x] Karakter tidak diperbolehkan");
				}

				if (preg_match("/^[ a-zA-Z0-9\.,_]*$/",$deskripsi)==false) 
				{
					array_push($errors, "[x] Karakter tidak diperbolehkan");
				}

				if (count($errors) > 0) 
				{
					foreach ($errors as  $value) 
					{
						echo $value."<br>";
					}

					exit();
				}

				$instansiObj->instansi 	= $instansi;
				$instansiObj->deskripsi = $deskripsi;
				$instansiObj->find 		= $id;
				$instansiObj->update();

				header('location:?page=instansi');

				break;	

				case 'delete' :

					$id = isset($_GET['id']) ? $_GET['id'] : null;


					$instansiObj->find = $id;
					$instansiObj->delete();

					header('location:?page=instansi');

					break;
		default:
			require_once 'html/view.login.php';
			break;
	}
}