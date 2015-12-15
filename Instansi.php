<?php 
require_once 'DB.php';

/**
* @author Dwi Hujianto
*/
class Instansi extends DB
{
	public $instansi;
	public $deskripsi;
	public $find;

	public function all()
	{
		$query = "SELECT id,instansi,deskripsi FROM instansi WHERE instansi LIKE :instansi";
		try
		{
			$db = DB::prepare($query);
			$db->execute([
				':instansi' => '%'.$this->instansi.'%' 
			]);

			return $db->fetchAll();

		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			return FALSE;
		}
	}	

	public function findData()
	{
		$query = "SELECT id,instansi,deskripsi FROM instansi WHERE id LIKE :id";
		try
		{
			$db = DB::prepare($query);
			$db->execute([
				':id' => $this->find 
			]);

			return $db->fetch();

		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			return FALSE;
		}
	}

	public function insert()
	{
		$query = "INSERT INTO instansi (instansi,deskripsi) VALUES (:instansi,:deskripsi)";

		try 
		{
			$db = DB::prepare($query);
			$db->execute([
			':instansi' 	=> $this->instansi,
			':deskripsi'	=> $this->deskripsi
			]);

		return TRUE;	
		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			return FALSE;	
		}
		
	}

	public function update()
	{
		$query = "UPDATE instansi SET instansi = :instansi , deskripsi = :deskripsi WHERE id = :find";

		try 
		{
			$db = DB::prepare($query);
			$db->execute([
			':instansi' 	=> $this->instansi,
			':deskripsi'	=> $this->deskripsi,
			':find'			=> $this->find
			]);

		return TRUE;	
		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			return FALSE;	
		}
		
	}

	public function delete()
	{
		$query = "DELETE FROM instansi WHERE id = :find";

		try 
		{
			$db = DB::prepare($query);
			$db->execute([
			':find'			=> $this->find
			]);

		return TRUE;	
		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			return FALSE;	
		}
	}

	
}

$obj = new Instansi();

$obj->find = '2';
$obj->delete();

