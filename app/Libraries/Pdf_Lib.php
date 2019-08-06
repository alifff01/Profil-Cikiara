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

use FPDF;
use app\Config\Config;

// -------------------------------------------------------------------------------------------------
require_once 'phpfpdf/fpdf.php';

class pdf extends FPDF
{
    // method awal dalam membuat halaman
    public function page($orientasi='p', $kertas='legal')
    {
        $this->AddPage($orientasi, $kertas);
        $this->SetMargins(25,30,20);
    }

    public function paragraf($teks='', $align='L', $style=''){
        $this->SetFont('Times',$style,'12');
        $this->MultiCell(0,5,'          '.ucfirst($teks),0,$align);
        $this->ln();
    }

    // ----------------------------------------------------------------------------------------------------------
    // method untuk surat menyurat

    // setting logo instansi
    public function logo($gambar){
        $this->image($gambar,25,15,20,20);
    }

    // setting kop surat
    public function kop($teks1,$teks2=NULL,$teks3=NULL,$teks4=NULL){
        $this->SetFont('Times','B','14');
        $this->Cell(0,5,'',0,1,'C');
        $this->Cell(20);
        $this->SetFont('Times','B','14');
        $this->Cell(0,5,strtoupper($teks1),0,1,'C');
        $this->Cell(20);
        $this->SetFont('Times','B','14');
        $this->Cell(0,5,strtoupper($teks2),0,1,'C');
        $this->Cell(20);
        $this->SetFont('Times','B','14');
        $this->Cell(0,5,strtoupper($teks3),0,1,'C');
        $this->Cell(20);
        $this->SetFont('Times','','9');
        $this->Cell(0,5,ucwords($teks4),0,1,'C');
        $this->ln();
    }

    // setting garis kop
    public function garis_kop(){
        $this->SetLineWidth(1);
        $this->Line(25,37,190,37);
        $this->SetLineWidth(0.3);
        $this->Line(24.8,38,190.2,38);
        $this->ln(10);
    }

    // setting nama surat
    public function nama_surat($nama,$nomor)
    {
        $this->SetFont('Times','BU','14');
        $this->Cell(0,5,strtoupper($nama),0,1,'C');
        $this->SetFont('Times','','12');
        $this->Cell(0,3,'Nomor : '.$nomor,0,1,'C');
        $this->ln(10);
    }


    public function tabel($lebar,$nama,$data)
    {
        $this->SetFont('Times','','12');
        for ($i=0; $i < count($nama); $i++) { 
            $this->Cell(10);
            $this->cell($lebar,5,ucfirst($nama[$i]),0,0);
            $this->cell(5,5,' : ',0,0);
            $this->Multicell(0,5,ucfirst($data[$i]),0,1);   
        }
        $this->ln();
    }

    public function ttd($camat=null,$kec='',$desa='',$tgl='',$statusttd='sekdes')
    {
        $config = new Config();

        $mengetahui     = '';
        $camat          = '';
        $nama_camat     = '';
        $nip            = '';
        $ttd            = '';
        $an             = '';
        $nama           = '.............................................';
        if ($camat == null) {
            $mengetahui     = 'mengetahui';
            $camat          = 'camat '.$kec;
            $nama_camat     = '.............................................';
            $nip            = 'nip:.......................................';
        }
        if ($statusttd == 'sekdes'){
            $ttd    = 'sekertaris desa';
            $an     = 'a/n';
            $nama   = $config->hallo();
        }

        $this->SetFont('Times','','12');
        $this->Cell(10);
        $this->Cell(50,5,ucfirst($mengetahui),0,0,'C');
        $this->Cell(50,5,'',0,0,'C');
        $this->Cell(0,5,'Cikawung, 18 Juli 2018',0,1,'C');
        $this->Cell(10);
        $this->Cell(50,5,strtoupper($camat),0,0,'L');
        $this->Cell(50,5,'',0,0,'C');
        $this->Cell(0,5,$an.' KEPALA DESA '.strtoupper($desa),0,1,'C');
        $this->Cell(10);
        $this->Cell(50,5,'',0,0,'L');
        $this->Cell(50,5,'',0,0,'C');
        $this->Cell(0,5,ucwords($ttd),0,1,'C');
        $this->ln(20);
        $this->Cell(10);
        $this->SetFont('Times','BU','12');
        $this->Cell(50,5,$nama_camat,0,0,'C');
        $this->Cell(50,5,'',0,0,'C');
        $this->Cell(0,5,$nama,0,1,'C');
        $this->Cell(10);
        $this->SetFont('Times','','12');
        $this->Cell(50,10,ucfirst($nip),0,0,'C');
        $this->Cell(50,10,'',0,0,'C');
        $this->Cell(0,10,'',0,1,'C');
        $this->ln();
    }

    public function tabel_header($nama,$ranking){
        $this->Cell(40);
        $this->Cell(65,10,$nama,1,0,'C');
        $this->Cell(40,10,$ranking,1,1,'C');
    }
    public function garis(){
        $this->SetLineWidth(0);
        $this->Line(10,40,200,40);
    }

    function __destruct()
    {
        $this->output();
    }
}