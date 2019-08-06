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
class Profil extends ModelClass
{
	public function listProfil()
	{
		return $this->_db->fetch('profil');
	}
	public function hapusProfil()
	{
		return $this->_db->delete('profil');
	}
	public function simpanprofil()
	{
		$d['sejarah']= $_POST['sejarah'];
		$d['visi']= $_POST['visi'];
		$d['misi']= $_POST['misi'];
		$d['lat']= $_POST['lat'];
		$d['lot']= $_POST['lot'];		
		return $this->_db->insert('profil', $d);
	}
	
}