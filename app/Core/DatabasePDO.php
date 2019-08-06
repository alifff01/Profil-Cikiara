<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 */

// -------------------------------------------------------------------------------------------------

namespace app\Core;

use PDO;

// use App\Core\DatabasePdo;

// -------------------------------------------------------------------------------------------------

class DatabasePdo
{
	private $host 	= DB_HOST;
	private $user 	= DB_USER;
	private $pass 	= DB_PASS;
	private $db_name= DB_NAME;
	
	private static $_instance = null;
	private $dbh;
	private $stmt;
	
	function __construct()
	{
		$dsn = 'mysql::host=' . $this->host . ';dbname=' . $this->db_name;

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//Fungsi untuk inisiasi class database
	public static function getInstance(){
		if (!isset(self::$_instance)) {
			self::$_instance = new DatabasePdo();
		}
		return self::$_instance;
	}

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch ( true ) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute()
	{
		$this->stmt->execute();
	}

	public function jumdata()
	{
		$this->stmt->rowCount();
	}

	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
}