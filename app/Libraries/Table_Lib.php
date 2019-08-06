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

namespace app\Libraries;

// -------------------------------------------------------------------------------------------------

class Table
{
	protected static $heading;
	protected static $header;
	protected static $add;
	protected static $primary;
	protected static $data;
	protected static $read;
	protected static $update;
	protected static $delete;
	protected static $color;
	protected static $card;
	protected static $colorstylebg;
	protected static $colorstyletext;
	protected static $note;

	function __construct()
	{
		self::$color = 'primary';
	}

	public function setheading($heading)
	{
		self::$heading = $heading;
	}

	public function SetCard()
	{
		self::$card = 'aktif';
	}

	public function setheader($header)
	{
		self::$header = $header;
	}

	public function setcolor($color)
	{
		self::$color = $color;
	}

	public function setcolorstyle($colorbg, $colortext='white')
	{
		self::$colorstylebg 	= $colorbg;
		self::$colorstyletext	= $colortext;
	}

	public function setadd($link)
	{
		self::$add = $link;
	}

	public function setprimary($field)
	{
		self::$primary = $field;
	}

	public function setdata($data)
	{
		self::$data = $data;
	}

	public function setlink($R=NULL, $U=NULL, $D=NULL)
	{
		self::$read 	= $R;
		self::$update 	= $U;
		self::$delete 	= $D;
	}

	public function Setnote($note)
	{
		self::$note = $note;
	}

	public function viewtable(){
		$html = '';
		if (!empty(self::$primary))
			$x 	= 0;	
		else
			$x 	= 1;
		$no 	= 1;
		$btn_R	= '';
		$btn_U	= '';
		$btn_D 	= '';
		if (empty(self::$read))
			$btn_R = 'disabled';
		if (empty(self::$update))
			$btn_U = 'disabled';
		if (empty(self::$delete))
			$btn_D = 'disabled';
		if (!empty(self::$heading)) {
		$html = "<div class='card mb-2'>";
		if (empty(self::$colorstyletext) || empty(self::$colorstylebg))
			$html .= "<div class='card-header text-white p-2 bg-".self::$color."'>";
		else
			$html .= "<div class='card-header text-white p-2' 
						style='background-color: ".self::$colorstylebg."; color : ".self::$colorstyletext.";'>";
		$html .= "<span class='mr-auto font-weight-bold'>".ucwords(self::$heading)."</span>";
			if (empty(self::$card))
				$html .= "</div></div>";
			else
				$html .="</div><div class='card-body'>";
		}
		if (!empty(self::$add)) {
		$html .= "<span class='float-right mb-1'><a href='". BASE_URL."/".self::$add."' class='btn btn-md btn-outline-".self::$color."'><i class='fa fa-plus'></i> Tambah</a></span>";
		}
		if (empty(self::$header)) {
			return 'Data Nama Header Belum di Set -> [setheader()]';
		}
		$jum_data = count(self::$header)+$x;
		$html .="<div class='table-responsive bg-white'>
				<table class='table table-bordered table-hover'>
				<thead class='bg-secondary'>
					<tr class='text-center text-white'>
						<th width='80'>No</th>";
						foreach (self::$header as $name) {
						 	$html .= "<th>".ucwords($name)."</th>";
						 }
		if (!empty(self::$read) || !empty(self::$update) || !empty(self::$delete)) {
		$html .= "<th></th>";
		}

		$html .= "</tr></thead><tbody>";
		if (empty(self::$data)) {
		$colspan = $jum_data + 1;
		$html .= 	"<tr><td colspan='".$colspan."' class='small text-center text-warning'> Tidak Ada Data </td></tr>";
		}
			foreach (self::$data as $row) {
				$id = $row[0];
		$html .=	"<tr><td class='text-center'>".$no++."</td>";
					for ($i=$x; $i < $jum_data; $i++)
						$html .= "<td>".ucfirst($row[$i])."</td>";
		if (!empty(self::$read) || !empty(self::$update) || !empty(self::$delete)) {
		$html .=	"<td class='text-center' width='125'>";
		if (!empty(self::$read)) {
			$html .= 
					" <a href='". BASE_URL."/".self::$read."/".$id."' class='btn btn-sm btn-outline-success p-1 ".$btn_R."'><i class='fa fa-external-link'></i></a> ";
		}
		if (!empty(self::$update)) {
			$html .=
					" <a href='". BASE_URL."/".self::$update."/".$id."' class='btn btn-sm btn-outline-info p-1 ".$btn_U."'><i class='fa fa-pencil'></i></a> ";
		}
		if (!empty(self::$delete)) {
			$html .=
					" <a href='". BASE_URL."/".self::$delete."/".$id."' onclick='javascript: return confirm('Anda yakin menghapus Data ini?')' class='btn btn-sm btn-outline-danger p-1 ".$btn_D."'><i class='fa fa-trash-o'></i></a> ";
		}
		$html .= "</td>";
		}
		$html .= "</tr>";
		}
		$html .= "</tbody></table>";
		if (!empty(self::$note)) {
			$html .= "<small>".ucfirst(self::$note)."</small>";
		}
		$html .= "</div>";
		if (!empty(self::$card) AND !empty(self::$heading))
			$html .= "</div></div>";
		echo $html;
	}
}