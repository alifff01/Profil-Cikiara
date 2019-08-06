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
class Agenda extends ModelClass
{
	public function listAgenda()
	{
		return $this->_db->fetch('agenda');
	}
	public function hapusAgenda()
	{
		return $this->_db->delete('agenda');
	}
	public function simpanAgenda()
	{
		$d['nama_agenda']= $_POST['nama_agenda'];
		$d['keterangan']= $_POST['keterangan'];
		$d['gambar_agenda']= $_POST['gambar_agenda'];
		$d['tgl_dibuat']= $_POST['tgl_dibuat'];
		return $this->_db->insert('agenda', $d);
	}
	// 	list + id = untu=HANYA MENAMPILKAN SATU COLUM,SATU FILE .	list=SEMUA
	// public function listAgendaid($id_agenda)
	// {
	// 	return $this->_db->fetch('agenda', "id_agenda='$id_agenda'");
	// }
	
	//  id;    hanya untuk satu pilihan/colom
	// public function hapusAgendaid($id_agenda)
	// {
	// 	return $this->_db->delete('agenda', "id_agenda='$id_agenda'");
	// }
	

	// 	set;	pilihaan satu selain id
	// public function hapusAgendasetnamaagenda()
	// {
	// 	return $this->_db->delete('agenda', "namaagenda='$namaagenda'");
	// }

}
