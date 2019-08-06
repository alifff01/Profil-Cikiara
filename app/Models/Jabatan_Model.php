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
class Jabatan extends ModelClass
{
	public function listJabatan()
	{
		return $this->_db->fetch('jabatan');
	}
	public function hapusJabatan()
	{
		return $this->_db->delete('jabatan');
	}
	public function simpanjabatan()
	{
		$d['nama_jabatan']= $_POST['nama_jabatan'];
		$d['keterangan']= $_POST['keterangan'];
		return $this->_db->insert('jabatan', $d);
	}
}