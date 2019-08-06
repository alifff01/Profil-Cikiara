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

use mysqli;

// -------------------------------------------------------------------------------------------------

class Database
{
	private $host 	= DB_HOST;
	private $user 	= DB_USER;
	private $pass 	= DB_PASS;
	private $dbname = DB_NAME;
	private static $_instance = null;
	private $connection;
	public $table;

	//Fungsi untuk koneksi ke database
	public function __construct()
	{
		$this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname) or die('ada Error Pada Koneksi');
	}


	//Fungsi untuk inisiasi class database
	public static function getInstance(){
		if (!isset(self::$_instance)) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	//Fungsi untuk menyimpan data lebih dari satu
	public function multi_insert($table, $field,$rows=NULL){
		$sql = "INSERT INTO $table ";
		$row = null;
		$set = null;

		foreach ($field as $key1 => $nilai1) {
			$row .= $key1.",";
		}
		$sql .= "(".rtrim($row, ',').") VALUES ";
		for ($i=0; $i < count($rows); $i++) {
			$value[$i] = null;
			$data 	= $rows[$i];
			foreach ($data as $key => $nilai) {
				$value[$i] .= ",'".$nilai."'";
			}
			$set .= ",(".substr($value[$i], 1).")"; 
		}
		$sql .= substr($set, 1);
		$query = $this->connection->prepare($sql) or die ($this->connection->error);
		$query->execute();
		return $query;
	}

	//Fungsi untuk menambah data
	public function insert($table, $rows = null){
		$sql = "INSERT INTO $table ";
		$row = null;
		$value = null;
		foreach ($rows as $key => $nilai) {
			$row .= ",".$key;
			$value .= ",'".$nilai."'";
		}
		$sql .= "(".substr($row, 1).")";
		$sql .= " VALUES (".substr($value, 1).")";

		// echo $sql;
		$query = $this->connection->prepare($sql) or die ($this->connection->error);
		$query->execute();
		return $query;
	}

	//Fungsi untuk menampilkan data
	public function fetch($table, $where = null, $opsi = null){
		$sql = "SELECT * FROM $table ";
		if ($where != null)
			$sql .= " WHERE $where";
		if ($opsi != null){
			$sql .= " $opsi ";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	//Fungsi untuk menampilkan data dengan field tertentu
	public function fetch_part($kolom, $table, $where = null, $opsi = null){
		$sql = "SELECT $kolom FROM $table ";
		if ($where != null) {
			$sql .= " WHERE $where ";
		}
		if ($opsi != null){
			$sql .= " $opsi ";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	} 

	//Fungsi untuk menampilkan dua buah tabel dengan cara menggabungkan (join)
	public function fetch_join($table1, $table2, $field, $where = null, $opsi = null){
		$sql = "SELECT * FROM $table1 p inner join $table2 c USING($field) ";
		if ($where != null) {
			$sql .= " WHERE $where ";
		}
		if ($opsi != null) {
			$sql .= " $opsi ";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	//Fungsi untuk menampilkan dua buah tabel dengan cara menggabungkan (join)
	public function fetch_join_differ($table1, $table2, $fild1, $fild2, $where = null, $opsi = null){
		$sql = "SELECT * FROM $table1 p inner join $table2 c on p.$fild1=c.$fild2 ";
		if ($where != null) {
			$sql .= " WHERE $where ";
		}
		if ($opsi != null) {
			$sql .= " $opsi ";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	//Fungsi untuk menampilkan dua buah tabel dengan field tertentu
	public function fetch_join_part($kolom, $table1, $table2, $field, $where = null, $opsi = null){
		$sql = "SELECT $kolom FROM $table1 p inner join $table2 c USING($field) ";
		if ($where != null) {
			$sql .= " WHERE $where ";
		}
		if ($opsi != null) {
			$sql .= " $opsi ";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	//Fungsi untuk menampilkan dua buah tabel dengan field tertentu
	public function fetch_join_differ_part($kolom, $table1, $table2, $field1, $field2, $where = null, $opsi = null){
		$sql = "SELECT $kolom FROM $table1 p inner join $table2 c on p.$field1=c.$field2 ";
		if ($where != null) {
			$sql .= " WHERE $where ";
		}
		if ($opsi != null) {
			$sql .= " $opsi ";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	//Fungsi untuk menampilkan 2 buah tabel
	public function fetch_triple($table1,$table2,$table3,$id_table1,$id_table2a,$id_table2b,$id_table3,$where=NULL)
	{
		$sql = "SELECT * FROM ($table1 a left JOIN $table2 b on a.$id_table1 = b.$id_table2a) LEFT JOIN $table3 c on b.$id_table2b=c.$id_table3";
		if ($where != null) {
			$sql .= " WHERE $where ";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	//Fungsi untuk menampilkan 3 buah tabel dengan field tertentu
	public function fetch_triple_part($kolom,$table1,$table2,$table3,$id_table1,$id_table2a,$id_table2b,$id_table3,$where=NULL)
	{
		$sql = "SELECT $kolom FROM ($table1 a left JOIN $table2 b on a.$id_table1 = b.$id_table2a) LEFT JOIN $table3 c on b.$id_table2b=c.$id_table3";
		if ($where != null) {
			$sql .= " WHERE $where ";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	//Fungsi untuk mengubah data
	public function update($table, $fild = null, $where = null){
		$cek = self::jumdata($table, $where);
		if ($cek>0) {
			$sql = "UPDATE $table SET ";
			$set = null;
			foreach ($fild as $key => $values) {
				$set .= ", ".$key." = '".$values."'";
			}
			$sql .= substr($set, 1). " WHERE $where ";

			$query = $this->connection->prepare($sql) or die ($this->connection->error);
			$query->execute();
			return true;
		}else{
			return false;
		}
	}

	//Fungsi untuk menghapus data
	public function delete($table, $where= null){
		$cek = self::jumdata($table, $where);
		if ($cek>0) {
			$sql = "DELETE FROM $table ";
			if ($where != null) {
				$sql .= " WHERE $where";
			}
			$this->connection->query($sql) or die ($this->connection->error);
			return true;
		}else
			return false;
	}

	//
	public function sql($sql)
	{
		$query = $this->connection->query($sql);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	//Fungsi untuk menghitung jumlah data
	public function jumdata($table, $where = null){
		$sql = "SELECT COUNT(*) AS jum FROM $table ";
		if($where != null){
			$sql .= " WHERE $where";
		}
		$query = $this->connection->query($sql);
		$data = $query->fetch_assoc();
		$jumlah = $data['jum'];
		return $jumlah;
	}

	//Fungsi untuk menutup koneksi database
	public function __destruct(){
		$this->connection->close();
	}

}