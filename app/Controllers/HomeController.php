<?php

// all class use a namespace
// name for namespace is directory file 

namespace app\Controllers; // package untuk class HomeController

use app\Core\Controller; // alias namespace

// Controller class system
class HomeController extends Controller
{
	// method default
	// all class use methos index for method defaul
	public function index()
	{
		$this->view('home/hompage');
	}
	public function login()
	{
		$this->view('home/login_modern');		
	}
	

	public function proseslogin($value='')
	{
	
	$cek = $this->model('home')->ceklogin();
	if($cek){
	$this->popup('anda berhasil login','admin');
	}else{
		$this->popup('usernmae dan password tidak sesuai','home');
	}
	}
	
}
