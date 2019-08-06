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

namespace app\Core;

use app\Core\ViewClass;

// -------------------------------------------------------------------------------------------------

class Controller
{
	private $link 			= BASE_URL;
	private $link_error = error_link;
	private $sesi 			= session;
	protected $header 	= null;
	protected $session 	= null;
	protected $data 	= null;
	protected $footer 	= null;

	// property template
	private $admin 			= administrator;
	private $tadmin 		= themeadmin;
	private $home 			= homepage;
	private $thome 			= themehome;

	function __construct()
	{
		$view = new ViewClass();
	}

	//Fungsi untuk memanggil halaman page
	public function view($view, $data= [])
	{
		self::resource();
		$time 	= $this->time;
		$table 	= $this->table;
		$format = $this->format;
		$form 	= $this->form;
		$chart 	= $this->chart;
		if ( file_exists('../app/Views/'.$view.'.php') ) {
			require_once '../app/Views/'.$view.'.php';
		}else{
			require_once $this->link_error;
		}
	}

	public function printPage($view, $data=[])
	{
		
		$pdf = self::library('pdf');
		if ( file_exists('../app/Views/'.$view.'.php') ) {
			require_once '../app/Views/'.$view.'.php';
		}else{
			require_once $this->link_error;
		}
	}

	//Fungsi untuk memanggil model
	public function model($model=null)
	{
		if (empty($model))
			$model = 'fc';
		require_once '../app/Models/'.$model.'_model.php';
		$model 	= 'app\Models\\' . $model;
		return new $model();
	}

	//Fungsi untuk memanggil library
	public function library($library)
	{
		require_once '../app/Libraries/'.$library.'_Lib.php';
		$library = 'app\Libraries\\' . $library;
		return new $library();
	}

	// resource
	public function resource()
	{
		$this->format 	= self::library('format');
		$this->time 	= self::library('time');	
		$this->table 	= self::library('table');
		$this->form 	= self::library('form');
		$this->chart 	= self::library('chart'); 	 	 	
	}

	//Fungsi untuk mengalihkan kehalaman lain
	public function redirect($link)
	{
		$path = $this->link.'/'.$link;
		header("location: $path");
	}

	//Fungsi untuk memberikan nama pada session
	public function setSession($session=null)
	{
		$this->session = $session;
	}

	// Data Session dari konfigurasi Session
	public function dataSession()
	{
		if ($this->sesi != FALSE)
			$this->session = $this->sesi;
	}

	//Fungsi untuk mengecek keadaan session aktif
	public function session($flink)
	{
		self::dataSession();
		if ($this->session != null) {
			if (!empty(isset($_SESSION[$this->session])))
			$this->redirect($flink);
		}else{
			echo '<b> Peringatan </b> : session belum di set';
			die();
		}
	}

	//Fungsi untuk mengecek keadaan session yang tidak aktif
	public function session_null($tlink)
	{
		self::dataSession();
		if ($this->session != null) {
			if (empty(isset($_SESSION[$this->session])))
				$this->redirect($tlink);
		}else{
			echo '<b> Peringatan </b> : session belum di set';
			die();
		}
	}

	//Fungsi untuk mendefinisikan halaman header page
	public function setHeader($header)
	{
		$this->header 		= $header;
	}

	//Fungsi untuk mendefinisikan halaman footer page
	public function setFooter($footer)
	{
		$this->footer 		= $footer;
	}

	// Fungsi untuk mendefinisikan data
	public function setData($data)
	{
		$this->data 		= $data;
	}

	public function GetData()
	{
		return $this->data;
	}

	//Fungsi untuk memanggil method setheader
	public function getHeader($data=null)
	{
		if (!isset($this->header)) {
			echo '<b>Peringatan :</b> Link Header belum terdefinisi';
			die();
		}
		self::view($this->header, $data);
	}

	//Fungsi untuk memanggil method setfooter
	public function getFooter($data=null)
	{
		if (!isset($this->footer)) {
			echo '<b>Peringatan : </b> Link Footer belum terdefinisi';
			die();
		}
		self::view($this->footer, $data);
	}

	//Fungsi untuk menampilkan halaman yang komplek (terdiri dari header, page dan footer)
	public function page($view,$data=NULL){
		self::getheader($this->data);
		self::view($view, $data);
		self::getfooter($this->data);
	}

	// Fungsi pemanggilan header dan footer dari template Admin
	public function adminPage($view, $data=[])
	{
		if ($this->admin == TRUE) {
			$dir 	= '../app/Views/Administrator';
			if (file_exists($dir . '/header_' . $this->tadmin . '.php') AND file_exists($dir . '/footer_' . $this->tadmin . '.php')) {
			 	if (file_exists('../app/Views/' . $view . '.php')) {
			 		self::view('Administrator/header_' . $this->tadmin, self::getdata());
					self::view($view, $data);
					self::view('Administrator/footer_' . $this->tadmin, self::getdata());
			 	}else{
			 		require_once $this->link_error;
			 	}
			} else{
				echo '<b>Peringatan  </b>: File Template tidak ada atau tidak sesuai ';
				die();
			}
		}else{
			echo 'Template admin tidak aktif';
			die();
		}
	}

		// Fungsi pemanggilan header dan footer dari template Admin
	public function homePage($view, $data=[])
	{
		if ($this->home == TRUE) {
			$dir 	= '../app/Views/Homepage';
			if (file_exists($dir . '/header_' . $this->thome . '.php') AND file_exists($dir . '/footer_' . $this->thome . '.php')) {
			 	if (file_exists('../app/Views/' . $view . '.php')) {
			 		self::view('Homepage/header_' . $this->thome, self::getdata());
					self::view($view, $data);
					self::view('Homepage/footer_' . $this->thome, self::getdata());
			 	}else{
			 		require_once $this->link_error;
			 	}
			} else{
				echo '<b>Peringatan  </b>: File Template tidak ada atau tidak sesuai ';
				die();
			} 
		}
	}

	//Fungsi untuk menampilkan jendela Pop Up
	public function popup($pesan,$link){
		$popup = "<script language='javascript'>
	    		window.alert('".$pesan."');
	    		window.location.href='".$this->link."/".$link."';
	    		</script>";
	    echo $popup;
	}

	//Fungsi untuk mengecek status data CUD
	public function checkcud($cud,$check,$link)
	{
		$info 	= ['create' => 'di Simpan','update' => 'di Perbaharui', 'delete' => 'di Hapus'];
		if (array_key_exists($cud, $info))
			$status 	= $info[$cud];	
		else{
			echo "<p><strong>Kode Salah</strong> : Input CUD yang sesuai !!!</p>";
			die();
		}
		if ($check)
			echo self::popup("Data Berhasil $status",$link);
		else
			echo self::popup("Data Gagal $status",$link);
	}
}