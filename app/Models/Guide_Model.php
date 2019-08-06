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

namespace app\Models;

use app\Core\ModelClass;

// -------------------------------------------------------------------------------------------------

class Guide extends ModelClass
{
	private $tabel  = 'guide';

	public function uji()
	{
		return $this->_db->sql("SHOW TABLES");
	}

	// create --------------------------------------------------------------------------------------------------------

	//model untuk menambah data baru
	public function tambahUser()
	{
		$d['nama']		= $_POST['nama'];
		$d['alamat']	= $_POST['alamat'];
		$d['hp']		= $_POST['hp'];

		return $this->_db->insert($this->tabel,$d);
	}

	//read -----------------------------------------------------------------------------------------------------------
	
	//model untuk melihat seluruh data dalam tabel
	public function listUser()
	{
		return $this->_db->fetch($this->tabel);
	}

	//model untuk meilhat salah satu data dalam tabel
	public function listUserid($id_user)
	{
		return $this->_db->fetch($this->tabel,"id_user = '$id_user'");
	}

	//model untuk melihat salah satu data menurut file tertentu
	public function listusersetnama($nama)
	{
		return $this->_db->fetch($this->tabel,"nama = '$nama' OR nama LIKE '%$nama%'");
	}

	//update ---------------------------------------------------------------------------------------------------------
	
	//model untuk mengubah salah satu data
	public function ubahuserid($id_user)
	{
		$d['nama']		= $_POST['nama'];
		$d['alamat']	= $_POST['alamat'];
		$d['hp']		= $_POST['hp'];
		return $this->_db->update($this->tabel,$d,"id_user='$id_user'");
	}

	//model untuk mengubah seluruh data berdasarkan field tertentu
	public function ubahusersetnama($nama)
	{
		$d['nama']		= $_POST['nama'];
		return $this->_db->update($this->tabel,$d,"id_user='$id_user'");
	}

	//model unutk mengubah salah satu data berdasarkan field tertentu
	public function ubahusersetnamaid($nama,$id_user=null)
	{
		$d['nama']		= $_POST['nama'];
		return $this->_db->update($this->tabel,$d,"id_user='$id_user'");
	}

	//delete ---------------------------------------------------------------------------------------------------------
	
	//model untuk menghapus seluruh data dalam tabel
	public function hapususer()
	{
		return $this->_db->delete($this->tabel);
	}

	//model untuk menghapus salah satu data dalam tabel
	public function hapususerid($id_user)
	{
		return $this->_db->delete($this->tabel,"id_user='$id_user'");
	}

	//model untuk menghapus salah satu data berdasarkan field tertentu
	public function hapususersetnama($nama)
	{
		return $this->_db->fetch($this->tabel,"nama='$nama'");
	}

	//jumdata----------------------------------------------------------------------------------------------------------

	//model untuk mengetahui jumlah data dalam tabel
	public function jumlahuser()
	{
		return $this->_db->jumdata($this->tabel);
	}

	//model untuk mengetahui jumlah data berdasarkan field tertentu
	public function jumlahusersetnama($nama)
	{
		return $this->_db->jumdata($this->tabel,"nama='$nama'");
	}

}