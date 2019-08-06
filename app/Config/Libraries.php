<?php
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 *
 * ---------------------------------------------------------------------------------------------------------------
 */

/**

* library status pemanggilan
* library offline import dari direktory public
* library cds import secara online
*/
define('library', 'offline'); // offline || cdn

// **************************************************************************************************************

// PENTING !!!
// JIKA library sudah FALSE. maka libray tidak dapat dikembalikan kembali
// Pastikan library mana yang sesuai dengan project
// TRUE = AKTIF
// FALSE = TIDAK AKTIF ( file di hapus)
// FITUR ini dapat mengurangi ukuran file project anda
// Secara Default. LIBRARY dalam keadaan AKTIF

// **************************************************************************************************************
/**

* library CSS Boostrap Version 4.1 
* libarry CSS dan JS
*/
define('bootstrap', TRUE); // TRUE || FALSE

/**

* library J-QUERY
* library pendukung untuk js bootstrap, AJAX
*/
define('jquery', TRUE); // TRUE || FALSE

/**

* library Font Awesome Version 5 Free 
* libarry icon dan font beauty
*/
define('fontawesome', TRUE); // TRUE || FALSE

/**

* library Chart JS 
* library untuk pembuatan statistik berupa grafik
*/
define('chartjs', TRUE); // TRUE || FALSE

/**

* library Fonts menarik untuk icon
* library untuk pembuatan icon
*/
define('fonts', TRUE); // TRUE || FALSE

/**

* library php pdf 
* library untuk pembuatan file PDF
*/
define('phpfpdf', TRUE); // TRUE || FALSE

/**

* library popper
* library untuk pendukung dropdown bootstrap dll
*/
define('popper', TRUE); // TRUE || FALSE
