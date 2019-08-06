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
class Setting extends ModelClass
{
	public function listSetting()
	{
		return $this->_db->fetch('setting');
	}
	public function hapusSetting()
	{
		return $this->_db->delete('setting');
	}
	public function simpansetting()
	{
		$d['nama_aplikasi']= $_POST['nama_aplikasi'];
		$d['logo_aplikasi']= $_POST['logo_aplikasi'];
		$d['alamat']= $_POST['alamat'];
		$d['no_hp']= $_POST['no_hp'];
		$d['email']= $_POST['email'];		
		return $this->_db->insert('setting', $d);
	}
}