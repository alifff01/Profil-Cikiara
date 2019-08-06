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

// -------------------------------------------------------------------------------------------------\
/**
 * class model umum
 */
/**
 * 
 */
class Produk extends ModelClass
{
	public function listProduk()
	{
		return $this->_db->fetch('produk');
	}
	public function hapusProduk()
	{
		return $this->_db->delete('produk');
	}
	public function simpanproduk()
	{
		$d['nama_produk']= $_POST['nama_produk'];
		$d['gambar_produk']= $_POST['gambar_produk'];
		$d['deskripsi_produk']= $_POST['deskripsi_produk'];
		return $this->_db->insert('produk', $d);
	}
}