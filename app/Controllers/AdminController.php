<?php
namespace app\Controllers;
 // package untuk class HomeController

// all class use a namespace
// name for namespace is directory file 


use app\Core\Controller; // alias namespace

// Controller class system
class AdminController extends Controller
{
	// method default
	function __construct()
	{
		$this->setsession('admin');
		$this->session_null('home');
	}
	// all class use methos index for method default
	public function index()
	{
		$this->adminpage('Administrator/beranda');	
	}



				// biodata
				public function lihatbiodata()
				{
					$data['biodata']=$this->model('biodata')->listbiodata();
					$this->adminpage('Administrator/tampilbiodata',$data);
				}

				public function detailbiodata($id_biodata)
				{
					$data['biodata'] = $this->model('biodata')->listbiodataid($id_biodata);
					$this->adminpage('detail',$data);
				}


				public function tambahbiodata()
					{
						$data['jabatan'] = $this->model('Jabatan')->listjabatan();
						$this->adminpage('Administrator/tambahbiodata',$data);
					}
					public function simpanbiodata()
					{
						$e = $this->model('biodata')->simpanbiodata();
						if ($e) {
							$this->popup(' data berhasil disimpan', 'admin/lihatbiodata');
						}else{
							$this->popup('silahkan cek kembali', 'admin/tambahbiodata');
						}
					}


	// agenda
	public function lihatagenda()
	{
		$data['agenda']=$this->model('agenda')->listagenda();
		$this->adminpage('Administrator/tampilagenda',$data);
	}
	public function tambahagenda()
		{
			$this->adminpage('Administrator/tambahagenda');
		}
		public function simpanagenda()
		{
			$t = $this->model('agenda')->simpanagenda();
			if ($t) {
				$this->popup(' data berhasil disimpan', 'admin/lihatagenda');
			}else{
				$this->popup('silahkan cek kembali', 'admin/tambahagenda');
			}
		}


							// produk
						public function lihatproduk()
						{
							$data['produk']=$this->model('produk')->listproduk();
							$this->adminpage('Administrator/tampilproduk',$data);
						}
						public function tambahproduk()
							{
								$this->adminpage('Administrator/tambahproduk');
							}
							public function simpanproduk()
							{
								$b = $this->model('produk')->simpanproduk();
								if ($b) {
									$this->popup(' data berhasil disimpan', 'admin/lihatproduk');
								}else{
									$this->popup('silahkan cek kembali', 'admin/tambahproduk');
								}
							}


	// profil
	public function lihatdataprofil()
	{
		$data['profil']=$this->model('profil')->listprofil();
		$this->adminpage('Administrator/tampilprofil',$data);
	}
	public function tambahprofil()
		{
			$this->adminpage('Administrator/tambahprofil');
		}
		public function simpanprofil()
		{
			$t = $this->model('profil')->simpanprofil();
			if ($t) {
				$this->popup(' data berhasil disimpan', 'admin/lihatdataprofil');
			}else{
				$this->popup('silahkan cek kembali', 'admin/tambahprofil');
			}
		}


								// setting
							public function lihatsetting()
							{
								$data['setting']=$this->model('setting')->listsetting();
								$this->adminpage('Administrator/tampilsetting',$data);
							}
							public function tambahsetting()
								{
									$this->adminpage('Administrator/tambahsetting');
								}
								public function simpansetting()
								{
									$t = $this->model('setting')->simpansetting();
									if ($t) {
										$this->popup(' data berhasil disimpan', 'admin/lihatsetting');
									}else{
										$this->popup('silahkan cek kembali', 'admin/tambahsetting');
									}
								}




		// jabatan
		public function lihatjabatan()
		{
			$data['jabatan']=$this->model('jabatan')->listjabatan();
			$this->adminpage('Administrator/tampiljabatan',$data);
		}
		// form tambah jabatan
		public function tambahjabatan()
		{
			$this->adminpage('Administrator/tambahjabatan', $data);
		}
		public function simpanjabatan()
		{
			$x = $this->model('jabatan')->simpanjabatan();
			if ($x) {
				$this->popup('berhasil disimpan', 'admin/lihatjabatan');
			}else{
				$this->popup('silahkan cek kembali', 'admin/tambahjabatan');
			}

								

									
	}


}
