<?php 
require_once 'DB.php';

/**
* @author Dwi Hujianto
*/

class Auth extends DB
{
	public $username;

	public $password;

	public function getUser()
	{
		$query = "SELECT username,password FROM user WHERE username = :username";

		try 
		{
			$db = DB::prepare($query);
			$db->execute([
				':username' => $this->username
			]);

			$row = $db->fetch();

			return $row;
		} 
		catch (PDOException $e) 
		{		
			echo $e->getMessage();
			return FALSE;
		}
	}
}