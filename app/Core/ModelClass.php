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

use app\Core\Database;
use app\Core\DatabasePdo;
use app\Core\Controller;

// -------------------------------------------------------------------------------------------------

class ModelClass
{
	protected $_db;
	protected static $db;
	private $_table 	= null;
	private $_field 	= null;
	private $_where 	= null;

	public function __construct()
	{
		
		$this->_db 		= Database::getInstance();
		$this->pdo 		= DatabasePdo::getInstance();
		self::$db 		= Database::getInstance();
		$this->time 	= Controller::library('Time');
		$this->format 	= Controller::library('Format');
	}

	public function getmodel($model=null)
	{
		return Controller::model($model);
	}

	public function filter_input($input){
		$trim 		= trim($input);
		$filter 	= filter_var($trim, FILTER_SANITIZE_STRING);
		$filter 	= addslashes($filter);
		return $filter;
	}

	public function setchart($table,$field,$where=null)
	{
		$this->_table 	= $table;
		$this->_field 	= $field;
		$this->_where 	= $where;
	}

	public function getchart()
	{
		if ($this->_table != null) {
			$label 	= null;
			$jumlah = null;

			$data 	= $this->_db->fetch_part("DISTINCT $this->_field ",$this->_table,$this->_where);
			foreach ($data as $row) {
				$label .= "'" . $row[0] . "',";
				$jum 	= $this->_db->jumdata($this->_table," $this->_field='$row[0]'");
				$jumlah .= $jum . ",";
			}

			return [rtrim($label,','),rtrim($jumlah,',')];
		}else
			die('setchart null');

	}

	public function getjson($url)
	{
		$result 		= file_get_contents($url);
		return json_decode($result);
	}
}