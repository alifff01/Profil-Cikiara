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
class Biodata extends ModelClass
{
	public function listbiodata()
	{
		return $this->_db->fetch('biodata');
	}
	public function hapusbiodata()
	{
		return $this->_db->delete('biodata');
	}
	public function simpanbiodata()
	{
		$d['jk']= $_POST['jk'];
		$d['id_jabatan']= $_POST['id_jabatan'];
		$d['nama_anggota']= $_POST['nama_anggota'];
		$d['alamat']= $_POST['alamat'];
		$d['no_hp']= $_POST['no_hp'];
		$d['tempat_lahir']= $_POST['tempat_lahir'];
		$d['tgl_lahir']= $_POST['tgl_lahir'];
		$d['email']= $_POST['email'];
		$d['agama']= $_POST['agama'];		
		$d['photo']= $_POST['photo'];
		return $this->_db->insert('biodata', $d);
	}
	public function listbiodataId($idbiodata)
	{
		return $this->_db->fetch('biodata', "id_biodata = '$idbiodata'");
	}
}