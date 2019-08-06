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

// -------------------------------------------------------------------------------------------------

class ViewClass
{
	private $BASE_URL 	= BASE_URL;

	// property Template
	private $login 		= login;
	private $admin 		= administrator;
	private $home 		= homepage;
	private $tadmin 	= themeadmin;
	private $thome 		= themehome;

	// directory
	private $dadmin 	= '../app/Views/Administrator';
	private $dhome 		= '../app/Views/Homepage';

	// property libraries
	private $bootstrap 	= bootstrap;
	private $chartjs 	= chartjs;
	private $fontawesome= fontawesome;
	private $jquery 	= jquery;
	private $fonts 		= fonts;
	private $phpfpdf 	= phpfpdf;
	private $popper 	= popper;

	function __construct() 
	{
		if ($this->admin == TRUE) {
			self::dirAdmin();
		}

		if ($this->home == TRUE) {
			self::dirHome();
		}

		self::themeLogin();
		self::statusLibrary();
	}

	public function statusLibrary()
	{
		if ($this->bootstrap == FALSE) {
			$folder = 'bootstrap4.1';
			self::droplibrary($folder);
		}
		if ($this->chartjs == FALSE) {
			$folder = 'chartjs';
			self::droplibrary($folder);
		}
		if ($this->fontawesome == FALSE) {
			$folder = 'font-awesome5';
			self::droplibrary($folder);
		}
		if ($this->jquery == FALSE) {
			$folder = 'j-query';
			self::droplibrary($folder);
		}
		if ($this->fonts == FALSE) {
			$folder = 'fonts';
			self::droplibrary($folder);
		}
		if ($this->phpfpdf == FALSE) {
			$folder = 'phpfpdf';
			self::droplibrary($folder);
		}
		if ($this->popper == FALSE) {
			$folder = 'popper';
			self::droplibrary($folder);
		}
	}

	public function dropLibrary($folder)
	{
		if (is_dir($folder)) {
			$dir = scandir($folder);
				foreach ($dir as $row) {
					if ($row != '.' AND $row != '..') {
					$path = $folder . '/' .$row;
						if (is_dir($path)) {
							$subdir = scandir($path);
							if (count($subdir) != 2) {
								for ($i=2; $i < count($subdir); $i++) { 
									unlink($path. '/' . $subdir[$i]);
								}
							}
							rmdir($path);
						}else
							unlink($path);
					}
				}
			rmdir($folder);	
		}
	}

	public function dirAdmin()
	{
		if (is_dir($this->dadmin) == null) {
			mkdir($this->dadmin);
		}
		self::themeAdmin();
	}


	public function dirHome()
	{
		if (is_dir($this->dhome) == null) {
			mkdir($this->dhome);
		}
		self::themeHome();
	}

	public function themeLogin()
	{
		if ($this->login != FALSE) {
			$this->login 	= strtolower($this->login);
			$linksource 	= '../app/Theme/login/login_' . $this->login . '.php';
			$linkdesti 		= '../app/Views/home/login_' . $this->login . '.php';
			if (file_exists($linksource)) {
				if (!file_exists($linkdesti)) {
					copy($linksource, $linkdesti);
				}
			}else{
				echo '<b>Fatal Error : </b> Cek Kembali Konfigurasi Login Theme, <i>config.php</i>';
				die();
			}
		}
	}

	public function themeAdmin()
	{
		$this->tadmin = strtolower($this->tadmin);
		$linksourceh 	= '../app/Theme/admin/header_' . $this->tadmin . '.php';
		$linksourcef 	= '../app/Theme/admin/footer_' . $this->tadmin . '.php';
		$linkdestih 	= $this->dadmin . '/header_' . $this->tadmin . '.php';
		$linkdestif 	= $this->dadmin . '/footer_' . $this->tadmin . '.php';

		self::cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif);
	}

	public function themeHome()
	{
		$this->thome = strtolower($this->thome);
		$linksourceh 	= '../app/Theme/homepage/header_' . $this->thome . '.php';
		$linksourcef 	= '../app/Theme/homepage/footer_' . $this->thome . '.php';
		$linkdestih 	= $this->dhome . '/header_' . $this->thome . '.php';
		$linkdestif 	= $this->dhome . '/footer_' . $this->thome . '.php';

		self::cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif);
	}

	public function cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif)
	{
			if (file_exists($linksourceh) AND file_exists($linksourcef)) {
			if (!file_exists($linkdestih) AND !file_exists($linkdestih)) {
				copy($linksourceh, $linkdestih);
				copy($linksourcef, $linkdestif);
			}
		}else{
			echo '<b>Fatal Error : </b> Cek Kembali Konfigurasi Template';
			die();
		}
	}
}