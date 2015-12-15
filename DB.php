<?php 
/**
* @author Dwi Hujianto
*/
class DB extends PDO
{
	protected $driver;
	protected $host;
	protected $database;
	protected $charset;
	protected $user;
	protected $pass;

	public function __construct()
	{
		$this->driver 	= 'mysql';
		$this->host 	= 'localhost';
		$this->database = 'technicaltes_dwi';
		$this->user 	= 'root';
		$this->pass 	= '';
		$this->charset  = 'utf8';

		$setDNS = $this->driver.':host='.$this->host.';dbname='.$this->database.';charset='.$this->charset;

		try 
		{
			parent::__construct($setDNS,$this->user,$this->pass);
		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
		}
	}
}
