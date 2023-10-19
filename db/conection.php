<?php

class Conection
{
	
	 	private $user 	= "root";
 	private $passw	= "nayita64";
 	private $host 	= "localhost";
	private $db   	= "lacabrera";
	private $con;
	private $conexion;

	public function connect(){
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND 	=> 'SET NAMES utf8',
			PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_FOUND_ROWS 		=> true,
			PDO::ATTR_PERSISTENT 			=> true
		);
		
		try {
			$this->conexion = new PDO(
				'mysql:host='.$this->host.';dbname='.$this->db,$this->user, $this->passw, $options
			);

		} catch (PDOException $e) {
			print 'Error: '. $e->getMessage();
			die();
		}
		return $this->conexion;		
	}

	public function close(){
		$this->conexion = null;
	}
	protected $conection;

	function __construct()
	{
		$user = "root";
		$password = "nayita64";
		$db_name = "lacabrera";
		$host = "localhost";
		$conection_info = "mysql:host=$host;dbname=$db_name";

		try
		{
		    $this->conection = new PDO($conection_info, $user, $password);
		    $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $this->conection->exec("set character set utf8");
		}
		catch (Exception $ex)
		{
		    echo "Ocurrió un error. Detalles: " . $ex->getMessage();
		    exit();
		}
	}
}
?>
