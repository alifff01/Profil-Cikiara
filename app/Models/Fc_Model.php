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
class Fc extends ModelClass
{
	## -------------------------------------------------------------------------------------##
	## LIST ##

	// menampilkan semua isi data dalam tabel
	public function listdata($tabel)
	{
		return $this->_db->fetch($tabel);
	}

	// menampilkan 1 data dalam tabel berdasarkan id
	public function listdataid($tabel,$id)
	{
		$field_id = $this->getid($tabel);
		return $this->_db->fetch($tabel,"$field_id = '$id'");
	}

	##--------------------------------------------------------------------------------------##

	##--------------------------------------------------------------------------------------##
	## TAMBAH ##

	public function tambahdata($tabel)
	{
		$desc 	= $this->getdesc($tabel);
		foreach ($desc as $row) {
			if ($row['Key'] != 'PRI') {
				$Field 	= $row['Field'];
				if (preg_match("/int/i", $row['Type']) || preg_match("/enum/i", $row['Type'])){
					$post = $_POST[$Field];
				} elseif ($row['Type'] == 'date') {
					if (!isset($_POST[$Field]))
						$post = $this->time->getdate();		
					else
						$post = $_POST[$Field];
				} else
					$post = $this->filter_input($_POST[$Field]);
				$d[$Field]	= $post;
			}
		}

		return $this->_db->insert($tabel, $d);
	}

	##--------------------------------------------------------------------------------------##

	##--------------------------------------------------------------------------------------##
	## EDIT ##

	public function editdata($tabel,$id)
	{
		foreach ($_POST as $field => $nilai) {
			$d[$field]	= $this->filter_input($_POST[$field]);
		}

		$field_id = $this->getid($tabel);
		return $this->_db->update($tabel, $d, "$field_id = '$id'");
	}

	##--------------------------------------------------------------------------------------##

	##--------------------------------------------------------------------------------------##
	## HAPUS ##

	// menghapus semua isi dalam tabel
	public function hapusdata($tabel)
	{
		return $this->_db->delete($tabel);
	}

	// menghapus satu data dalam tabel berdasarkan id
	public function hapusdataid($tabel,$id)
	{
		$field_id = $this->getid($tabel);
		return $this->_db->delete($tabel,"$field_id = '$id'");
	}

	##--------------------------------------------------------------------------------------##

	##--------------------------------------------------------------------------------------##
	## JUMLAH #

	public function jumlahdata($tabel)
	{
		return $this->_db->jumdata($tabel);
	}

	##--------------------------------------------------------------------------------------##

	##--------------------------------------------------------------------------------------##
	## JSON ##
	public function datajson($tabel)
	{
		$desc 		= $this->getdesc($tabel);
		$data 		= $this->listdata($tabel);
		$response 	= array();
		foreach ($data as $row) {
			foreach ($desc as $field) {
				$d[$field['Field']]	= $row[$field['Field']];
			}
			array_push($response, $d);
		}
		return json_encode($response);
	}

	##--------------------------------------------------------------------------------------##
	## FUNGSI LAINNYA ##
	public function getdesc($tabel)
	{
		return $this->_db->sql("desc $tabel");
	}

	public function getid($tabel)
	{
		$desc 		= $this->getdesc($tabel);
		return $desc[0]['Field'];
	}

	##--------------------------------------------------------------------------------------##
	
}