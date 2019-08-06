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

class Time
{
	public function __construct(){
		date_default_timezone_set('Asia/Jakarta');
	}

	public static function getdate()
	{
		return date('Y-m-d');
	}

	public function gettime()
	{
		return date('H:i:s');
	}

	public function getdatetime()
	{
		return date('Y-m-d H:i:s');
	}

	public function added_time($time,$add)
	{
		$data 						= date_create($time);
		date_add($data, date_interval_create_from_date_string("$add hours"));
		return date_format($data, 'H:i:s');		
	}

	public function added_date($tgl,$choose,$add)
	{
		return date('Y-m-d', strtotime("$add $choose", strtotime($tgl)));
	}

	public function getdateindo()
	{
		$hari 		= self::hari_indo(date('N'));
		$tanggal	= date('d');
		$bulan 		= self::bulan_indo(date('m'));
		$tahun 		= date('Y');
		return $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
	}

	public function getmonth()
	{
		return self::bulan_indo(date('m'));
	}

	public function getday()
	{
		return self::hari_indo(date('N'));
	}

	public function getyear()
	{
		return date('Y');
	}

	public function bulan_indo($m)
	{
		$bulan 		= [	'01' => 'Januari',
						'02' => 'Februari',
						'03' => 'Maret',
						'04' => 'April',
						'05' => 'Mei',
						'06' => 'Juni',
						'07' => 'Juli',
						'08' => 'Agustus',
						'09' => 'September',
						'10' => 'Oktober',
						'11' => 'November',
						'12' => 'Desember'];

		return $bulan[$m];
	}

	public function hari_indo($N)
	{
		$hari 		= [ '1' => 'Senin',
						'2' => 'Selasa',
						'3' => 'Rabu',
						'4' => 'Kamis',
						'5' => 'Jum\'at',
						'6' => 'Sabtu',
						'7' => 'Minggu'];

		return $hari[$N];
	}

	public function date_indo($tgl)
	{
		$tanggal		= substr($tgl, 8,2);
		$bulan			= self::bulan_indo(substr($tgl, 5,2));
		$tahun			= substr($tgl, 0,4);

		return $tanggal.' '.$bulan.' '.$tahun;
	}

	public function datetime_indo($tgl,$br=null)
	{
		$tanggal		= substr($tgl, 8,2);
		$bulan			= self::bulan_indo(substr($tgl, 5,2));
		$tahun			= substr($tgl, 0,4);
		$waktu 			= substr($tgl, 11,8);
		if (!empty($br)) {
			$br = '<br>';
		}

		return $tanggal.' '.$bulan." ".$tahun." $br ".$waktu.' WIB';
	}
}